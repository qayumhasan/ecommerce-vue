<template>
  <div class="col-lg-9">
    <div class="carousel-slider-main text-center">
      <div
        class="owl-carousel owl-carousel-slider rounded overflow-hidden shadow-sm"
      >
        <div class="item">
          <a href="shop.html"
            ><img
              class="img-fluid"
              src="public/uploads/banner/th_1610027249.jpg"
              alt="First slide"
          /></a>
        </div>


      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "slider",
  data() {
    return {
      banners: [],
    };
  },
  mounted() {
    axios.get("/banners").then((res) => {
      console.log(res.data);
      this.banners = res.data;
    });

    this.$nextTick(() => {
      var mainslider = $(".owl-carousel-slider");
      if (mainslider.length > 0) {
        mainslider.owlCarousel({
          items: 1,
          dots: false,
          lazyLoad: true,
          pagination: true,
          autoPlay: 4000,
          loop: true,
          singleItem: true,
          navigation: true,
          stopOnHover: true,
          nav: true,
          navigationText: [
            "<i class='mdi mdi-chevron-left'></i>",
            "<i class='mdi mdi-chevron-right'></i>",
          ],
        });
      }
    });
  },
  computed: {
    getBanners() {
      return this.$store.getters.getBanner;
    },
    isbanner() {
      return this.banners.length > 0;
    },
  },
};
</script>