<?php

//use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\Article\ArticleCategoryController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\DatatablesController;
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

route::prefix('article/category')->group(function(){
    route::get('/all',[ArticleCategoryController::class,'index']);
    route::get('/add',[ArticleCategoryController::class,'create']);
    route::post('/store',[ArticleCategoryController::class,'store'])->name('article.category.store');
    route::get('/edit/{id?}',[ArticleCategoryController::class,'edit'])->where('id', '[0-9]+');
    route::post('/update',[ArticleCategoryController::class,'update'])->name('article.category.update');
    route::get('/delete/{id}',[ArticleCategoryController::class,'destroy']);
 });
 route::prefix('articles')->group(function(){
    route::get('/',[ArticleController::class,'index']);
    route::get('/create',[ArticleController::class,'create']);
    route::post('/store',[ArticleController::class,'store'])->name('articles.store');
    route::get('/edit/{id?}',[ArticleController::class,'edit'])->where('id', '[0-9]+');
    route::post('/update',[ArticleController::class,'update'])->name('articles.update');
    route::get('/delete/{id}',[ArticleController::class,'destroy']);
 });


