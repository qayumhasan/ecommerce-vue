<template>

	

   <section class="product-items-slider section-padding">
      <div class="container">
         <div class="section-header">
            <h5 class="heading-design-h5">Top Savers Today<span class="badge badge-success">20% OFF</span>
               <a class="float-right text-secondary" href="shop.html">View All</a>
            </h5>
         </div>

         <div class="row">
            <div class="col-md-3 col-xs-12 mb-4" v-for="(product,index) in products.data" :key="index">
               <div class="product">
                  
                     <div class="product-header">
                        <img class="img-fluid" :src="'public/uploads/products/thumbnail/'+product.thumbnail_img" alt="">
                        <span class="veg text-success mdi mdi-circle"></span>
                     </div>
                     <div class="product-body">
                        <router-link :to="{name:'singleproduct',params:{product_slug:product.slug,id:product.id}}"><h5>{{product.product_name}}</h5></router-link>
                        <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                     </div>
                     <div class="product-footer">
                        <p class="offer-price mb-0">${{product.product_price}} <i class="mdi mdi-tag-outline"></i></p>
                        <button @click="addtocart(product)" type="button"
                           class="btn btn-secondary btn-sm"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                     </div>
                  
               </div>
            </div>


            



         </div>
         <div class="row">
            <div class="col-md-12 text-center ml-auto">
               <pagination :data="products" @pagination-change-page="getProduct"></pagination>
            </div>
         </div>



      </div>
     

   </section>
</template>

<script>
   export default{
      data(){
         return {
            products:{},

         }
      },

      mounted(){
     
         this.getProduct();
      },
   
      methods:{
         getProduct(page = 1){

               axios.get('api/products?page=' + page)
                  .then(response => {
                     
                     this.products = response.data;
                     console.log(response.data);
                  });
            
         },
         addtocart(product){
            return this.$store.dispatch('addtocart',{
               product:product,
               qty:1
            });
         }
      }
   }
</script>