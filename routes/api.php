<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/save', ArticleController::class)->name('article.save');

// iA Writer
Route::get('/ghost/api/v2/admin/site', function(){
	return response()->json([
	    "site"=> [
			"title"=>"Ghost",
			"description"=>"The professional publishing platform",
			"logo"=>"/content/images/2014/09/logo.png",
			"url"=>"https://hatter.top/api/",
			"version"=>"3.14"
		]

	]);
});