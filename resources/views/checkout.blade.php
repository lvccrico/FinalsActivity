@extends('master')

@section('extra-css')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <div style="display: table; margin: auto;">
                    <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                    <span class="step_thankyou check-bc step_complete">Thank you</span>
                </div>
            </div>
            <div class="row">
                <p></p>
            </div>
            </div>
        </div>    
        <div class="row cart-body">
            <form class="form-horizontal" method="POST" action="{{ url('order') }}">
            {!! csrf_field() !!}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                    </div>
                    <div class="panel-body">

                        @foreach (Cart::content() as $item)
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img src="{{ asset('img/' . $item->model->image) }}" alt="product" class="img-responsive cart-image">
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12">{{ $item->name }}</div>
                                <div class="col-xs-12"><small>Quantity:<span>{{ $item->qty }}</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>$</span>{{ $item->subtotal }}</h6>
                            </div>
                        </div> 
                        <div class="form-group"><hr /></div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Subtotal</strong>
                                <div class="pull-right"><span>$</span><span>{{ Cart::instance('default')->subtotal() }}</span></div>
                            </div>
                            <div class="col-xs-12">
                                <small>Shipping</small>
                                <div class="pull-right"><span>-</span></div>
                            </div>
                        </div>
                        <div class="form-group"><hr /></div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--REVIEW ORDER END-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Country:</strong></div>
                            <div class="col-md-12">
                                <select class="form-control" name="country" value="">
                                    <option>Philippines</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group" {{ $errors->has('first_name') ? ' has-error' : '' }}>
                            <div class="col-md-6 col-xs-12">
                                <strong>First Name:</strong>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" />
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="span1"></div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Last Name:</strong>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" />
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email:</strong></div>
                            <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}" />
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>City:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" value="{{ old('city') }}" />
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code') }}" />
                                @if ($errors->has('zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Phone Number:</strong></div>
                            <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" />
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div> 
                    </div>
                </div>
                <!--SHIPPING METHOD END-->
                <!--CREDIT CART PAYMENT-->
                <div class="panel panel-info">
                    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card Type:</strong></div>
                            <div class="col-md-12">
                                <select id="card_type" name="card_type" class="form-control">
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">MasterCard</option>
                                    <option value="amex">American Express</option>
                                </select>
                                @if ($errors->has('card_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="card_number" value="{{ old('card_number') }}" />
                                @if ($errors->has('card_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card CVV:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="card_code" value="" />
                                @if ($errors->has('card_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Expiration Date</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="exp_month">
                                    <option value="">Month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                            </select>
                                @if ($errors->has('exp_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_month') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="exp_year">
                                    <option value="">Year</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                            </select>
                                @if ($errors->has('exp_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span>Pay secure using your credit card.</span>
                            </div>
                            <div class="col-md-12">
                                <ul class="cards">
                                    <li class="visa hand">Visa</li>
                                    <li class="mastercard hand">MasterCard</li>
                                    <li class="amex hand">Amex</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{-- <input type="hidden" name="id" value="{{ $product->id }}"> --}}
                                <input type="hidden" name="total_amount" value="{{ Cart::total() }}">
                                <input type="hidden" name="total_items" value="{{ Cart::count() }}">
                                {{-- <input type="submit" class="btn btn-success btn-lg" value="Add to Cart"> --}}
                                <button type="submit" role="submit" class="btn btn-primary btn-submit-fix btn-lg" >Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CREDIT CART PAYMENT END-->
            </div>
            
            </form>
        </div>
        <div class="row cart-footer">
        
        </div>
    </div>
@endsection

@section('extra-js')
@endsection