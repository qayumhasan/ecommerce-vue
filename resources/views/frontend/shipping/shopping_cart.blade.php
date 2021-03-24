@extends('layouts.websiteapp')
@section('title', 'Shopping Cart| '.$seo->meta_title)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="">Cart</a>
              </div>
           </div>
        </div>
     </section>
 <section class="cart-page section-padding">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="card card-body cart-table" id="cartdata">



              </div>

           </div>
        </div>
     </div>
  </section>

<script>
    $( document ).ready(function() {
        // alert("Success");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ route('get.cart.data') }}",

                success: function(data) {


                    $('#cartdata').html(data);

                }
            });

});
</script>



@endsection
