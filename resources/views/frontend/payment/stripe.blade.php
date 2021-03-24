@extends('layouts.websiteapp')
@section('title', 'Stripe| '.$seo->meta_title)
@section('content')

<style>
    .payment-form {
        display: flex;
        justify-content: center;
        align-self: center;
    }

    .stripe_form {
        width: 600px;
    }

    .payment_heading_section {
        width: 500px;
        display: flex;
        justify-content: center;
        align-self: center;
    }

    .heading_text {
        font-size: 16px;
        margin-left: 278px;
    }

    img.stripe_logo {
        margin-left: 180px;
    }

    .stripe_payment_section {
        margin-top: 81px;
    }

    .payment-button {
        width: 100%;
        margin-top: 10px;
    }

    form#payment-form {
        padding: 10px;
        border-radius: 4px;
        background: #e3e8ee;
    }

    .name_field {
        background: #ffffff !important;
    }

    /* fdfdfdf */
    input,
    .StripeElement {
        height: 40px;
        padding: 10px 12px;
        width: 100%;
        color: #32325d;
        background-color: white;
        border: 1px solid transparent;
        border-radius: 4px;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    input:focus,
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #f92222 !important;
    }

    #card-errors {
        color: red;
        font-size: 15px;
        font-weight: bolder;
    }

    .text-error {
        color: #f92222;
    }
</style>

<!-- Main Container  -->
<div style="height:50vh;" class="stripe_payment_section">
    <div class="container">
        <div class="payment_heading_section text-center">
            <h2 class="heading_text w-100">Payment</h2>
        </div>
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="sripe_payment">

            <div class="payment-form">

                <form action="{{ route('payment.stripe.submit', $orderInfo->payment_secure_id) }}" class="stripe_form" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group">
                        <label for="">
                            <strong>Card Holder Name</strong>
                        </label>
                        <input type="text" name="holder_name" id="holder_name" class="form-control name_field"
                            placeholder="John Doa" aria-describedby="helpId">
                        <span id="helpId card-errors" class="text-error">{{ $errors->first('holder_name') }}</span>
                    </div>
                    <div class="form-row" id="stripe_section">
                        <label for="card-element">
                            <strong>Credit or debit card</strong>
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display Element errors. -->
                        <strong>
                            <div id="card-errors" role="alert"></div>
                        </strong>
                    </div>
                    <div class="hidden_field">
                        <input type="hidden" name="total_price" value="{{ $orderInfo->total_price }}">
                        <input type="hidden" name="total_quantity" value="{{ $orderInfo->total_quantity }}">
                        <input type="hidden" name="invoice_no" value="{{ $orderInfo->order_id }}">
                        <input type="hidden" name="user_id" value="{{ $orderInfo->user_id }}">
                        <input type="hidden" name="paid_time" value="{{ $orderInfo->created_at }}">
                        <input type="hidden" name="order_id" value="{{ $orderInfo->id }}">
                    </div>
                    <button class="btn btn-sm btn-success payment-button" type="submit" style="background-color: #fffe01;color:#000; font-size: 2.875rem;">Pay ({{ $orderInfo->total_price }})</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://js.stripe.com/v3/"></script>
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
</script>


@endsection
