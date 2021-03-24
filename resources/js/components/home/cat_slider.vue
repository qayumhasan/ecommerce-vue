<template>
 <section class="osahan-carousel-two  border-top py-4">
      <div class="container">
         <div class="row">
            <categories></categories>
          
<slider></slider>



         </div>
      </div>
   </section>
</template>

<script>
   import slider from './slider';
   import categories from './categories';
   export default{

      data(){
         return{

         }
      },
      components:{
         slider,
         categories
      }
   }

</script>