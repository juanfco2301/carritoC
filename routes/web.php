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
    return view('welcome');
});


Route::get('/inicio', function () {
    return view('Admin.inicio.inicio');
})->middleware('auth');
Route::group(['prefix'  =>'admin','middleware'=>'auth',
              'middleware' => 'role'],
              function(){
                Route::resource('users','UsersController');
                Route::resource('productos','ProductosController');
                Route::resource('store','StoreController');
                Route::resource('historial','HistorialController');
  Route::get('users/{id}/destroy',[
    'uses' => 'UsersController@destroy',
    'as'   => 'admin.users.destroy'
  ]);

  Route::get('detail/{id}/details',[
    'uses' => 'StoreController@details',
    'as'   => 'admin.store.detail'
  ]);
  //carrito
  Route::get('cart/mostrar',[
    'uses' => 'CartController@mostrar',
    'as'   => 'cart.mostrar'
  ]);
  Route::get('cart/add/{productos}',[
    'uses' => 'CartController@add',
    'as'   => 'admin.store.add'
  ]);
  Route::get('cart/eliminar/{productos}',[
    'uses' => 'CartController@eliminar',
    'as'   => 'cart.eliminar'
  ]);
  Route::get('cart/eliminartodos/}',[
    'uses' => 'CartController@eliminartodo',
    'as'   => 'cart.eliminartodos'
  ]);
Route::get('cart/actualizar/{productos}/cantidad',[
  'uses' => 'CartController@actualizar',
  'as'   => 'cart.actualizar'
]);
Route::get('cart/compra',[
  'uses' => 'CartController@compra',
  'as'   => 'cart.compra'
]);
  //fin de carrito
  Route::get('productos/{id}/destroy',[
    'uses' => 'ProductosController@destroy',
    'as'   => 'admin.productos.destroy'
  ]);
  Route::get('payment',array(
    'uses' => 'PaypalController@postPayment',
    'as'   => 'payment'
  ));
  Route::get('payment/status',array(
    'uses' => 'PaypalController@getPaymentStatus',
    'as'   => 'payment.status'
  ));
});
Route::group(['prefix'=>'member','middleware'=>'auth'],function(){
  Route::resource('store','StoreController');
  Route::get('payment',array(
    'uses' => 'PaypalController@postPayment',
    'as'   => 'payment'
  ));

  Route::get('payment/status',array(
    'uses' => 'PaypalController@getPaymentStatus',
    'as'   => 'payment.status'
  ));
  Route::get('detail/{id}/details',[
    'uses' => 'StoreController@details',
    'as'   => 'admin.store.detail'
  ]);
  //carrito
  Route::get('cart/mostrar',[
    'uses' => 'CartController@mostrar',
    'as'   => 'cart.mostrar'
  ]);
  Route::get('cart/add/{productos}',[
    'uses' => 'CartController@add',
    'as'   => 'admin.store.add'
  ]);
  Route::get('cart/compra',[
    'uses' => 'CartController@compra',
    'as'   => 'cart.compra'
  ]);
  Route::get('cart/eliminartodos/}',[
    'uses' => 'CartController@eliminartodo',
    'as'   => 'cart.eliminartodos'
  ]);
});
/*login¡
Route::get('auth/login',[
  'uses' => 'Auth\AuthController@mostrar',
  'as'   => 'login-get'

]);
/*Route::get('articles',function() {
  echo 'hola mundo';

});
Route::get('articles/{nombre}',function($nombre) {
  echo 'el nombre es: '.$nombre;

});
Route::get('articles2/{nombre?}',function($nombre='no coloco nombre'  ) {
  echo 'el nombre es: '.$nombre;
  });
*/
/*
Route::group(['prefix'=>'articles'],function(){
  Route::get('view/{articles?}',function($article = "vacio"){
      echo $article;
    });
*/
/* Paypal
Route::get('payment',array(
  'uses' => 'PaypalController@postPayment',
  'as'   => 'payment'
));
Route::get('payment/status',array(
  'uses' => 'PaypalController@getPaymentStatus',
  'as'   => 'payment.status'

));
/* Paypal */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
