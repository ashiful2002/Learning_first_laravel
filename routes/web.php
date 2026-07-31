<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');


$person = ["name" => "mukto", "email" => "mukto@com"];

// dump($person);
// dd($person);


// Route::get(uri("/about"), function () {
//     return view("about");
// });
Route::view("/about", "about");
Route::view("/contact", "contact");

// Route::get("/product/{id}", function (string $id) {
//     return "Product ID = $id";
// });
Route::get("/product/{category?}", function (string $category = null) {
    return "product for category= $category";
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
