<?php

use App\Http\Controllers\ArticleController;
use App\Http\Middleware\LogMiddleware;
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
Route::middleware([LogMiddleware::class])->group(function () {
	Route::post('/save', ArticleController::class)->name('article.save');

	// iA Writer
	Route::get('/ghost/api/v2/admin/site', function () {
		return response()->json([
			"site" => [
				"title" => "Hatter.top",
				"description" => "The professional publishing platform",
				"logo" => "https://hatter.top/logo.png",
				"url" => "https://hatter.top/",
				"version" => "3.14"
			]
		]);
	});
	Route::post('/ghost/api/v2/admin/posts', function (Request $request) {
		logger('POST:admin/posts', (array) $request->all());
		return response('ok');
	});
});