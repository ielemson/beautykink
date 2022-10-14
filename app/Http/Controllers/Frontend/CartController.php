<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\PriceHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Repositories\Frontend\CartRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Frontend\CartRepository $repository
     * @return void
     *
    */
    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        // if (Session::has('cart')) {
        //     $cart = Session::get('cart');
        // } else {
        //     $cart = [];
        // }
        // dd(Cart::content());
        $cart = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('frontend.catalog.cart', [
            'cart' => $cart,
            'cart_qty' => $cart_qty,
            'cart_total' => $cart_total,
            'subtotal' => $subtotal,
        ]);
    }

    /**
     * Add product to cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function addToCart(Request $request)
    {
        $msg = $this->repository->store($request);
        if ($request->ajax()) {
            return response()->json([
                'message' => $msg,
                'qty' => count(Session::get('cart'))
            ]);
        }
    }

    /**
     * Store in cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $msg = $this->repository->store($request);
        if ($request->addtocart) {
            return back()->with('success_message', __('Cart Added Successfully.'));
        }
        return redirect()->route('frontend.cart')->withSuccess($msg);
    }

    /**
     * Destory cart.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        if (count($cart) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back()->with('success', __('Cart item removed successfully.'));
    }

    /**
     * Promo store.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function promoStore(Request $request)
    {
        return response()->json($this->repository->promoStore($request));
    }

    /**
     * Shipping Store.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function shippingStore(Request $request)
    {
        return redirect()->route('frontend.checkout');
    }

    /**
     * Update cart.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update($id)
    {
        return view('frontend.catalog.cart_form', [
            'item'       => Item::findOrFail($id),
            'attributes' => Item::findOrFail($id)->attributes,
            'cart_item'  => Session::get('cart')[$id]
        ]);
    }

    /**
     * Shipping Charge.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function shippingCharge(Request $request)
    {
        $charges = [];
        $items   = [];
        foreach ($request->user_id as $data) {
            $check = explode('|', $data);
            $charges[] = $check[0];
            $items[]   = $check[1];
        }
        $cart = Session::get('cart');
        $delivery_amount = 0;
        foreach ($charges as $index => $charge) {
            if ($charge != 0) {
                $vendor_charge = Item::findOrFail($items[$items])->user->shipping->price;
                $delivery_amount += $vendor_charge;
                $cart[$items[$index]]['delivery_charge'] = $vendor_charge;
            } else {
                $cart[$items[$index]]['delivery_charge'] = 0;
            }
        }
        Session::put('cart', $cart);
        return response()->json([
            'delivery' => PriceHelper::setPrice($delivery_amount),
            'main' => $delivery_amount
        ]);
    }

    /**
     * Header cart resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function headerCartLoad()
    {
        return view('frontend._inc.header_cart');
    }

    /**
     * Cart resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function cartLoad()
    {
        return view('frontend._inc.cart');
    }

    /**
     * Clear Cart.
     *
     * @return \Illuminate\Http\Response
    */
    public function cartClear()
    {
        Session::forget('cart');
        return back()->with('success', __('Cart cleared successfully.'));
    }

    // NEW MODIFIED ROUTES FOR CART CONTROLLER :::::::::::::::::::::::::::::::::::::::::::::::::
    public function addCart($id,$qty){

       $product = Item::where('id',$id)->first();
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
    
                    Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $qty,
                    'price' => $product->discount_price,
                    // 'weight' => 1,
                    'options' => [
                    'image' => $product->photo,
                    'slug' => $product->slug,
                    // 'color' => $request->color,
                    ]
                    ]);
                return response()->json(['success' => 'Item added to cart.'],200); 
        
    }

    public function myCart(){
        
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();
        $subtotal = Cart::subtotal();

        return response()->json([
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => $cart_total,
            'sub_total' => $subtotal
        ], 200);
    }

    public function updateCart($rowId,$qty){
        Cart::update($rowId,$qty);
        return response()->json(['success' => 'Cart updated.','qty'=>Cart::count()],200);
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        // if (Session::has('coupon')) {
        //     $coupon_name = Session::get('coupon')['coupon_name'];
        //     $coupon = Coupon::where('coupon_name', $coupon_name)->first();
        //     Session::put('coupon',[
        //         'coupon_name' => $coupon->coupon_name,
        //         'coupon_discount' => $coupon->coupon_discount,
        //         'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
        //         'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
        //     ]);
        // }
        return response()->json(['success' => 'Item removed successfully'],200);
    }

    public function mySingleCart($pid){
        $cartItem = Cart::content()->where('id', $pid)->first();
        return response()->json(['cart' => $cartItem],200);
    }
    // NEW MODIFIED ROUTES FOR CART CONTROLLER :::::::::::::::::::::::::::::::::::::::::::::::::
}
