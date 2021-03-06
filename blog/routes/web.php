<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

Route::get('/posts/{slug}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{slug}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::get('/posts/{slug}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');
 

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();
    
    $user = User::where('github_id', $githubUser->id)->first();
 
    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            // 'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/home');
 
    // $user->token
});