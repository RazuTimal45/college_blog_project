<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CommentRequest;
use App\Http\Requests\backend\UserRequest;
use App\Models\backend\Category;
use App\Models\backend\Comment;
use App\Models\backend\Post;
use App\Models\User;

use App\Services\RecommendationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

// use App\Http\Requests\backend\ContactRequest;


class FrontendController extends Controller
{
    //setting ko lagi api route
    // public function setting(Request $request){
    //     $record = Setting::first();
    //     if($record){
    //         return response()->json([
    //             "status" => 201,
    //             "data" => $record,
    //             "message"=>"setting items retrieved successfully",
    //         ]);
    //     }else{
    //         return  response()->json([
    //             "status" => 400,
    //             "message"=>"No data found",
    //         ]);
    //     }
    // }
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }
    public function index(Request $request){
         {
        $data['blogs'] = Post::all();  
        $data['categories'] = Category::all();

        // Assuming you want to recommend posts based on the first blog post
        if ($data['blogs']->isNotEmpty()) {
            $firstPostId = $data['blogs']->first()->id;
            $data['recommended_posts'] = $this->recommendationService->calculateRecommendations($firstPostId);
        } else {
            $data['recommended_posts'] = collect();
        }

        return view('frontend.default', compact('data'));
    }
    }
    public function aboutUs(){
      
    }
    public function blogDetail($slug)
{
    // Fetch the blog post by slug or fail if not found
    $blog = Post::where('slug', $slug)->with('categories')->firstOrFail();

    // Increment the number of readers for the blog post
    $blog->increment('no_of_readers');

    // Prepare data array to pass to the view
    $data = [];

    // Store the blog details in the data array
    $data['blog_detail'] = $blog;

    // Check if there are other blog posts to recommend
    $data['recommended_posts'] = $blog->exists 
        ? $this->recommendationService->calculateRecommendations($blog->id) 
        : collect();

    // Get category IDs associated with the blog post
    $categoryIds = $blog->categories->pluck('id');

    // Fetch related blogs based on the shared categories, excluding the current post
    $data['relatedBlogs'] = Post::whereHas('categories', function ($query) use ($categoryIds) {
                                        $query->whereIn('category_id', $categoryIds);
                                    })
                                    ->where('id', '!=', $blog->id)
                                    ->limit(4)
                                    ->get();

    // Return the blog detail view with the data array
    return view('frontend.blog_detail', compact('data'));
}
public function storeComment(CommentRequest $request, $slug)
{
    // dd($request->all());
    $blog = Post::where('slug', $slug)->firstOrFail();
    $user_id = $request->input('user_id');
    // if (Auth::check()) {
        // Create a new comment
        $comment = new Comment([
            'user_id' => $user_id,
            'post_id' => $blog->id,
            'content' => $request->input('content'),
        ]);

        // Save the comment to the database
        $comment->save();

        // Redirect back to the blog post with a success message
        return redirect()->route('frontend.blog_detail', ['slug' => $blog->slug])
                         ->with('success', 'Your comment has been added successfully.');
    // } else {
    //     // Redirect to login if the user is not authenticated
    //     return redirect()->route('login')->with('error', 'You must be logged in to comment.');
    // }
}

    public function userLogin(){
        return view('frontend.login');
    }
    public function userRegister(UserRequest $request){
        dd(true);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'bio' => $request->input('bio'),
        ]);
        return view('frontend.register');
    }
    public function contact(){
        return view('frontend.contact');
    }

}
