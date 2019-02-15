<?php

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
    return view('Frontend.index');
});
Route::get('/dashboard', function () {
    return view('Backend.Admin.dashboard');
});

/*Gener Routes*/
Route::get('/listgenre', [
    'uses' => 'genreController@list',
    'as' => 'ListGenre'
]);
Route::get('/addgenre', [
    'uses' => 'genreController@add',
    'as' => 'AddGenre'
]);
Route::post('/savegenre', [
    'uses' => 'genreController@save',
    'as' => 'SaveGenre'
]);
Route::get('/showgenre/{id}', [
    'uses' => 'genreController@show',
    'as' => 'ShowGenre'
]);
Route::get('/editgenre/{id}', [
    'uses' => 'genreController@edit',
    'as' => 'EditGenre'
]);
Route::post('/updategenre/', [
    'uses' => 'genreController@update',
    'as' => 'UpdateGene'
]);
Route::get('/deletegenre/{id}', [
    'uses' => 'genreController@delete',
    'as' => 'DeleteGenre'
]);

/*Author Routes*/
Route::get('/listauthor', [
    'uses' => 'authorController@list',
    'as' => 'ListAuthor'
]);
Route::get('/addauthor', [
    'uses' => 'authorController@add',
    'as' => 'AddAuthor'
]);
Route::post('/saveauthor', [
    'uses' => 'authorController@save',
    'as' => 'SaveAuthor'
]);
Route::get('/showauthor/{id}', [
    'uses' => 'authorController@show',
    'as' => 'ShowAuthor'
]);
Route::get('/editauthor/{id}', [
    'uses' => 'authorController@edit',
    'as' => 'EditAuthor'
]);
Route::post('/updateauthor/', [
    'uses' => 'authorController@update',
    'as' => 'UpdateAuthor'
]);
Route::get('/deleteauthor/{id}', [
    'uses' => 'authorController@delete',
    'as' => 'DeleteAuthor'
]);

/*Publisher Routes*/
Route::get('/listpublisher', [
    'uses' => 'publisherController@list',
    'as' => 'ListPublisher'
]);
Route::get('/addpublisher', [
    'uses' => 'publisherController@add',
    'as' => 'AddPublisher'
]);
Route::post('/savepublisher', [
    'uses' => 'publisherController@save',
    'as' => 'SavePublisher'
]);
Route::get('/showpublisher/{id}', [
    'uses' => 'publisherController@show',
    'as' => 'ShowPublisher'
]);
Route::get('/editpublisher/{id}', [
    'uses' => 'publisherController@edit',
    'as' => 'EditPublisher'
]);
Route::post('/updatepublisher/', [
    'uses' => 'publisherController@update',
    'as' => 'UpdatePublisher'
]);
Route::get('/deletepublisher/{id}', [
    'uses' => 'publisherController@delete',
    'as' => 'DeletePublisher'
]);


/*Suppliser Routes*/
Route::get('/listsupplier', [
    'uses' => 'supplierController@list',
    'as' => 'ListSupplier'
]);
Route::get('/addsupplier', [
    'uses' => 'supplierController@add',
    'as' => 'AddSupplier'
]);
Route::post('/savesupplier', [
    'uses' => 'supplierController@save',
    'as' => 'SaveSupplier'
]);
Route::get('/showsupplier/{id}', [
    'uses' => 'supplierController@show',
    'as' => 'ShowSupplier'
]);
Route::get('/editsupplier/{id}', [
    'uses' => 'supplierController@edit',
    'as' => 'EditSupplier'
]);
Route::post('/updatesupplier/', [
    'uses' => 'supplierController@update',
    'as' => 'UpdateSupplier'
]);
Route::get('/deletesupplier/{id}', [
    'uses' => 'supplierController@delete',
    'as' => 'DeleteSupplier'
]);

/*Book Routes*/
Route::get('/listbook', [
    'uses' => 'bookController@list',
    'as' => 'ListBook'
]);
Route::get('/addbook', [
    'uses' => 'bookController@add',
    'as' => 'AddBook'
]);
Route::post('/savebook', [
    'uses' => 'bookController@save',
    'as' => 'SaveBook'
]);
Route::get('/showbook/{id}', [
    'uses' => 'bookController@show',
    'as' => 'ShowBook'
]);
Route::get('/editbook/{id}', [
    'uses' => 'bookController@edit',
    'as' => 'EditBook'
]);
Route::post('/updatebook/', [
    'uses' => 'bookController@update',
    'as' => 'UpdateBook'
]);
Route::get('/deletebook/{id}', [
    'uses' => 'bookController@delete',
    'as' => 'DeleteBook'
]);


/*Book Cost*/

Route::get('/listbookcost', [
    'uses' => 'bookCostController@list',
    'as' => 'ListBookCost'
]);
Route::get('/addbookCost', [
    'uses' => 'bookCostController@add',
    'as' => 'AddBookCost'
]);
Route::post('/savebookcost', [
    'uses' => 'bookCostController@save',
    'as' => 'SaveBookCost'
]);
Route::get('/showbookcost/{id}', [
    'uses' => 'bookCostController@show',
    'as' => 'ShowBookCost'
]);
Route::get('/editbookcost/{id}', [
    'uses' => 'bookCostController@edit',
    'as' => 'EditBookCost'
]);
Route::post('/updatebookcost/', [
    'uses' => 'bookCostController@update',
    'as' => 'UpdateBookCost'
]);
Route::get('/deletebookcost/{id}', [
    'uses' => 'bookCostController@delete',
    'as' => 'DeleteBookCost'
]);
