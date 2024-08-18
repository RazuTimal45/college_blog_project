<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\backend\Category;
use App\Models\backend\Comment;
use App\Models\backend\CommentLike;
use App\Models\backend\Post;
use App\Models\backend\PostLike;
use App\Models\backend\PostTag;
use App\Models\backend\Tag;


class DashboardController extends BackendBaseController
{ 
    protected $panel = 'Dashboard';
    protected $base_route = 'backend.dashboard.';
    protected $base_view = 'backend.dashboard.';
    public function index()
    {
        $data['post_count'] = Post::where('status', 1)->count();
        $data['category_count'] = Category::count();
        $data['tag_count'] = Tag::where('status', 1)->count();
        $data['comment_count'] = Comment::count();
    
        return view($this->__loadToView($this->base_view . 'home'), compact('data'));

    }
}