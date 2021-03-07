<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function add ()
{
return view('admin.news.create');
}

}
Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create',
'Admin\NewsController@add');
});
