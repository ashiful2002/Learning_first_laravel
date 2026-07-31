<?php

use App\Http\Controllers\carController;
use Illuminate\Support\Facades\Route;
use PHPStan\Rules\Functions\ReturnNullsafeByRefRule;

Route::inertia('/', 'welcome')->name('home');


$person = ["name" => "mukto", "email" => "mukto@com"];

// dump($person);
// dd($person);


// Route::get(uri("/about"), function () {
//     return view("about");
// });
// Route::view("/about", "about");
// Route::view("/contact", "contact");

// Route::get("/product/{id}", function (string $id) {
//     return "Product ID = $id";
// });
// Route::get("/product/{category?}", function (string $category = null) {
//     return "product for category= $category";
// });
// Route::get("/product/{id}", function (string $id) {
//     return "Working!! = $id";
// })->whereNumber(parameters: "id");


// Route::get("{lang}/product/{id}", function (string $lang, string $id) {
//     return "Language is  $lang and the id is $id";
// })->where(["lang" => "[a-z]{2}", "id" => "\d{4,}"]);

// associate name

// Route::get("/", function () {

//     // $aboutPageUrl = "/about";
//     $aboutPageUrl = route("about");

//     dd($aboutPageUrl);

//     return view("welcome");
// });

// Route::view(("/about"), view: "about")->name("about");



Route::get("{lang}/product/{id}", function (string $lang, string $id) {
    return "Language is  $lang and the id is $id";
})->name("product.view");


Route::get("sum/{a}/{b}", function (float $a, float $b) {
    return $a * $b;
});

Route::controller(carController::class)->group(function () {
    Route::get("/car", "index");
    Route::get("/my-car", "myCars");
});

Route::prefix("admin")->group((function () {
    Route::get("/users", function () {
        return "/admin/users";
    });
}));

Route::fallback(function () {
    return "Fallback=>  404 - not found";
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
