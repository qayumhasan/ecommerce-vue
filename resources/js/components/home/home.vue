<template>


<div>
   
   
   <!-- menu area start -->
   
<CatSlider></CatSlider>


<!-- product area start -->
<product></product>






   <section class="offer-product">
      <div class="container">
         <div class="row no-gutters">
            <div class="col-md-6">
               <a href="#"><img class="img-fluid" src="img/ad/1.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
               <a href="#"><img class="img-fluid" src="img/ad/2.jpg" alt=""></a>
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
import product from './product';
import bestoffer from './bestoffer';
import CatSlider from './cat_slider';
   export default{
      data(){
         return {
         
         }
      },
      components:{
         product,
         bestoffer,
         CatSlider

      }
   }
</script>