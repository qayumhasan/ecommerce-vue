@extends('layouts.websiteapp')
@section('title', 'Blog Details | '.$seo->meta_title)
@section('content')

<section class="blog-page section-padding">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="card blog mb-4">
               <div class="blog-header">
                  <a href=""><img class="card-img-top" src="{{asset('public/uploads/blog/'.$blogs->image)}}" alt="Card image cap"></a>
               </div>
               <div class="card-body">
                  <h5 class="card-title"><a href="">{{$blogs->blog_title}}</a></h5>
                  <div class="entry-meta">
                     <ul class="tag-info list-inline">
                        <li class="list-inline-item"><a href=""><i class="mdi mdi-calendar"></i>  {{$blogs->month}} {{$blogs->date}}</a></li>
                        <!-- <li class="list-inline-item"><i class="mdi mdi-folder"></i> <a rel="category tag" href="#">Image</a></li> -->
                        <li class="list-inline-item"><i class="mdi mdi-tag"></i>@foreach(explode(",",$blogs->meta_tag) as $tag) <a rel="tag" href="">{{$tag}}</a>@endforeach </li>
                        <!-- <li class="list-inline-item"><i class="mdi mdi-comment-account-outline"></i> <a href="#">4 Comments</a></li> -->
                     </ul>
                  </div>
                  <p>
                      {!! $blogs->description !!}
                  </p>

                  <footer class="entry-footer">
                     <div class="blog-post-tags">
                        <ul class="list-inline">
                           <li class="list-inline-item"><i class="mdi mdi-tag"></i> Tags: </li>
                           @foreach(explode(",",$blogs->meta_tag) as $tag)
                           <li class="list-inline-item"><a rel="tag" href="">{{$tag}}</a> </li>
                           @endforeach

                        </ul>
                     </div>
                  </footer>
               </div>
            </div>
            <div class="card padding-card reviews-card mb-4">
               <div class="card-body">
                  <h5 class="card-title mb-4">Reviews</h5>
                  <div class="media mb-4">
                    <div id="fb-root"></div>
                   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
                   <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="10"></div>

                  </div>
               </div>
            </div>
            <div class="card blog">
               <!-- <div class="card-body">
                  <h5 class="card-title mb-4">Leave a Comment</h5>
                  <form name="sentMessage">
                     <div class="row">
                        <div class="control-group form-group col-lg-6 col-md-6">
                           <div class="controls">
                              <label>Your Name <span class="text-danger">*</span></label>
                              <input type="text" required="" class="form-control">
                           </div>
                        </div>
                        <div class="control-group form-group col-lg-6 col-md-6">
                           <div class="controls">
                              <label>Your Email <span class="text-danger">*</span></label>
                              <input type="email" required="" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="control-group form-group">
                        <div class="controls">
                           <label>Review <span class="text-danger">*</span></label>
                           <textarea class="form-control" cols="100" rows="10"></textarea>
                        </div>
                     </div>
                     <button class="btn btn-success" type="submit">Post Comment</button>
                  </form>
               </div> -->
            </div>
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
                     <li><a href="#">{{$cate->name}}</a></li>
                    @endforeach

                  </ul>
               </div>
            </div>
            <!-- <div class="card sidebar-card mb-4">
               <div class="card-body">
                  <h5 class="card-title mb-3">Archives</h5>
                  <ul class="sidebar-card-list">
                     <li><a href="#"><i class="mdi mdi-chevron-right"></i> December, 2017</a></li>
                     <li><a href="#"><i class="mdi mdi-chevron-right"></i> November, 2017</a></li>
                     <li><a href="#"><i class="mdi mdi-chevron-right"></i> October, 2017</a></li>
                  </ul>
               </div>
            </div> -->
            <div class="card sidebar-card mb-4">
               <div class="card-body">
                  <h5 class="card-title mb-3">Tags</h5>
                  <div class="tagcloud">
                     @foreach(explode(",",$blogs->meta_tag) as $tag)
                     <a class="tag-cloud-link" href="#">{{$tag}}</a>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="card sidebar-card mb-4">
               <div class="card-body">
                  <h5 class="card-title mb-4">Latest Posts</h5>
                  @foreach(App\Blog::OrderBy('id','DESC')->limit(4)->get() as $post)
                  <a href="{{url('/product/blog/details/'.$post->id)}}">
                     <h6>{{$post->blog_title}}</h6>
                  </a>
                  <p class="mb-0"><i class="mdi mdi-calendar-text"></i> {{$post->month}} {{$post->date}}</p>
                  <hr>
                  @endforeach

               </div>
            </div>
            <!-- <div class="card sidebar-card mb-4">
               <div class="card-body">
                  <h5 class="card-title mb-4">Newsletter</h5>
                  <div class="input-group">
                     <input type="text" placeholder="Your email address" class="form-control">
                     <div class="input-group-append">
                        <button type="button" class="btn btn-secondary">Sign up <i class="mdi mdi-arrow-right"></i></button>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- <div class="card sidebar-card mb-4">
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

  @endsection
