<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CommentRequest;
use App\Http\Requests\backend\ContactRequest;
use App\Http\Requests\backend\UserRequest;
use App\Models\backend\Category;
use App\Models\backend\Comment;
use App\Models\backend\Contact;
use App\Models\backend\Notice;
use App\Models\backend\Post;
use App\Models\backend\Tag;
use App\Models\User;

use App\Services\RecommendationService;


use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;


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

        public function userLogin(Request $request)
        {
            // Show the login form
            $data['trending'] = Notice::where('status', '1')->get();
            return view('frontend.login', compact('data'));
        }

    public function userLoginSubmit(Request $request)
    {
       // Handle login form submission
       if ($request->isMethod('post')) {
        $data['trending'] = Notice::where('status', '1')->get();

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('/home');
        }

        // Authentication failed
        return redirect()->route('frontend.login')
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput()
            ->with('trending', $data['trending']);
    }

    // Return the login view for GET requests
    return view('frontend.login', ['trending' => Notice::where('status', '1')->get()]);
    }
    

    public function aboutAdmin(){
        $data['trending'] = Notice::where('status','1')->get();
        return view('frontend.about_admin',compact('data'));
    }
    public function userRegisterForm()
    {
        $data['trending'] = Notice::where('status','1')->get();
        return view('frontend.register',compact('data')); 
    }
    public function userRegister(UserRequest $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'bio' => $request->input('bio'),
        ]);
        
        // Redirect after successful registration
        return redirect()->route('frontend.login')->with('success', 'Registration successful! Please log in.');
    }
    public function index(Request $request)
    {
        $data['trending'] = Notice::where('status','1')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        $data['blogs'] = Post::orderBy('created_at', 'desc')->paginate(6); 
        $data['categories'] = Category::all();
        return view('frontend.default', compact('data'));
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect()->route('frontend.default'); 
    }
    
    public function aboutUs(){
        $data['trending'] = Notice::where('status','1')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        $data['popular'] = Post::with('categories')->orderBy('no_of_readers', 'desc')->take(4)->get();
        return view('frontend.about',compact('data'));
    }
    public function home(){
        $data['trending'] = Notice::where('status','1')->get();
        $data['blogs'] = Post::orderBy('created_at', 'desc')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        $data['categories'] = Category::all();
        $data['recommended'] = $this->recommendationService->calculateRecommendations()->take(8);
        $data['popular'] = Post::with('categories')->orderBy('no_of_readers',  'desc')->paginate(4);
        // dd($data);
        return view('frontend.index', compact('data'));
    }
    public function contactStore(ContactRequest $request)
    {
        $contact = Contact::where('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();
            
        if ($contact) {
            return redirect()->back()->with('info', 'This email or phone number is already associated with an existing contact.');
        }
    
        $record = Contact::create($request->all());
        if ($record) {
            return redirect()->back()->with('success', 'Your message was sent successfully. Please wait for our response.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    
    public function blogDetail($slug)
    {
        $data['trending'] = Notice::where('status','1')->get();
        $data['blogs'] = Post::orderBy('created_at', 'desc')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        $blog = Post::where('slug', $slug)->with('categories')->firstOrFail();
        $blog->increment('no_of_readers');
    
        $data['blog_detail'] = $blog;
        
        $categoryIds = $blog->categories->pluck('id');
    
        $data['relatedBlogs'] = Post::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->where('id', '!=', $blog->id)
        ->limit(4)
        ->get();
    
            $data['comments'] = Comment::where('post_id', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.blog_detail', compact('data'));
    }
    
        protected $badWords = [
            'kukur',
            'khate',
            'madarchod',
            'laude',
            'masala',
            'muji',
            'bhalu',
            'gu kha',
            'chak',
            'behen chod',
            'dakka',
            'chakka',
            'hijada',
            'sala',
            'randikoban'
        ];

      public function storeComment(CommentRequest $request, $slug)
    {
        
        $blog = Post::where('slug', $slug)->firstOrFail();        
        $content = $request->input('content');       
        if ($this->containsBadWords($content)) { 
            return redirect()->route('frontend.blog_detail', ['slug' => $blog->slug])
                             ->with('error', 'Your comment contains inappropriate language and cannot be posted.');
        }

        $comment = new Comment([
            'user_id' => $request->input('user_id'), 
            'post_id' => $blog->id,                 
            'content' => $content,                  
        ]);

        $comment->save();
        return redirect()->route('frontend.blog_detail', ['slug' => $blog->slug])
                         ->with('success', 'Your comment has been added successfully.');
    }

    /**
     * Check if the given text contains any bad words.
     *
     * @param string $text
     * @return bool
     */
    protected function containsBadWords($text)
    {
        foreach ($this->badWords as $badWord) {
            if (stripos($text, $badWord) !== false) {
                return true;
            }
        }

        return false;
    }

    

   
    public function contact(){
        $data['trending'] = Notice::where('status','1')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        return view('frontend.contact',compact('data'));
    }
    public function popularBlogs()
    {
        $data['trending'] = Notice::where('status','1')->get();
        $data['blogs'] = Post::orderBy('created_at', 'desc')->get();
        $data['footer'] = Post::orderBy('created_at', 'desc')->take(2)->get();
        $data['popular'] = Post::with('categories')
        ->orderBy('no_of_readers', 'desc')
        ->orderBy(column: 'created_at')
        ->paginate(3);    
    
        // dd($data['blogs']);
        return view('frontend.popular_blogs', compact('data'));
    }

    public function recommendedBlogs()
    {
        $data['trending'] = Notice::where('status','1')->get();
        $data['footer'] = Post::orderBy(column: 'created_at', direction: 'desc')->take(2)->get();
        $data['recommended'] = $this->recommendationService->calculateRecommendations();
        return view('frontend.recommended', compact('data'));
    }
    public function dashboardCount(){
        $data['post_counts'] = Post::count();
        $data['user_counts'] = User::count();
        $data['categories'] = User::count();
        $data['tags'] = Tag::count();

        return view('frontend.dashboard', compact('data'));
    }
  
    public function search(Request $request)
    {
        // Validate the request
        $request->validate([
            'keyword' => 'required|string|min:1',
        ]);

        // Get the keyword from the request
        $keyword = $request->input('keyword');

        // Search for posts that match the keyword
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')
                     ->orWhere('content', 'LIKE', '%' . $keyword . '%')
                     ->get();

        // Return the results as JSON
        return response()->json($posts);
    }
    
}
