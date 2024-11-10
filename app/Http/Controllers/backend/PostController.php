<?php
namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Models\backend\Post;
use App\Models\backend\Category;
use App\Models\backend\Tag;
use App\Http\Requests\backend\PostRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class PostController extends BackendBaseController
{
    protected $panel = 'Post';
    protected $base_route = 'backend.posts.';
    protected $base_view = 'backend.posts.';
    protected $model;
    // protected $recommendationService;

    function __construct()
    {
        $this->model = new Post();
        // $this->recommendationService = $recommendationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model->orderBy('rank', 'asc')->get();

        if ($data['records']->isEmpty()) {
            Alert::error('No Data', 'No Data found');
            return redirect()->route($this->base_route . 'create');
        }

        return view($this->__loadToView($this->base_view . 'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name', 'id');
        $data['tags'] = Tag::active()->pluck('name', 'id');

        return view($this->__loadToView($this->base_view . 'create'), compact('data'));
    }

    /**
     * Check if the title already exists.
     */
    public function checkTitle(Request $request)
    {
        $title = $request->title;

        if ($title) {
            $existingTitles = $this->model->where('title', $title)->get();

            if ($existingTitles->isNotEmpty()) {
                return response()->json(['message' => 'exist']);
            }

            return response()->json(  ['message' => 'nodata']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

     protected function generateTagsFromDescription($description)
     {
         $words = str_word_count(strtolower(strip_tags($description)), 1);
         $wordCounts = array_count_values($words);
         arsort($wordCounts); // Sort by frequency
     
         $stopWords = [
             "and", "but", "or", "nor", "for", "yet", "so", "although", "because", "since", "unless", "while", "if", "before", "after", "when", "until",
             "a", "an", "the",
             "in", "on", "at", "by", "with", "about", "against", "between", "under", "over", "above", "below", "during", "through", "to", "from", "up", "down", "into", "out", "of",
             "I", "me", "you", "he", "him", "she", "her", "it", "we", "us", "they", "them", "my", "your", "his", "her", "its", "our", "their", "mine", "yours", "hers", "ours", "theirs", "is", "am", "are", "was", "were", "being", "been", "have", "has", "had", "having", "Can", "Could", "May", "Might",
             "Must", "Shall", "Should", "Will", "Would", "this"
         ]; 
     
         // Filter out stop words
         $filteredWordCounts = array_diff_key($wordCounts, array_flip($stopWords));
     
         // Get the top 5 tags with their counts
         $topTags = array_slice($filteredWordCounts, 0, 5, true);
     
         return $topTags; // Return an associative array of tags and their counts
     }
     
     protected function matchCategories($description)
     {
         // Fetch all categories
         $categories = Category::all();
         $matchedCategories = [];
     
         // Check each category description for matches
         foreach ($categories as $category) {
             // Check if the category description exists in the post description
             if (stripos($description, $category->description) !== false) {
                 // Only include category if it has less than 4 posts
                 $postCount = Post::whereHas('categories', function ($query) use ($category) {
                     $query->where('category_id', $category->id);
                 })->count();
     
                 if ($postCount < 4) {
                     $matchedCategories[] = $category->id;
                 }
             }
         }
     
         return $matchedCategories;
     }
     
     public function store(PostRequest $request)
     {
         DB::beginTransaction();
         try {
             // Add slug, created_by, and user_id to the request
             $request->request->add([
                 'slug' => Str::slug($request->input('title')),
                 'created_by' => auth()->user()->id,
                 'user_id' => auth()->user()->id
             ]);
     
             // Handle image upload if provided
             if ($request->hasFile('image_file')) {
                 $image = $request->file('image_file');
                 $imageFilename = uniqid() . '.' . $image->getClientOriginalExtension();
                 $image->move('images/posts/', $imageFilename);
                 $request->request->add(['image' => $imageFilename]);
             }
     
             // Add content from the description field
             $request->request->add(['content' => $request->input('description')]);
     
             // Create the post
             $post = $this->model->create($request->all());
     
             // Store categories from an input field
             $categoryIds = $request->input('categories'); // Assume this is an array of category IDs
             if ($categoryIds) {
                 $post->categories()->attach($categoryIds);
             }
     
             DB::commit();
             Alert::success('Success', $this->panel . ' Added successfully');
         } catch (\Exception $exception) {
             DB::rollBack();
             Alert::error('Error', 'Oops....Error occurred: ' . $exception->getMessage());
         }
     
         return redirect()->route($this->base_route . 'index');
     }
     
     
 
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $data['record'] = $this->model->find($id);
    
    if (!$data['record']) {
        Alert::error('No Data', 'Data Not Found');
        return view($this->__loadToView($this->base_view . 'index'));
    } else {
        // Generate tags with frequencies
        \Log::info('Categories:', $data['record']->categories->toArray());
        
        $data['tags'] = $this->generateTagsFromDescription($data['record']->description);
        return view($this->__loadToView($this->base_view . 'show'), compact('data'));
    }
}

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Fetch the record to be edited
    $record = $this->model->find($id);

    // If the record is not found, redirect with an error
    if (!$record) {
        Alert::error('No Data', 'No Data Found');
        return redirect()->route($this->base_route . 'index');
    }

    // Fetch categories and tags, and get assigned tags for the record
    $categories = Category::pluck('name', 'id');
    $tags = Tag::pluck('name', 'id');
    $assigned_tags = $record->tags->pluck('id')->toArray();

    // Prepare data for the view
    $data = [
        'record' => $record,
        'categories' => $categories,
        'tags' => $tags,
        'assigned_tags' => $assigned_tags,
    ];

    return view($this->__loadToView($this->base_view . 'edit'), compact('data'));
}

    
    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
{
    $post = $this->model->find($id);

    // If post not found, redirect with an error
    if (!$post) {
        Alert::error('Error', 'Post not found.');
        return redirect()->route($this->base_route . 'index');
    }

    // Add updated_by field
    $request->request->add(['updated_by' => auth()->user()->id]);

    DB::beginTransaction();
    try {
        // Handle image upload if provided
        if ($request->hasFile('image_file')) {
            $filename = uniqid() . '.' . $request->file('image_file')->getClientOriginalExtension();
            $request->file('image_file')->move('images/posts/', $filename);

            // Delete the old image if it exists
            if ($post->image && file_exists(public_path('images/posts/' . $post->image))) {
                unlink(public_path('images/posts/' . $post->image));
            }
            $request->request->add(['image' => $filename]);
        }

        // Update post details
        $updated = $post->update($request->all());

        if ($updated) {
            // Detach existing categories and attach matched categories
            $post->categories()->detach();
            $categories = $this->matchCategories($request->input("description"));
            if (!empty($categories)) {
                $post->categories()->attach($categories);
            }

            // Sync tags with the input tag IDs
            $post->tags()->sync($request->input("tag_id"));

            DB::commit();
            Alert::success('Success', $this->panel . ' updated successfully');
        } else {
            DB::rollBack();
            Alert::error('Error', 'Update failed');
        }
    } catch (\Exception $exception) {
        DB::rollBack();
        Alert::error('Error', 'An error occurred: ' . $exception->getMessage());
    }

    return redirect()->route($this->base_route . 'index');
}

    
    
    public function destroy(string $id)
    {
        $data=$this->model->find($id);
        $d=$data->delete();
        if($d){
            Alert::success('success',$this->panel.' deleted success');
        }else{
            Alert::error('error','Oops... something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function trash(){
        $data['records']=$this->model->onlyTrashed()->get();
        if(count($data['records'])<1){
            Alert::error('No Data','No Trash Data Found');
            return redirect()->route($this->base_route.'index');
        }
        return view($this->__loadToView($this->base_view.'trash'),compact('data'));
    }
    public function permanentDelete($id){
        $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
        if ($data['record']->image && file_exists(public_path('images/posts/' . $data['record']->image))) {
            unlink(public_path('images/posts/' . $data['record']->image));
        }
        if(!$data['record']){
            Alert::error('error','Oops ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->forceDelete()){
            Alert::success('success', $this->panel. ' Deleted Permanently');
        } else {
            Alert::error('error','Oops ... error occurred while deleting record');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function restore($id){
        $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
        if (!$data['record']){
            Alert::error('error','Oops ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->restore()){
            Alert::success('success', $this->panel . ' Recovered Successfully');
        } else {
            Alert::error('error','Oops ... error occurred while recovering record');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
