<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\user\VoteController;
use App\Http\Controllers\user\PhoneController;
use App\Http\Controllers\user\DetailsController;
use App\Models\Ballots;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\LocationsController;
use App\Http\Controllers\admin\ContestantsController;
use App\Http\Controllers\admin\PartiesController;
use App\Http\Controllers\admin\AdminController;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/change-password', 'App\Http\Controllers\ChangePasswordController@index');
    Route::post('/change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    //Route::get('/user/vote', [VoteController::class, 'index'])->name('vote-view');
    Route::post('/user/phone', [PhoneController::class, 'add'])->name('phone');
    Route::get('/user/verify', [PhoneController::class, 'verify'])->name('verify');

    Route::post('/user/details', [DetailsController::class, 'save_details'])->name('add-details');
    Route::post('/user/natid', [DetailsController::class, 'natid_upload'])->name('add-natid');

    Route::post('/user/vote', [VoteController::class, 'vote'])->name('vote');
    Route::post('/user/reset', [VoteController::class, 'delete'])->name('reset');
    Route::get('/user/results', [VoteController::class, 'result'])->name('result');
    Route::get('/user/profile', [DetailsController::class, 'profile'])->name('profile');
    Route::post('/user/profile/upload', [DetailsController::class, 'upload'])->name('profile-upload');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users');
    Route::get('/admin/user/{id}', [UsersController::class, 'edit'])->name('edit-user');
    Route::get('/admin/delete/{id}', [UsersController::class, 'delete'])->name('delete-user');
    Route::get('/admin/verify/{id}', [UsersController::class, 'make_voter'])->name('make-voter');
    Route::post('/admin/edit/user', [UsersController::class, 'post'])->name('post-edit-user');

    Route::get('/admin/locations', [LocationsController::class, 'index'])->name('admin-locations');
    Route::get('/admin/parties', [PartiesController::class, 'index'])->name('admin-parties');

    Route::get('/admin/contestants', [ContestantsController::class, 'index'])->name('contestants');
    Route::get('/admin/add/contestant', [ContestantsController::class, 'add_view'])->name('addcontestants');
    Route::get('/admin/contestant/{id}', [ContestantsController::class, 'edit'])->name('edit-contestants');
    Route::get('/admin/delete/{id}', [ContestantsController::class, 'delete'])->name('delete-contestants');
    Route::post('/admin/edit/contestant', [ContestantsController::class, 'post'])->name('post-contestants');
    Route::post('/admin/add', [ContestantsController::class, 'add'])->name('add-contestants');

    Route::get('/admin/add-admin', [AdminController::class, 'index'])->name('add-admin');
    Route::post('/admin/add-admin/post', [AdminController::class, 'add'])->name('add-admin-post');

    Route::get('/admin/location', [LocationsController::class, 'index_add'])->name('admin-location-index');
    Route::post('/admin/add/location', [LocationsController::class, 'add'])->name('admin-add-location');
    Route::get('/admin/party', [PartiesController::class, 'index_add'])->name('admin-party-index');
    Route::post('/admin/add/party', [PartiesController::class, 'add'])->name('admin-add-party');


    Route::get('/admin/national_id/{id}', [UsersController::class, 'see_id'])->name('see-id');
});

require __DIR__ . '/auth.php';
