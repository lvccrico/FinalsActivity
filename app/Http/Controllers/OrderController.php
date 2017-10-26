<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shipping;
use \Cart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        
        // $customer = Customer::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'address' => $data['address']
        // ]);

        // $user = new User;
        // $user->email = $data['email'];
        // $user->password = bcrypt($data['password']);

        // $cart = new Cart; 
        // $cart->customer()->associate($customer);
        // $cart->save();

        // $customer->user()->save($user);

        $shipping = Shipping::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number
        ]);

    	$order = new Order;
		$order->total_amount = $request->total_amount;
		$order->total_items = $request->total_items;
        $order->shipping()->associate($shipping);

    	$user_order = Auth::user()->orders()->save($order);

        // Cart::store($user_order->id);

        // Cart::destroy();

        return view('thankyou');
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
