<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\backend\ImageController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/',[FrontendController::class,'index'])->name('frontend.default');
    Route::get('/home',[FrontendController::class,'home'])->name('frontend.index');

    Route::get('/about',[FrontendController::class, 'aboutUs'])->name('frontend.about');
    Route::get('/blogs/{slug}',[FrontendController::class,'blogDetail'])->name('frontend.blog_detail');
    Route::get('/user-register',[FrontendController::class,'userRegister'])->name('frontend.register');
    Route::get('/user-login',[FrontendController::class,'userLogin'])->name('frontend.login');
    Route::get('/general-contact',[FrontendController::class,'contact'])->name('frontend.contact');
    Route::get('/popular_blogs', [FrontendController::class, 'popularBlogs'])->name('frontend.popular_blogs');
    Route::get('/recommended_blogs',[FrontendController::class,'recommendedBlogs'])->name('frontend.recommended');
    Route::post('/blog/{slug}/comment', [FrontendController::class, 'storeComment'])->name('frontend.store_comment');
    Route::post('/contactForm', [FrontendController::class, 'contactStore'])->name('frontend.contact_store');

    Route::get('/posts/search', [FrontendController::class, 'search'])->name('posts.search');





    // Route::get('/teams',[FrontendController::class,'teams'])->name('frontend.teams');
    // Route::get('/contact',[FrontendController::class,'contact'])->name('frontend.contact');
    // Route::post('/contact/submit',[FrontendController::class,'contactStore'])->name('frontend.contact_store');
    // Route::post('/mail/submit',[FrontendController::class,'mailStore'])->name('frontend.mail_store');
    // Route::get('/pages/{slug}',[FrontendController::class,'singlePage'])->name('frontend.single_page');
    // Route::get('/news_press',[FrontendController::class,'news_prs'])->name('frontend.news_press');
    // Route::get('/news_press/{slug}',[FrontendController::class,'single_news_prs'])->name('frontend.single_news_press');
    // Route::get('/recommendations', [RecommendationController::class, 'getRecommendations']);
    Route::post('/blog/{slug}/comment', [FrontendController::class, 'storeComment'])->name('frontend.store_comment');

    // Route::middleware(['auth'])->group(function())
    // Custom login and register routes for admin
    Route::get('/razublogg-login', [LoginController::class, 'loginPage'])->name('backend.login');
    Route::post('/razublogg-login', [LoginController::class, 'adminLogin'])->name('backend.razublogg_login');
    Route::get('/razublogg-register', [RegisterController::class, 'registerPage'])->name('backend.register');
    Route::post('/razublogg-register', [RegisterController::class, 'adminRegister'])->name('backend.registerForm');

    // // contact controller
    // Route::get('contact',[ContactController::class,'index'])->name('backend.contact.index');
    // // 404 for unwanted direct access routes
    // Route::get('/login', function () {
    //     abort(404);
    // });
    // Route::get('/register', function () {
    //     abort(404);
    // });
    // Route::get('/logout', function () {
    //     abort(404);
    // });

    // Image upload route
    Route::match(['POST', 'PUT'], 'image-upload', [ImageController::class, 'storeImage'])->name('image.upload');

    // Admin-specific routes

    // Route::prefix('backend')->middleware(['auth:admin', 'web'])->group(function () {
    // Route::middleware(['role'])->group(function () {
    // });
    //backend home
    Auth::routes();
    Route::middleware('auth')->group(function () {
        Route::get('/razublogg_home', [DashboardController::class, 'index'])->name('backend.home');
    // admin profile
    Route::get('backend/admin/show/',[AdminController::class,'index'])->name('backend.admin.show');
    Route::get('backend/admin/edit/{id}',[AdminController::class,'edit'])->name('backend.admin.edit');
    Route::put('backend/admin/update/',[AdminController::class,'update'])->name('backend.admin.update');

    //contact  route

    // Routes for offerings/services
   
    Route::get('posts/checktitle', [PostController::class, 'checkTitle'])->name('backend.posts.ajaxtitle');
    Route::get('posts/trash', [PostController::class, 'trash'])->name('backend.posts.trash');
    Route::get('posts/restore/{id}', [PostController::class, 'restore'])->name('backend.posts.restore');
    Route::delete('posts/permanentDelete/{id}', [PostController::class, 'permanentDelete'])->name('backend.posts.permanentDelete');
    Route::resource('posts', PostController::class)->names('backend.posts');
   
    //Routes for Notices
    Route::get( 'notices/trash', [NoticeController::class, 'trash'])->name(name: 'backend.notices.trash');
    Route::get('notices/restore/{id}', [NoticeController::class, 'restore'])->name(name: 'backend.notices.restore');
    Route::delete( 'notices/permanentDelete/{id}', [NoticeController::class, 'permanentDelete'])->name('backend.notices.permanentDelete');
    Route::resource('notices', NoticeController::class)->names('backend.notices');

    // Routes for offerings/services
    Route::get('categories/checktitle', [CategoryController::class, 'checkTitle'])->name('backend.categories.ajaxtitle');
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('backend.categories.trash');
    Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('backend.categories.restore');
    Route::delete('categories/permanentDelete/{id}', [CategoryController::class, 'permanentDelete'])->name('backend.categories.permanentDelete');
    Route::resource('categories', CategoryController::class)->names('backend.categories');
      
    // Routes for offerings/services
    Route::get('tags/checktitle', [TagController::class, 'checkTitle'])->name('backend.tags.ajaxtitle');
    Route::get('tags/trash', [TagController::class, 'trash'])->name('backend.tags.trash');
    Route::get('tags/restore/{id}', [TagController::class, 'restore'])->name('backend.tags.restore');
    Route::delete('tags/permanentDelete/{id}', [TagController::class, 'permanentDelete'])->name('backend.tags.permanentDelete');
    Route::resource('tags', TagController::class)->names('backend.tags');
        Route::middleware('role')->group(function () {
    //setting route
    Route::get('backend/contacts/trash', [ContactController::class, 'trash'])->name('backend.contacts.trash');
    Route::delete('backend/contacts/permanentDelete/{id}', [ContactController::class, 'permanentDelete'])->name('backend.contacts.permanentDelete');
    Route::get('backend/contacts/restore/{id}', [ContactController::class, 'restore'])->name('backend.contacts.restore');
    Route::resource('backend/contact', ContactController::class)->names('backend.contacts');

    Route::resource('setting', SettingsController::class)->names('backend.setting');
        });

});
    // Subscriber route
    // Route::resource('subscribers', MailController::class)->names('backend.subscribers');
// });
//   Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
//     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// });

// Route::group(['middleware' => 'user'], function () {
//     Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

// });
