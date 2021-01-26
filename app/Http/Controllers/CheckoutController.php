<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('checkout', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'building' => 'required',
            'zip' => 'required'
        ]);

        //create checkout

        $order = new Order();

            $order->order_number = uniqid('OrderNumber-');

        $order->name= $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->province = $request->input('province');
        $order->city = $request->input('city');
        $order->street = $request->input('street');
        $order->building = $request->input('building');
        $order->zip = $request->input('zip');
        
        

        
    
       

        $order->grand_total = \Cart::session(auth()->id())->getTotal();

        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();
  
        $order->save();

        
        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item)
        {
            $order->item()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }


        $contents = \Cart::session(auth()->id())->getContent()->map(function ($item){
                        return $item->name.','.$item->quantity;
        })->values()->toJson();
            try{
                $charge = Stripe::charges()->create([
                        'amount' => \Cart::session(auth()->id())->getTotal(),
                        'currency' => 'PHP',
                        'source' => $request->stripeToken,
                        'description'=> 'Order',
                        'receipt_email' => $request->email,
                        'metadata' => [
                                    'contents' => $contents,
                                    'quantity' => \Cart::session(auth()->id())->getContent()->count()
                        ],
                ]);

                //empty Cart
                \Cart::session(auth()->id())->clear();
                //Successfull
                return redirect()->route('confirmation.index')->with('success', 'Thank You');
            }catch(Exception $e) {

            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
