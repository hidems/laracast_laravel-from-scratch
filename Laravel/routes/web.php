<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth()->loginUsingId(19);

Route::get('/', function () {
    return view('welcome');
});

// Simplework ~ Articles
Route::get('/simplework', function () {
    return view('simplework');
});

Route::get('/simplework/about', function () {
    // $article = App\Article::latest('updated_at')->get();

    return view('simplework_about', [
        'articles' => App\Article::take(3)->latest('updated_at')->get()
    ]);
});

Route::get('/simplework/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/simplework/articles', 'ArticlesController@store');
Route::get('simplework/articles/create', 'ArticlesController@create'); // It must be before @show method.
Route::get('/simplework/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/simplework/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/simplework/articles/{article}', 'ArticlesController@update');

// Mail
Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@store');

// Notification
Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->middleware('auth');
Route::get('notifications', 'UserNotificationsController@show')->middleware('auth');

// Conversation
Route::get('conversations', 'ConversationsController@index');
Route::get('conversations/{conversation}', 'ConversationsController@show');
// Authorize by CoversationPolicy::view
// Route::get('conversations/{conversation}', 'ConversationsController@show')->middleware('can:view,conversation');
Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');

// Role and Ability
Route::get('/reports', function () {
    return 'the secret reports';
})->middleware('can:view_reports');

// Test page to show only name in URL (Ex. http://192.168.33.11/request?name=John)
Route::get('request', function () {
    // $name = request('name');
    return view('request', [
        'name' => request('name')
    ]);
});

// No controller and operate in this file to show pages
Route::get('posts_dir/{POST}', function($post) {
    $posts = [
        'my-first-post' => 'Hello, this is my first blog. I am...',
        'my-second-post' => 'Hey, my 2nd post I would show you...'
    ];

    if(! array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('subpost', [
        // 'post' => $posts[$post] ?? 'Nothing here yet'
        'post' => $posts[$post] ?? 'Nothing here yet'
    ]);
});

// Call Controller
Route::get('subposts/{post}', 'SubPostsController@show');

// Call Controller
Route::get('posts/{post}', 'PostsController@show');

Route::get('/hello_layout', function () {
    return view('hello_layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
