<?php
/*Route::get('/', function () {
    return view('welcome');
});*/
//article route
Route::get('article/add','ArticleController@articleAdd')->name('add');
Route::post('article/save','ArticleController@articleSave')->name('article/save');
Route::get('article/index','ArticleController@articleIndex')->name('index');
Route::get('article/show','ArticleController@articleShow')->name('show');
Route::get('article/edit','ArticleController@articleEdit')->name('edit');
Route::post('article/updatee','ArticleController@articleUpdatee')->name('updatee');
Route::get('article/del','ArticleController@articleDel')->name('del');


//member route
Route::get('member/add','MemberController@memberAdd')->name('add');
Route::post('member/save','MemberController@memberSave')->name('save');
Route::get('member/index','MemberController@memberIndex')->name('index');
Route::get('member/view','MemberController@memberView')->name('view');
Route::get('member/edit','MemberController@memberEdit')->name('edit');
Route::post('member/update','MemberController@memberUpdate')->name('update');
Route::get('member/del','MemberController@memberDel')->name('del');


//admin route

Route::get('admin/add','AdminController@add')->name('admin/add');
Route::post('admin/save','AdminController@save')->name('admin/save');
Route::get('admin/index','AdminController@index')->name('admin/index');
Route::get('admin/eidt/{admin}','AdminController@edit')->name('admin/edit');
Route::post('admin/update/{admin}','AdminController@update')->name('admin/update');
Route::get('admin/del/{admin}','AdminController@del')->name('admin/del');


//articlecate route

Route::get('articlecate/index','ArticleCateController@index')->name('articlecate/index');
Route::get('articlecate/add','ArticleCateController@add')->name('articlecate/add');
Route::post('articlecate/save','ArticleCateController@save')->name('articlecate/save');
Route::get('articlecate/edit/{articlecate}','ArticleCateController@edit')->name('articlecate/edit');
Route::post('articlecate/update/{articlecate}','ArticleCateController@update')->name('articlecate/update');
Route::get('articlecate/del/{articlecate}','ArticleCateController@del')->name('articlecate/del');
Route::get('articlecate/show/{articlecate}','ArticleCateController@show')->name('articlecate/show');

//wenzhang route
Route::get('wenzhang/index','WenzhangController@index')->name('wenzhang/index');
Route::get('wenzhang/add','WenzhangController@add')->name('wenzhang/add');
Route::post('wenzhang/save','WenzhangController@save')->name('wenzhang/save');
Route::get('wenzhang/edit/{wenzhang}','WenzhangController@edit')->name('wenzhang/edit');
Route::post('wenzhang/update/{wenzhang}','WenzhangController@update')->name('wenzhang/update');
Route::get('wenzhang/del/{wenzhang}','WenzhangController@del')->name('wenzhang/del');
Route::get('wenzhang/show/{wenzhang}','WenzhangController@show')->name('wenzhang/show');
Route::get('wenzhang/num','WenzhangController@num')->name('wenzhang/num');

//essay route 定义一个资源路由
Route::resource('essays','EssaysController');

//manager route
Route::resource('manager','ManagerController');

//goods route
Route::resource('goods','GoodsController');

//user route
Route::resource('user','UserController');

//session route
Route::get('login','SessionController@login')->name('login');
Route::post('login/check','SessionController@check')->name('login.check');

Route::get('login/destroy','SessionController@destroy')->name('logout');

//post route
Route::resource('post','PostController');
Route::get('num/view','PostController@view')->name('num.view');

//postcate route
Route::resource('postcate','PostCateController');

//mail route
//Route::get('smail','SmailController@send')->name('smail');

//Home Index
Route::get('index','Home\\IndexController@index')->name('index');
Route::get('view/{post}','Home\\IndexController@view')->name('index.view');

//Chaxun route  资源路由不能给name 会报错
Route::resource('chaxun','ChaxunController');

