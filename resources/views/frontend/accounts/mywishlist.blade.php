@extends('layouts.websiteapp')
@section('title', 'my-Wish-List | '.$seo->meta_title)
@section('content')
<section class="account-page section-padding">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 mx-auto">
                <div class="row no-gutters">
                  @include('frontend.include.accounts.menu')
                   <div class="col-md-8">
                      <div class="card card-body account-right">
                         <div class="widget">
                            <div class="section-header">
                               <h5 class="heading-design-h5">
                                  
                               </h5>
                            </div>
                            <div class="row no-gutters">
                               <div class="col-md-6">
                                  <div class="product">
                                     <a href="#">
                                        <div class="product-header">
                                           <span class="badge badge-success">50% OFF</span>
                                           <img alt="" src="img/item/1.jpg" class="img-fluid">
                                           <span class="veg text-success mdi mdi-circle"></span>
                                        </div>
                                        <div class="product-body">
                                           <h5>Product Title Here</h5>
                                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                        </div>
                                        <div class="product-footer">
                                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
                                           <button class="btn btn-secondary btn-sm" type="button"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                        </div>
                                     </a>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="product">
                                     <a href="#">
                                        <div class="product-header">
                                           <span class="badge badge-success">50% OFF</span>
                                           <img alt="" src="img/item/2.jpg" class="img-fluid">
                                           <span class="veg text-success mdi mdi-circle"></span>
                                        </div>
                                        <div class="product-body">
                                           <h5>Product Title Here</h5>
                                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                        </div>
                                        <div class="product-footer">
                                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
                                           <button class="btn btn-secondary btn-sm" type="button"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                        </div>
                                     </a>
                                  </div>
                               </div>
                            </div>
                            <div class="row no-gutters">
                               <div class="col-md-6">
                                  <div class="product">
                                     <a href="#">
                                        <div class="product-header">
                                           <span class="badge badge-success">50% OFF</span>
                                           <img alt="" src="img/item/9.jpg" class="img-fluid">
                                           <span class="veg text-success mdi mdi-circle"></span>
                                        </div>
                                        <div class="product-body">
                                           <h5>Product Title Here</h5>
                                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                        </div>
                                        <div class="product-footer">
                                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
                                           <button class="btn btn-secondary btn-sm" type="button"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                        </div>
                                     </a>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="product">
                                     <a href="#">
                                        <div class="product-header">
                                           <span class="badge badge-success">50% OFF</span>
                                           <img alt="" src="img/item/5.jpg" class="img-fluid">
                                           <span class="veg text-success mdi mdi-circle"></span>
                                        </div>
                                        <div class="product-body">
                                           <h5>Product Title Here</h5>
                                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                        </div>
                                        <div class="product-footer">
                                           <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
                                           <button class="btn btn-secondary btn-sm" type="button"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                        </div>
                                     </a>
                                  </div>
                               </div>
                            </div>
                              <nav>
                               <ul class="pagination justify-content-center mt-4">
                                <li class="page-item disabled">
                                   <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item active">
                                   <span class="page-link">
                                   2
                                   <span class="sr-only">(current)</span>
                                   </span>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item">
                                   <a href="#" class="page-link">Next</a>
                                </li>
                               </ul>
                              </nav>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>

@endsection
