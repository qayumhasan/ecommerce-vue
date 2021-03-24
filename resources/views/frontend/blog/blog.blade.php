@extends('layouts.websiteapp')
@section('title', 'Blog | '.$seo->meta_title)
@section('content')
<section class="blog-page section-padding">
       <div class="container">
          <div class="row">
             <div class="col-md-8">
               @foreach($blogs as $data)
                <div class="card blog mb-4">
                   <div class="blog-header">
                      <a href="{{url('/product/blog/details/'.$data->id)}}"><img class="card-img-top" src="{{asset('public/uploads/blog/'.$data->image)}}" alt="Card image cap"></a>
                   </div>
                   <div class="card-body">
                      <h5 class="card-title"><a href="{{url('/product/blog/details/'.$data->id)}}">{{$data->blog_title}}</a></h5>
                      <div class="entry-meta">
                         <ul class="tag-info list-inline">
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-calendar"></i>  {{$data->month}} {{$data->date}}</a></li>
                            <!-- <li class="list-inline-item"><i class="mdi mdi-folder"></i> <a rel="category tag" href="#">Image</a></li> -->
                            <li class="list-inline-item"><i class="mdi mdi-tag"></i> @foreach(explode(",",$data->meta_tag) as $tag) <a rel="tag" href="">{{$tag}}</a>, @endforeach</li>
                            <!-- <li class="list-inline-item"><i class="mdi mdi-comment-account-outline"></i> <a href="#">4 Comments</a></li> -->
                         </ul>
                      </div>
                      <p class="card-text">{!!Str::limit($data->description,300)!!}
                      <a href="{{url('/product/blog/details/'.$data->id)}}">READ MORE <span class="mdi mdi-chevron-right"></span></a>
                   </div>
                </div>
                @endforeach


                <ul class="pagination justify-content-center mt-4">
                    {{$blogs->links()}}
                </ul>
             </div>
             <div class="col-md-4">
                <!-- <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <div class="input-group">
                         <input type="text" placeholder="Search For" class="form-control">
                         <div class="input-group-append">
                            <button type="button" class="btn btn-secondary">Search <i class="mdi mdi-arrow-right"></i></button>
                         </div>
                      </div>
                   </div>
                </div> -->
                <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <h5 class="card-title mb-3">Categories</h5>
                      <ul class="sidebar-card-list">
                        @foreach(DB::table('post_categoris')->where('status',1)->get() as $cate)
                         <li><a href="#"> {{$cate->name}}</a></li>
                        @endforeach

                      </ul>
                   </div>
                </div>
                <!-- <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <h5 class="card-title mb-3">Archives</h5>
                      <ul class="sidebar-card-list">
                        @php
                          $to=Carbon\Carbon::now()->format('F');
                          $from = date('F', strtotime('-1 month', strtotime($to)));
                          $last = date('F', strtotime('-2 month', strtotime($to)));
                        @endphp

                         <li><a href="#"><i class="mdi mdi-chevron-right"></i>{{ Carbon\Carbon::now()->format('F') }}, {{Carbon\Carbon::now()->format('Y')}}</a></li>
                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> {{ $from }}, {{Carbon\Carbon::now()->format('Y')}}</a></li>



                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> {{$last}}, {{Carbon\Carbon::now()->format('Y')}}</a></li>

                      </ul>
                   </div>
                </div> -->
                <!-- <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <h5 class="card-title mb-3">Tags</h5>
                      <div class="tagcloud">
                         <a class="tag-cloud-link" href="#">coupon</a>
                         <a class="tag-cloud-link" href="#">deals</a>
                         <a class="tag-cloud-link" href="#">discount</a>
                         <a class="tag-cloud-link" href="#">envato</a>
                         <a class="tag-cloud-link" href="#">gallery</a>
                         <a class="tag-cloud-link" href="#">sale</a>
                         <a class="tag-cloud-link" href="#">shop</a>
                         <a class="tag-cloud-link" href="#">stores</a>
                         <a class="tag-cloud-link" href="#">video</a>
                         <a class="tag-cloud-link" href="#">vimeo</a>
                         <a class="tag-cloud-link" href="#">youtube</a>
                      </div>
                   </div>
                </div>
                <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <h5 class="card-title mb-4">Newsletter</h5>
                      <div class="input-group">
                         <input type="text" placeholder="Your email address" class="form-control">
                         <div class="input-group-append">
                            <button type="button" class="btn btn-secondary">Sign up <i class="mdi mdi-arrow-right"></i></button>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="card sidebar-card mb-4">
                   <div class="card-body">
                      <h5 class="card-title mb-3">Meta</h5>
                      <ul class="sidebar-card-list">
                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> Log in</a></li>
                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> Entries RSS</a></li>
                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> Comments RSS</a></li>
                         <li><a href="#"><i class="mdi mdi-chevron-right"></i> WordPress.org</a></li>
                      </ul>
                   </div>
                </div> -->
             </div>
          </div>
       </div>
    </section>

    <!-- Footer -->

    <!-- End Footer -->


@endsection
