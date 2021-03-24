import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
  { path: '/', 
  	component: require('./components/home/home.vue').default,
  	name:'home'
   },
   {
		path:'/single/product/:product_slug/:id',
   		component: require('./components/product/single_product.vue').default, 
   		name:'singleproduct'
  	}
  
]


const router = new VueRouter({
    
    routes,

   
});


export default router;