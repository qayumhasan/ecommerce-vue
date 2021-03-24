<template>
	<div>
		  <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits & Vegetables</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>
               </div>
            </div>
         </div>
      </section>
      <section class="shop-single section-padding pt-3">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="shop-detail-slider">
                        <div class="favourite-icon">
                           <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="59% OFF"><i class="mdi mdi-tag-outline"></i></a>
                        </div>
                        <div id="sync1" class="owl-carousel">

                           <div class="item" v-for="(item,index) in getSingleProduct.image" :key="index">
                              
                              <img alt=""  :src="'storage/app/public/'+item" class="img-fluid img-center">
                           </div>

                        </div>
                        <div id="sync2" class="owl-carousel">

                           <div class="item" v-for="(item,index) in getSingleProduct.image" :key="index">
                              <img alt="" :src="'storage/app/public/'+item" class="img-fluid img-center">
                           </div>
                         
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shop-detail-right">
                     <h2>{{getSingleProduct.product_name}}</h2>
                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                     <p class="offer-price mb-0">Price : <span class="text-success">$ {{getSingleProduct.product_price}}</span></p>

                     <button type="button" @click="addtocart(getSingleProduct)" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                     <div class="short-description">
                        <h5>
                           Quick Overview  
                           <p class="float-right">Availability: <span class="badge badge-success">In Stock</span></p>
                           <div class="item">
                              
                              <img alt=""  src="" class="img-fluid img-center">
                           </div>
                        </h5>
                        
                     </div>
                     <h6 class="mb-3 mt-4">Why shop from Groci?</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-truck-fast"></i>
                              <h6 class="text-info">Free Delivery</h6>
                              <p>Lorem ipsum dolor...</p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-basket"></i>
                              <h6 class="text-info">100% Guarantee</h6>
                              <p>Rorem Ipsum Dolor sit...</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="section-padding bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-truck-fast"></i>
                     <h6>Free & Next Day Delivery</h6>
                     <p>Lorem ipsum dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-basket"></i>
                     <h6>100% Satisfaction Guarantee</h6>
                     <p>Rorem Ipsum Dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-tag-heart"></i>
                     <h6>Great Daily Deals Discount</h6>
                     <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
	</div>
</template>

<script>
   export default{
      name:'Single_Product',
      data(){
         return{

         }
      },
      mounted(){
         var id = this.$route.params.id;
         return this.$store.dispatch('singleProduct',{id:id});
      },
      computed:{
         getSingleProduct(){
            
            return this.$store.getters.getSingleProduct;

         }
      },
      methods:{
           addtocart(product){
            return this.$store.dispatch('addtocart',{
               product:product,
               qty:1
            });
         }
      }
   }
</script>