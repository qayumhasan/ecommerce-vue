<template>
  <div class="cart-sidebar">
    <div class="cart-sidebar-header">
      <h5>
        My Cart <span class="text-success">(5 item)</span>
        <a data-toggle="offcanvas" class="float-right" href="#"
          ><i class="mdi mdi-close"></i>
        </a>
      </h5>
    </div>
    <div class="cart-sidebar-body">
      <div
        class="cart-list-product"
        v-for="(item, index) in carts"
        :key="index"
      >
        <a class="float-right remove-cart" @click="removeproduct(item.product)"
          ><i class="mdi mdi-close"></i
        ></a>
        <img
          class="img-fluid"
          :src="
            'public/uploads/products/thumbnail/' + item.product.thumbnail_img
          "
          alt=""
        />
        <span class="badge badge-success">50% OFF</span>
        <h5>
          <a href="#">{{ item.product.product_name }}</a>
        </h5>
        <h6>
          <strong><span class="mdi mdi-approval"></span> Available in</strong> -
          500 gm
        </h6>
        <p class="offer-price mb-0">
          {{ item.qty }} × $ {{ item.product.product_price }}
          <i class="mdi mdi-tag-outline"></i>
        </p>
      </div>
    </div>
    <div class="cart-sidebar-footer">
      <div class="cart-store-details">
        <p>
          Sub Total <strong class="float-right">$ {{ cartTotalPrice }}</strong>
        </p>
        <p>
          Delivery Charges
          <strong class="float-right text-danger">0</strong>
        </p>
        <h6>
          Your total savings
          <strong class="float-right text-danger">$ {{ cartTotalPrice }}</strong>
        </h6>
      </div>
      <a href="checkout.html"
        ><button
          class="btn btn-secondary btn-lg btn-block text-left"
          type="button"
        >
          <span class="float-left"
            ><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span
          ><span class="float-right"
            ><strong>$ {{ cartTotalPrice }}</strong>
            <span class="mdi mdi-chevron-right"></span
          ></span></button
      ></a>
    </div>
  </div>
</template>

<script>
export default {
  name: "cart",
  computed: {
    carts() {
      return this.$store.state.carts;
    },

    cartTotalPrice() {
      return this.$store.getters.cartTotalPrice;
    },
  },
  methods:{
    removeproduct(product){
      
      return this.$store.dispatch('removeProductFromCart', product);
    }
  }
};
</script>