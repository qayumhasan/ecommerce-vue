@extends('layouts.websiteapp')
@section('title', 'Warranty | '.$seo->meta_title)
@section('content')

   <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Warranty</li>
                </ul>
            </div>
        </div>
        <div class="ps-faqs">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Frequently Asked Questions for Product Warranty</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--faqs">
                            <tbody>
                            	@foreach($allwarranty as $warranty)
                                <tr>
                                    <td class="question">{{$warranty->w_ques}}</td>
                                    <td>{{$warranty->w_ans}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-call-to-action">
            <div class="container">
                <h3>We’re Here to Help !<a href="{{route('contract.us')}}"> Contact us</a></h3>
            </div>
        </div>
    </div>

@endsection
