@extends('layouts.websiteapp')
@section('title', 'PAyment | '.$seo->meta_title)
@section('content')
<main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="user-information.html">Account</a></li>
                    <li>Payment</li>
                </ul>
            </div>
        </div>

        <section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Payment</h3>
                </div>
                <div class="ps-section__content">

                        <div class="ps-form__content">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--shipping">
                                        <div class="ps-block__panel">
                                            <figure><small>Contact</small>
                                                <p><a href="#">{{$address->phone}}</a></p>
                                            </figure>
                                            <figure><small>Ship to</small>
                                                <p>{{$address->address}}</p>
                                            </figure>
                                        </div>
                                        <h4>Shipping method</h4>
                                        <div class="ps-block__panel">
                                            <figure><small>International Shipping</small><strong> $20.00</strong></figure>
                                        </div>
                                        <h4>Payment Methods</h4>
                                        @php
                                            $active=App\Activation::first();
                                        @endphp
                                        <div class="ps-block--payment-method">
                                            <ul class="ps-tab-list">
                                            @if($active->stripe==1)
                                                <li class="active"><a class="ps-btn ps-btn--sm" href="#visa">Visa / Master Card</a></li>
                                            @endif
                                            <!--     <li><a class="ps-btn ps-btn--sm" href="#paypal">Paypal</a></li> -->
                                                @if($active->ssl_commercez==1)
                                                <li><a class="ps-btn ps-btn--sm" href="#sslcommer">SslCommerz</a></li>
                                                @endif
                                                 @if($active->surjopay==1)
                                                <li><a class="ps-btn ps-btn--sm" href="#surjopay">Surjopay</a></li>
                                                @endif

                                            </ul>
                                            <div class="ps-tabs">
                                                 @if($active->stripe==1)
                                                <div class="ps-tab active" id="visa">
                                                    <form action="{{route('payment.make.payment')}}" method="post">
                                                        @csrf
                                                       <input class="form-control" type="hidden" name="payment_method_id"value="2" id="pay_method">

                                                    <input type="hidden" name="payment_secure_id" value="{{ $orderPlace->payment_secure_id }}">
                                                    <input type="hidden" name="order_id" value="{{ $orderPlace->order_id }}">

                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
                                                        </div>
                                                    </form>



                                                </div>
                                                @endif
                                                <div class="ps-tab" id="paypal">
                                                    <form action="{{route('payment.make.payment')}}" method="post">
                                                         @csrf
                                            <input class="form-control" type="hidden" name="payment_method_id" value="3" id="pay_method" checked>
                                            <input type="hidden" name="payment_secure_id" value="{{ $orderPlace->payment_secure_id }}">
                                            <input type="hidden" name="order_id" value="{{ $orderPlace->order_id }}">

                                                         <button class="ps-btn" type="submit">Proceed with Paypal</button>
                                                    </form>
                                                </div>
                                                 @if($active->ssl_commercez==1)
                                                <div class="ps-tab" id="sslcommer">

                                                    <form action="{{route('payment.make.payment')}}" method="post">
                                                         @csrf
                                                        <input class="form-control" type="hidden" name="payment_method_id" value="4" id="pay_method" checked>
                                                        <input type="hidden" name="payment_secure_id" value="{{ $orderPlace->payment_secure_id }}">
                                                        <input type="hidden" name="order_id" value="{{ $orderPlace->order_id }}">

                                                         <button class="ps-btn" type="submit">Proceed with SslCommerz</button>
                                                    </form>


                                                </div>
                                                @endif
                                                @if($active->surjopay==1)
                                                <div class="ps-tab" id="surjopay">

                                                    <form action="{{url('/compare/surjopay/payment')}}" method="post">
                                                         @csrf
                                                        <input class="form-control" type="hidden" name="payment_method_id" value="5" id="pay_method" checked>
                                                        <input type="hidden" name="payment_secure_id" value="{{ $orderPlace->payment_secure_id }}">
                                                        <input type="hidden" name="order_id" value="{{ $orderPlace->order_id }}">
                                                        <input type="hidden" name="amount" value="{{$orderPlace->total_price}}">

                                                         <button class="ps-btn" type="submit">Proceed with surjo pay</button>
                                                    </form>


                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__items">

                                                @foreach($cartdata->products as $row)
                                                <a href="#"><strong>{{$row->name}}</strong><span>{{$row->quantity}} x<small>৳ {{$row->price}}</small></span></a>
                                                @endforeach
                                            </figure>
                                            @if($coupon != false)
                                            <figure>
                                            @if($coupon->discount_type == 1)
                                                <figcaption><strong>Subtotal</strong><strong>{{$orderPlace->total_price - $coupon->discount}}</strong></figcaption>
                                            @else
                                                @php
                                                    $subtotal = ($orderPlace->total_price * $coupon->discount) /100;
                                                    $total = $orderPlace->total_price - $subtotal;
                                                @endphp
                                                <figcaption><strong>Subtotal</strong><strong>{{$total}}</strong></figcaption>
                                            @endif
                                            </figure>

                                            <figure>
                                                @if($coupon->discount_type == 1)
                                                <figcaption><strong>Discount</strong><strong>৳ {{$coupon->discount}}</strong></figcaption>
                                                @else()
                                                <figcaption><strong>Discount</strong><strong>{{$coupon->discount}} %</strong></figcaption>
                                                @endif
                                            </figure>
                                            @endif
                                            <figure class="ps-block__total">
                                                <h3>Total<strong>৳ {{$orderPlace->total_price}}</strong></h3>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>


        @include('frontend.include.newsletter._subcribtion')


    </main>
    <script>

    //Create a Stripe client.
    var stripe = Stripe('pk_test_GODxOVYLzZEyYQNAd2dMsmEi00lH6kmTMn');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#000000',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#f41111',
            iconColor: '#f92222'
        }
    };

    //reate an instance of the card Element.
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');



    // Element ended here

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    //Handle form submission.

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        var holder_name = document.getElementById('holder_name').value;
        var options = {
            name: holder_name
        };
        stripe.createToken(card, options).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {

        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>s
@endsection
