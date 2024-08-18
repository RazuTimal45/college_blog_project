<?php

namespace App\Http\Controllers;

use App\Models\backend\Post;
use App\Models\backend\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    /**
     * Get recommended posts based on user ratings and preferences.
     */
    public function getRecommendations(Request $request)
    {
        $userId = $request->input('user_id');
        
        $ratings = Rating::where('user_id', $userId)
                         ->select('category_id', 'post_id', DB::raw('AVG(rating) as avg_rating'))
                         ->groupBy('category_id', 'post_id')
                         ->orderBy('avg_rating', 'DESC')
                         ->get();
        

        $categories = Category::whereIn('id', $ratings->pluck('category_id'))->get()->keyBy('id');
        $posts = Post::whereIn('id', $ratings->pluck('post_id'))->get()->keyBy('id');


        $recommendedPosts = $ratings->map(function ($rating) use ($categories, $posts) {
            return [
                'post_title' => $posts[$rating->post_id]->title ?? 'Unknown Title',
                'category_name' => $categories[$rating->category_id]->name ?? 'Unknown Category',
                'avg_rating' => $rating->avg_rating,
            ];
        });

        return view('frontend.recommendation', ['recommendedPosts' => $recommendedPosts]);
    }
}
