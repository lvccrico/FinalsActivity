<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shipping;
use App\Payment;
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

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:200',
            'address' => 'required|string|max:200',
            'city' => 'required|string|max:50',
            'zip_code' => 'required|string|max:4',
            'phone_number' => 'required|string|max:11',
            'phone_number' => 'required|string|max:11',
            'card_type' => 'required',
            'card_number' => 'required|numeric|min:16',
            'card_code' => 'required|numeric|min:3',
            'exp_month' => 'required',
            'exp_year' => 'required',

        ]);
         
        $contents = Cart::content();
        foreach ($contents as $content => $value) {
            $items[$value->id]['product_id'] = $value->id;
            $items[$value->id]['price'] = $value->price;
            $items[$value->id]['qty'] = $value->qty;
        }

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

        $payment = Payment::create([
            'card_type' => $request->card_type,
            'card_number' => $request->card_number,
            'card_code' => $request->card_code,
            'exp_month' => $request->exp_month,
            'exp_year' => $request->exp_year
        ]);

    	$order = new Order;
		$order->total_amount = $request->total_amount;
		$order->total_items = $request->total_items;

        $order->shipping()->associate($shipping);
        $order->payment()->associate($payment);

    	$user_order = Auth::user()->orders()->save($order);
        $user_order->items()->attach($items);

        Cart::destroy();

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
