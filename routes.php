# subscribed by nitish kumar
# https://m.facebook.com/story.php?story_fbid=2746412395598393&id=100006889785546

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->post('/check', function (Request $req) {
//     $data = $req->all();
//     $product = new Product;
//     $product->name = $req->name;
//     $product->address = $req->address;
//     $product->phone = $req->phone;
//     $product->save();
//     return false;
// });

Route::post('/insert','ProductController@insertData');
Route::get('/getalldata','ProductController@getAllData');
Route::post('/edit/{id}','ProductController@edit');
Route::get('/delete/{id}','ProductController@delete');
