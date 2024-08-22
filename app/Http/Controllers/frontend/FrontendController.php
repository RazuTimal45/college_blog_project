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
    public function home(){
        $data['blogs'] = Post::all();  
        $data['categories'] = Category::all();
        return view('frontend.index', compact('data'));
    }
    public function blogDetail($slug)
{
    
    $blog = Post::where('slug', $slug)->with('categories')->firstOrFail();

    
    $blog->increment('no_of_readers');

    
    $data = [];

    
    $data['blog_detail'] = $blog;

    
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
        // dd(true);
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
