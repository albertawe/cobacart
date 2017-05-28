<?php
 
namespace App\Http\Controllers;
use App\Cart; 
use App\Product; 
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;
use Auth;
use Session;	
 
class ProductController extends Controller
{
 
    public function getIndex(){
        $products = Product::all();
        return view('main.index', ['products' => $products]);
    }
    public function getaddtocart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }
    public function getcart(){
  	if (!Session::has('cart')){
  		return view('main.shopping-cart');
  	}
  	$oldcart = Session::get('cart');
  	$cart = new Cart($oldcart);
  	return view('main.shopping-cart', ['products' => $cart->items, 'totalPrice'=> $cart->totalPrice]);
    }
    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingcart');
    }
    public function getincreaseByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingcart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingcart');
    }
     public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('main.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('main.checkout', ['total' => $total]);
    }
     public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('main.shoppingCart');
        }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            try {
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            Auth::user()->orders()->save($order);
            } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
           
            Session::forget('cart');
            return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
        } 

        
    }
