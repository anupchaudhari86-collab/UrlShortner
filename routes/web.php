<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlManager;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/short-url", [UrlManager::class, "createShortUrl"])
->name("url.short");

Route::get("/{code}", [UrlManager::class, "redirectToOriginalUrl"])
->name("url.redirect");

Route::get("stats/{code}", [UrlManager::class, "stats"])
->name("url.stats");