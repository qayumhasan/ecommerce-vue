@extends('layouts.websiteapp')
@section('title', 'Compare | '.$seo->meta_title)
@section('content')
<div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Compare Product</li>
                </ul>
            </div>
        </div>
        <div class="ps-compare ps-section--shopping">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Compare Product</h1>
                </div>
                <div class="ps-section__content" id="productcompare">

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
            url: "{{ route('get.compare.data') }}",

            success: function(data) {


                $('#productcompare').html(data);

            }
        });

});

</script>

@endsection
