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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('{provider}');
    Route::get('/{provider}/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('{provider}.callback');
});
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'showProfile'])->name('show-profile');
    Route::post('/updateProfile', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('/deleteUser', [\App\Http\Controllers\ProfileController::class, 'deleteUser'])->name('delete-user');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', [\App\Http\Controllers\Auth\RegisterController::class, 'showProviderUserRegistrationForm'])->name('{provider}');
    Route::post('/{provider}', [\App\Http\Controllers\Auth\RegisterController::class, 'registerProviderUser'])->name('{provider}');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('start', [\App\Http\Controllers\MainController::class, 'showMainStartPage'])->middleware('auth')->name('start-page');
Route::get('main', [\App\Http\Controllers\MainController::class, 'showMain'])->middleware('auth')->name('main');
Route::prefix('main')->name('main.')->group(function () {
    Route::post('createNewFiles', [\App\Http\Controllers\MainController::class, 'createNewFiles'])->name('create-new-files');
    Route::get('selectFile', [\App\Http\Controllers\MainController::class, 'selectFile'])->name('select');
    Route::post('editFileName', [\App\Http\Controllers\MainController::class, 'editFileName'])->name('edit-file-name');
    Route::post('deleteFile', [\App\Http\Controllers\MainController::class, 'deleteFile'])->name('delete-file');
    Route::post('deleteContent', [\App\Http\Controllers\MainController::class, 'deleteContent'])->name('delete-content');
    Route::post('updateContent', [\App\Http\Controllers\MainController::class, 'updateContent'])->name('update-content');
    Route::get('selectContent', [\App\Http\Controllers\MainController::class, 'selectContent'])->name('select-content');
    Route::post('newParent', [\App\Http\Controllers\MainController::class, 'newParent'])->name('new-parent');
    Route::post('addChildren', [\App\Http\Controllers\MainController::class, 'addChildren'])->name('add-children');
    Route::post('addMemo', [\App\Http\Controllers\MainController::class, 'addMemo'])->name('add-memo');
    Route::post('updateMemo', [\App\Http\Controllers\MainController::class, 'updateMemo'])->name('update-memo');
    Route::post('addNavContent', [\App\Http\Controllers\MainController::class, 'addNavContent'])->name('add-nav-content');
    Route::post('updateNavContents', [\App\Http\Controllers\MainController::class, 'updateNavContents'])->name('update-nav-contents');
    Route::post('createNewTargets', [\App\Http\Controllers\MainController::class, 'createNewTargets'])->name('create-new-targets');
    Route::post('deleteTargetFile', [\App\Http\Controllers\MainController::class, 'deleteTargetFile'])->name('delete-target-file');
    Route::post('saveTargets', [\App\Http\Controllers\MainController::class, 'saveTargets'])->name('save-targets');
    Route::post('editTargetFileName', [\App\Http\Controllers\MainController::class, 'editTargetFileName'])->name('edit-target-file-name');
    Route::post('updateTargets', [\App\Http\Controllers\MainController::class, 'updateTargets'])->name('update-targets');
    Route::post('createNewGoals', [\App\Http\Controllers\MainController::class, 'createNewGoals'])->name('create-new-goals');
    Route::post('deleteGoalFile', [\App\Http\Controllers\MainController::class, 'deleteGoalFile'])->name('delete-goal-file');
    Route::post('saveGoals', [\App\Http\Controllers\MainController::class, 'saveGoals'])->name('save-goals');
    Route::post('editGoalFileName', [\App\Http\Controllers\MainController::class, 'editGoalFileName'])->name('edit-goal-file-name');
    Route::post('updateGoals', [\App\Http\Controllers\MainController::class, 'updateGoals'])->name('update-goals');
    Route::post('changeColor', [\App\Http\Controllers\MainController::class, 'changeColor'])->name('change-color');
    Route::post('changeTextSize', [\App\Http\Controllers\MainController::class, 'changeTextSize'])->name('change-text-size');
    Route::post('updateAndCreateNavByComparison', [\App\Http\Controllers\MainController::class, 'updateAndCreateNavByComparison'])->name('update-and-create-nav-by-comparison');
    Route::post('newGroupCategory', [\App\Http\Controllers\MainController::class, 'newGroupCategory'])->name('new-group-category');
    Route::get('/group/{thinkFile_id}', [\App\Http\Controllers\MainController::class, 'showGroup'])->middleware('auth')->name('show-group');
    Route::prefix('group/{thinkFile_id}')->name('group.')->group(function () {
        Route::post('createNewGroup', [\App\Http\Controllers\GroupController::class, 'createNewGroup'])->name('create-new-group');
        Route::post('updateGroupCategoryInGroup', [\App\Http\Controllers\GroupController::class, 'updateGroupCategoryInGroup'])->name('update-group-category-in-group');
        Route::post('addContentInGroupFromThinks', [\App\Http\Controllers\GroupController::class, 'addContentInGroupFromThinks'])->name('add-content-in-group-from-thinks');
        Route::post('addContentInGroup', [\App\Http\Controllers\GroupController::class, 'addContentInGroup'])->name('add-content-in-group');
        Route::post('updateContentInGroup', [\App\Http\Controllers\GroupController::class, 'updateContentInGroup'])->name('update-content-in-group');
        Route::post('deleteContentInGroup', [\App\Http\Controllers\GroupController::class, 'deleteContentInGroup'])->name('delete-content-in-group');
        Route::post('changeColorInGroup', [\App\Http\Controllers\GroupController::class, 'changeColorInGroup'])->name('change-color-in-group');
        Route::post('changeTextSizeInGroup', [\App\Http\Controllers\GroupController::class, 'changeTextSizeInGroup'])->name('change-text-size-in-group');
    });
});

