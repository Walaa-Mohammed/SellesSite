<?php
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::any('sendToken' , 'BackEnd\ConfigrationController@sendToken')->name('forget.password');
    Route::any('paswordreset/{id}/{token}' , 'BackEnd\ConfigrationController@paswordreset');
    // Route::post('login', 'BackEnd\UserController@login');
    Route::middleware('auth')->namespace('BackEnd')->group(function () {

        Route::get('/', 'ConfigrationController@index');

        Route::get('/allorders', 'ConfigrationController@getAllOrder');
        Route::get('/sumprice', 'ConfigrationController@getAllPrice');
        Route::resource('configrations', 'ConfigrationController');
        Route::resource('users', 'UserController');
        Route::any('edit-account', 'UserController@editAccount')->name('edit-account');
        Route::resource('products', 'ProductController');
        Route::resource('orders', 'OrderController');
        Route::resource('bills', 'BillController');
        Route::resource('notes', 'NoteController');
        Route::any('print-bill/{id}', 'BillController@printBill')->name('bills.print');


        // Route::get('/printre', function ()
        // {

        //     return view('bills');

        // })->name('print');


    });
});
       // Route::get('/print/{id}','PrintController@index')->name('print');

// Route::get('/', function ()
// {

//     return redirect()->route('users.index');

// });

// Route::get('bill/{id}', 'PrintController@index')->name('bill');

// Route::get('qr-code-g', function () {

//     \QrCode::size(500)
//             ->format('png')
//             ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

//   return view('qrcode');

// });





