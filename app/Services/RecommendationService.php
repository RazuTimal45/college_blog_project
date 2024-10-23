<?php

namespace App\Services;

use App\Models\backend\Post;
use NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;
use NlpTools\Stemmers\PorterStemmer;
use Illuminate\Support\Arr;

class RecommendationService
{
    protected $tokenizer;
    protected $stemmer;

    public function __construct()
    {
        $this->tokenizer = new WhitespaceAndPunctuationTokenizer();
        $this->stemmer = new PorterStemmer();
    }

    protected function preprocess($text)
    {
        $tokens = $this->tokenizer->tokenize($text);
        return array_map([$this->stemmer, 'stem'], $tokens);
    }

    protected function calculateTF($document)
    {
        $tf = [];
        $documentSize = count($document);

        foreach ($document as $term) {
            if (!isset($tf[$term])) {
                $tf[$term] = 0;
            }
            $tf[$term] += 1;
        }

        foreach ($tf as $term => $count) {
            $tf[$term] = $count / $documentSize;
        }

        return $tf;
    }

    protected function calculateIDF($documents)
    {
        $idf = [];
        $documentCount = count($documents);

        foreach ($documents as $document) {
            foreach (array_unique($document) as $term) {
                if (!isset($idf[$term])) {
                    $idf[$term] = 0;
                }
                $idf[$term] += 1;
            }
        }

        foreach ($idf as $term => $count) {
            $idf[$term] = log($documentCount / $count);
        }

        return $idf;
    }

    protected function calculateTFIDF($tf, $idf)
    {
        $tfidf = [];

        foreach ($tf as $term => $tfValue) {
            $tfidf[$term] = $tfValue * $idf[$term];
        }

        return $tfidf;
    }

    public function calculateRecommendations($postId = null)
    {
        $posts = Post::all();
        $documents = [];
        $tfidfVectors = [];

        foreach ($posts as $post) {
            $documents[$post->id] = $this->preprocess($post->content);
        }

        $idf = $this->calculateIDF($documents);

        foreach ($documents as $id => $document) {
            $tf = $this->calculateTF($document);
            $tfidfVectors[$id] = $this->calculateTFIDF($tf, $idf);
        }

        // If a specific post is provided, recommend similar posts
        if ($postId) {
            $targetVector = $tfidfVectors[$postId];

            // Calculate cosine similarity with other documents
            $similarities = [];
            foreach ($tfidfVectors as $id => $vector) {
                if ($id != $postId) {
                    $similarities[$id] = $this->cosineSimilarity($targetVector, $vector);
                }
            }

            arsort($similarities);
            $recommendedPostIds = array_keys(array_slice($similarities, 0, 5, true));

            return Post::whereIn('id', $recommendedPostIds)->get();
        }

        // Otherwise, just return a collection of top posts
        return Post::limit(5)->get();
    }

    protected function cosineSimilarity($vectorA, $vectorB)
    {
        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        foreach ($vectorA as $term => $value) {
            $dotProduct += $value * Arr::get($vectorB, $term, 0);
            $magnitudeA += $value ** 2;
        }

        foreach ($vectorB as $value) {
            $magnitudeB += $value ** 2;
        }

        $magnitude = sqrt($magnitudeA) * sqrt($magnitudeB);

        return ($magnitude != 0) ? $dotProduct / $magnitude : 0;
    }
}
