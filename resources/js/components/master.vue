<template>
<div>
    



    <loginComponent></loginComponent>
   <div class="navbar-top pt-2 pb-2">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <a href="#" class="mb-0 text-white">
                  20% cashback for all users | Code: <strong><span class="text-light">OGOFERS13 <span
                           class="mdi mdi-tag-faces"></span></span> </strong> </a>
            </div>
            <div class="col-md-6 text-right">
               <a href="#" class="text-white"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i> New York</a>
               <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="text-white ml-3 mr-3"><i
                     class="mdi mdi-lock"></i> Sign In</a>
               <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="text-white"><i
                     class="mdi mdi-account-circle"></i> Sign Up</a>
            </div>
         </div>
      </div>
   </div>
   <nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
      <div class="container">
         <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>

         <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse"
            data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse" id="navbarNavDropdown ">
            <div class="navbar-nav mr-auto mt-5 mt-lg-2 margin-auto top-categories-search-main">
               <div class="top-categories-search">
                  <div class="input-group">
                     <span class="input-group-btn categories-dropdown">
                        <select class="form-control-select">
                           <option selected="selected">Your City</option>
                           <option value="0">New Delhi</option>
                           <option value="2">Bengaluru</option>
                           <option value="3">Hyderabad</option>
                           <option value="4">Kolkata</option>
                        </select>
                     </span>
                     <input class="form-control" placeholder="Search products in Your City"
                        aria-label="Search products in Your City" type="text">
                     <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i>
                           Search</button>
                     </span>
                  </div>
               </div>
            </div>
            <div class="my-2 my-lg-0">
               <ul class="list-inline main-nav-right">
                  <li class="list-inline-item cart-btn">
                     <a href="#" data-toggle="offcanvas" class="btn btn-link border-none"><i class="mdi mdi-cart"></i>
                        My Cart <small class="cart-value">{{cartItemCount}}</small></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>

<MenuArea></MenuArea>



<router-view></router-view>



     <!-- Footer -->
<FooterArea></FooterArea>

</div>


</template>

<script>
 
   import FooterArea from './inc/footer';
   import MenuArea from './inc/menu';
   
   export default {
      data(){
         return{

         }
      },
      components:{
            MenuArea,
            FooterArea,
            
      },
      computed:{
         cartItemCount(){
            return this.$store.getters.cartItemCount;
         }
      }
   }
</script>