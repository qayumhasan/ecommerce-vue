@extends('layouts.websiteapp')
@section('title', 'Faq | '.$seo->meta_title)
@section('content')
<section class="section-padding bg-dark inner-header">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h1 class="mt-0 mb-3 text-white">Faq</h1>
               <div class="breadcrumbs">
                  <p class="mb-0 text-white"><a class="text-white" href="{{url('/')}}">Home</a>  /  <span class="text-success">Faq</span></p>
               </div>
            </div>
         </div>
      </div>
   </section>
<section class="faq-page section-padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-12 mx-auto">
                 <div class="row">
                   <div class="col-md-2"></div>
                    <div class="col-lg-8 col-md-8">
                       <div class="card card-body">
                          <div class="accordion" id="accordionExample">

                             <!-- <div class="card mb-0">
                                <div class="card-header" id="headingOne">
                                   <h6 class="mb-0">
                                      <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <i class="icofont icofont-question-square"></i>   Where can I get access to Capital IQ?
                                      </a>
                                   </h6>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                   <div class="card-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil helvetica, craf.
                                   </div>
                                </div>
                             </div>

                             <div class="card mb-2 mt-2">
                                <div class="card-header" id="headingTwo">
                                   <h6 class="mb-0">
                                      <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                      <i class="icofont icofont-question-square"></i>   How do I get access to case studies?
                                      </a>
                                   </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                   <div class="card-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil helvetica, craf.
                                   </div>
                                </div>
                             </div>
                              -->
                            @foreach($allfaq as $key=> $faq)
                             <div class="card">
                                <div class="card-header" id="headingThree">
                                   <h6 class="mb-0">
                                      <a href="#" data-toggle="collapse" data-target="#collapseThree{{++$key}}" aria-expanded="true" aria-controls="collapseThree">
                                      <i class="icofont icofont-question-square"></i>  {{$faq->faq_ques}}
                                      </a>
                                   </h6>
                                </div>
                                <div id="collapseThree{{$key}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                   <div class="card-body">
                                     {{$faq->faq_ans}}
                                   </div>
                                </div>
                             </div>
                             @endforeach



                          </div>
                       </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                       <div class="card card-body">
                          <div class="section-header">
                             <h5 class="heading-design-h5">
                                Ask us question
                             </h5>
                          </div>
                          <form>
                             <div class="row">
                                <div class="col-sm-12">
                                   <div class="form-group">
                                      <label class="control-label">Your Name <span class="required">*</span></label>
                                      <input class="form-control border-form-control" value="" placeholder="Enter Name" type="text">
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label class="control-label">Email Address <span class="required">*</span></label>
                                      <input class="form-control border-form-control " value="" placeholder="ex@gmail.com" type="email">
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group">
                                      <label class="control-label">Phone <span class="required">*</span></label>
                                      <input class="form-control border-form-control" value="" placeholder="Enter Phone" type="number">
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12">
                                   <div class="form-group">
                                      <label class="control-label">Your Message <span class="required">*</span></label>
                                      <textarea class="form-control border-form-control"></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12 text-right">
                                   <button type="button" class="btn btn-danger btn-lg"> Cencel </button>
                                   <button type="button" class="btn btn-success btn-lg"> Send Message </button>
                                </div>
                             </div>
                          </form>
                       </div>
                    </div> -->
                 </div>
              </div>
           </div>
        </div>
     </section>


@endsection
