<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Input;
use App\Order;
use App\OrderItem;
class PaypalController extends Controller
{
  private $_api_context;


      /**
       * configura el contexto de la api de paypal
       *
       */
      public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /*envio */
    /**
     * envia los datos requerido por el package a paypal.
     *
     * @return \Illuminate\Http\Response
     */
    public function postPayment()
  	{
  		$payer = new Payer();
  		$payer->setPaymentMethod('paypal');
  		$items = array();
  		$subtotal = 0;
  		$cart = \Session::get('cart');
  		$currency = 'USD';
  		foreach($cart as $producto){
  			$item = new Item();
  			$item->setName($producto->name)
  			->setCurrency($currency)
  			->setDescription($producto->descripcion)
  			->setQuantity($producto->cantidad)
  			->setPrice($producto->precio);
  			$items[] = $item;
  			$subtotal += $producto->cantidad * $producto->precio;
  		}
  		$item_list = new ItemList();
  		$item_list->setItems($items);
  		$amount = new Amount();
  		$amount->setCurrency($currency)
  			->setTotal($subtotal);
  		$transaction = new Transaction();
  		$transaction->setAmount($amount)
  			->setItemList($item_list)
  			->setDescription('Pedido de prueba en mi Laravel App Store');
  		$redirect_urls = new RedirectUrls();
  		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
  			->setCancelUrl(\URL::route('payment.status'));
  		$payment = new Payment();
  		$payment->setIntent('Sale')
  			->setPayer($payer)
  			->setRedirectUrls($redirect_urls)
  			->setTransactions(array($transaction));
  		try {
  			$payment->create($this->_api_context);
  		} catch (\PayPal\Exception\PPConnectionException $ex) {
  			if (\Config::get('app.debug')) {
  				echo "Exception: " . $ex->getMessage() . PHP_EOL;
  				$err_data = json_decode($ex->getData(), true);
  				exit;
  			} else {
  				die('Ups! Algo salió mal');
  			}
  		}
  		foreach($payment->getLinks() as $link) {
  			if($link->getRel() == 'approval_url') {
  				$redirect_url = $link->getHref();
  				break;
  			}
  		}
  		// add payment ID to session
      $idd=$payment->getId();

  		\Session::put('paypal_payment_id',$idd);
  		if(isset($redirect_url)) {
  			// redirect to paypal
  			return \Redirect::away($redirect_url);
  		}
  		return \Redirect::route('cart.mostrar')
  			->with('error', 'Ups! Error desconocido.');
  	}
    /* fin del envio */


    /**
     * obtiene los datos requerido por el package a paypal, ademas de realizar la transaccion y agregar/registar los detalles del pedido(Order).
     *
     * @return $result
     */

    public function getPaymentStatus()
  	{
  		// Get the payment ID before session clear
  		$payment_id = \Session::get('paypal_payment_id');
  		// clear the session payment ID

  		\Session::forget('paypal_payment_id');
  		$payerId = \Input::get('PayerID');
  		$token = \Input::get('token');
  		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
  		if (empty($payerId) || empty($token)) {
  			return \Redirect::route('home')
  				->with('message', 'Hubo un problema al intentar pagar con Paypal');
  		}
  		$payment = Payment::get($payment_id, $this->_api_context);
  		// PaymentExecution object includes information necessary
  		// to execute a PayPal account payment.
  		// The payer_id is added to the request query parameters
  		// when the user is redirected from paypal back to your site
  		$execution = new PaymentExecution();
  		$execution->setPayerId(\Input::get('PayerID'));
  		//Execute the payment
  		$result = $payment->execute($execution, $this->_api_context);
  		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
  		if ($result->getState() == 'approved') { // payment made
  			// Registrar el pedido --- ok
  			// Registrar el Detalle del pedido  --- ok
  			// Eliminar carrito
  			// Enviar correo a user
  			// Enviar correo a admin
  			// Redireccionar
  	     $this->saveOrder(\Session::get('cart'));
  			\Session::forget('cart');
  			return \Redirect::route('cart.mostrar')
  				->with('message', 'Compra realizada de forma correcta');
  		}
  		return \Redirect::route('cart.mostrar')
  			->with('message', 'La compra fue cancelada');
}

      /**
       * agregar/detalles del pedido // tabla Order.
       *
       * @param Object $cart carrito de compras.
       */
    private function saveOrder($cart)
  	{
  	    $subtotal = 0;
  	    foreach($cart as $item){
  	        $subtotal += $item->precio * $item->cantidad;
  	    }

  	    $order = Order::create([
  	        'subtotal' => $subtotal,
  	        'user_id' => \Auth::user()->id
  	    ]);

  	    foreach($cart as $item){
  	        $this->saveOrderItem($item, $order->id);
  	    }
  	}
    /**
     * agregar/detalles de los productos del pedido // tabla OrderItem.
     *
     * @param Object $item carrito de compras.
     * @param Int $order_id id que viene de la tabla order.
     */
  	private function saveOrderItem($item, $order_id)
  	{
  		OrderItem::create([
  			'cantidad' => $item->cantidad,
  			'precio' => $item->precio,
  			'producto_id' => $item->id,
  			'order_id' => $order_id
  		]);
  	}



  }
