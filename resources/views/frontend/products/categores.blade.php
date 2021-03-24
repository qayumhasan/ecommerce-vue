@extends('layouts.websiteapp')
@section('content')

<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Shop</a>
           </div>
        </div>
     </div>
  </section>
  <section class="shop-list section-padding">
     <div class="container">
        <div class="row">
           <div class="col-md-3">
       <div class="shop-filters">
        <div id="accordion">
         <div class="card">
          <div class="card-header" id="headingOne">
             <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Category <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
             <div class="card-body card-shop-filters">
              <form class="form-inline mb-3">
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Search By Category">
                <button type="submit" class="pl-2 pr-2 btn btn-secondary btn-lg"><i class="mdi mdi-file-find"></i></button>
               </div>
              </form>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb1">
               <label class="custom-control-label" for="cb1">All Fruits </label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb8">
               <label class="custom-control-label" for="cb8">Fresh & Herbs <span class="badge badge-primary">5% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb2">
               <label class="custom-control-label" for="cb2">Seasonal Fruits <span class="badge badge-secondary">NEW</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb3">
               <label class="custom-control-label" for="cb3">Imported Fruits <span class="badge badge-danger">10% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb4">
               <label class="custom-control-label" for="cb4">Citrus <span class="badge badge-info">50% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb5">
               <label class="custom-control-label" for="cb5">Cut Fresh & Herbs</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb6">
               <label class="custom-control-label" for="cb6">Seasonal Fruits <span class="badge badge-success">25% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="cb7">
               <label class="custom-control-label" for="cb7">Fresh & Herbs <span class="badge badge-primary">5% OFF</span></label>
              </div>
             </div>
          </div>
         </div>
         <div class="card">
          <div class="card-header" id="headingTwo">
             <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Price <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
             <div class="card-body card-shop-filters">
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="1">
               <label class="custom-control-label" for="1">$68 to $659 <span class="badge badge-warning">50% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="2">
               <label class="custom-control-label" for="2">$660 to $1014</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="3">
               <label class="custom-control-label" for="3">$1015 to $1679</label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="4">
               <label class="custom-control-label" for="4">$1680 to $1856</label>
              </div>
             </div>
          </div>
         </div>
         <div class="card">
          <div class="card-header" id="headingThree">
             <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Brand <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
             <div class="card-body card-shop-filters">
              <form class="form-inline mb-3">
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Search By Brand">
               </div>
               <button type="submit" class="btn btn-secondary ml-2">GO</button>
              </form>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="b1">
               <label class="custom-control-label" for="b1">Imported Fruits <span class="badge badge-warning">50% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="b2">
               <label class="custom-control-label" for="b2">Seasonal Fruits <span class="badge badge-secondary">NEW</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="b3">
               <label class="custom-control-label" for="b3">Imported Fruits <span class="badge badge-danger">10% OFF</span></label>
              </div>
              <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="b4">
               <label class="custom-control-label" for="b4">Citrus</label>
              </div>
             </div>
          </div>
         </div>
         <div class="card">
          <div class="card-header" id="headingThree">
             <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
              Imported Fruits <span class="mdi mdi-chevron-down float-right"></span>
              </button>
             </h5>
          </div>
          <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
             <div class="card-body">
              <div class="list-group">
               <a href="#" class="list-group-item list-group-item-action">All Fruits</a>
               <a href="#" class="list-group-item list-group-item-action">Imported Fruits</a>
               <a href="#" class="list-group-item list-group-item-action">Seasonal Fruits</a>
               <a href="#" class="list-group-item list-group-item-action">Citrus</a>
               <a href="#" class="list-group-item list-group-item-action disabled">Cut Fresh & Herbs</a>
              </div>
             </div>
          </div>
         </div>
        </div>
       </div>
       <div class="left-ad mt-4">
        <img class="img-fluid" src="http://via.placeholder.com/254x557" alt="">
       </div>
    </div>
           <div class="col-md-9">
              <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
              <div class="shop-head">
                 <a href="#"><span class="mdi mdi-home"></span> Home</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits & Vegetables</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>
                 <div class="btn-group float-right mt-2">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort by Products &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                       <a class="dropdown-item" href="#">Relevance</a>
                       <a class="dropdown-item" href="#">Price (Low to High)</a>
                       <a class="dropdown-item" href="#">Price (High to Low)</a>
                       <a class="dropdown-item" href="#">Discount (High to Low)</a>
                       <a class="dropdown-item" href="#">Name (A to Z)</a>
                    </div>
                 </div>
                 <h5 class="mb-3">Fruits</h5>
              </div>
              <div class="row no-gutters">
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/1.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/2.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/3.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
              </div>
              <div class="row no-gutters">
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/4.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/5.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/6.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
              </div>
              <div class="row no-gutters">
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/7.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/8.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                          </div>
                       </a>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="product">
                       <a href="single.html">
                          <div class="product-header">
                             <span class="badge badge-success">50% OFF</span>
                             <img class="img-fluid" src="img/item/9.jpg" alt="">
                             <span class="veg text-success mdi mdi-circle"></span>
                          </div>
                          <div class="product-body">
                             <h5>Product Title Here</h5>
                             <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                          </div>
                          <div class="product-footer">
                             <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                             <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
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
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                       <span class="page-link">
                       2
                       <span class="sr-only">(current)</span>
                       </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                       <a class="page-link" href="#">Next</a>
                    </li>
                 </ul>
              </nav>
           </div>
        </div>
     </div>
  </section>
  <section class="product-items-slider section-padding bg-white border-top">
     <div class="container">
        <div class="section-header">
           <h5 class="heading-design-h5">Best Offers View <span class="badge badge-primary">20% OFF</span>
              <a class="float-right text-secondary" href="shop.html">View All</a>
           </h5>
        </div>
        <div class="owl-carousel owl-carousel-featured">
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/7.jpg" alt="">
                       <span class="veg text-success mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/8.jpg" alt="">
                       <span class="non-veg text-danger mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/9.jpg" alt="">
                       <span class="non-veg text-danger mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/10.jpg" alt="">
                       <span class="veg text-success mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/11.jpg" alt="">
                       <span class="veg text-success mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
           <div class="item">
              <div class="product">
                 <a href="single.html">
                    <div class="product-header">
                       <span class="badge badge-success">50% OFF</span>
                       <img class="img-fluid" src="img/item/12.jpg" alt="">
                       <span class="veg text-success mdi mdi-circle"></span>
                    </div>
                    <div class="product-body">
                       <h5>Product Title Here</h5>
                       <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                    </div>
                    <div class="product-footer">
                       <button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                       <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                    </div>
                 </a>
              </div>
           </div>
        </div>
     </div>
  </section>
@endsection
