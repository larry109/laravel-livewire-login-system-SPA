<?php


Route::any('/cache_clear', function () {
    Artisan::call('cache:clear');
});
Route::any('/config_clear', function () {
    Artisan::call('config:clear');
});
Route::any('/route_clear', function () {
    Artisan::call('route:clear');
});
Route::any('/view_clear', function () {
    Artisan::call('view:clear');
});


Route::group(['middleware' => 'checkUserLogedIn'], function () {
    Route::get("/login", \App\Http\Livewire\Login::class)->name('login');
    Route::get("/register", \App\Http\Livewire\Register::class)->name('register');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get("/", \App\Http\Livewire\Home::class)->name('home');
    Route::get("/addTodo", \App\Http\Livewire\AddTodo::class)->name('addTodo');
    Route::get("/todo/edit/{id}", \App\Http\Livewire\EditTodo::class)->name('editTodo');
});