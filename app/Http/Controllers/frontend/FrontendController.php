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
    public function index(Request $request)
    {
        $data['blogs'] = Post::all();  
        $data['categories'] = Category::all();
    
    
        return view('frontend.index', compact('data'));
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
    
        $data['blog_detail'] = $blog;
        
        $categoryIds = $blog->categories->pluck('id');
    
        // Fetch related blogs based on the shared categories, excluding the current post
        $data['relatedBlogs'] = Post::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->where('id', '!=', $blog->id)
        ->limit(4)
        ->get();
    
          // Fetch the last five comments related to the post
            $data['comments'] = Comment::where('post_id', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        // Return the blog detail view with the data array
        return view('frontend.blog_detail', compact('data'));
    }
    
    public function storeComment(CommentRequest $request, $slug)
    {
        // Fetch the blog post based on the slug
        $blog = Post::where('slug', $slug)->firstOrFail();
    
        // Create and save the comment
        $comment = new Comment([
            'user_id' => $request->input('user_id'), // From hidden input
            'post_id' => $blog->id,                 // From the blog post found by slug
            'content' => $request->input('content'), // From the textarea input
        ]);
    
        // Save the comment to the database
        $comment->save();
    
        // Redirect back to the blog post with a success message
        return redirect()->route('frontend.blog_detail', ['slug' => $blog->slug])
                         ->with('success', 'Your comment has been added successfully.');
    }
    

    public function userLogin(){
        return view('frontend.login');
    }
    public function userRegister(UserRequest $request){
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
    public function popularBlogs()
    {
        $data['blogs'] = Post::with('categories')->orderBy('no_of_readers', 'desc')->limit(12)->get();
        return view('frontend.popular_blogs', compact('data'));
    }
    
    public function recommendedBlogs()
    {
        $data['recommended'] = $this->recommendationService->calculateRecommendations();

        return view('frontend.recommended', compact('data'));
    }
    
    
}
