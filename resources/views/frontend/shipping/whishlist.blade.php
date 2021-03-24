@extends('layouts.websiteapp')
@section('title', 'Wishlist | '.$seo->meta_title)
@section('content')
<div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Whishlist</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-whishlist">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Wishlist</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive" id="wishlisttable">

                    </div>
                </div>
            </div>
        </div>
    </div>

  @include('frontend.include.newsletter._subcribtion')

<script>
$( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{ route('get.wish.data') }}",

            success: function(data) {


                $('#wishlisttable').html(data);

            }
        });

});

</script>
<!--   <script type="text/javascript">
        $(document).ready(function () {
            $('.deletewish').on('click', function () {
                var id = $(this).data('id');
                //alert(id);
                if (id) {

                    $.ajax({
                        url: "{{ url('/product/add/wishlist/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        processData: false,
                        success: function (data) {
                            if (data.check) {
                                  iziToast.error({
                                        message: 'This Product All ready Add wishlist',
                                        'position':'topRight'
                                    });

                            } else {
                                    iziToast.success({
                                        message: 'Product Add to wishlist ',
                                        'position':'topRight'
                                    });
                            }
                        }
                    });
                } else {
                    //alert('danger');
                }
            });

        });
    </script> -->

@endsection
