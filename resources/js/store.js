import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

const store = new Vuex.Store({

	state: {
		products: [],
		carts: [],
		singleproduct: [],
	},

	getters: {
		getSingleProduct: (state) => {
			return state.singleproduct;
		},
		cartItemCount: (state) =>{
			return state.carts.length;
		},
		
		cartTotalPrice: (state) => {

			let total = 0;

			state.carts.forEach(function(item){
				total = total + (item.product.product_price * item.qty);
			});
			

			return total;
		}

	},


	actions: {


		addtocart({ commit }, { product, qty }) {
			commit('ADD_TO_CART', { product, qty })

		},

		singleProduct({ commit }, { id }) {
			
			axios.get('/single/product/' + id)
				.then((res) => {
			
					
					commit('SINGLE_PRODUCT', res.data.data)
				})
		
		},


		removeProductFromCart({commit},product){
			console.log(product);
			commit('REMOVE_PRODUCT_FROM_CART',product);
		}
	},

	mutations: {

		ADD_TO_CART(state, { product, qty }) {

			let productInCart = state.carts.find(item=>{
				return item.product.id === product.id;
			});
			if(productInCart){
				productInCart.qty +=qty;
				return;  
			}
			
			state.carts.push({
				product,
				qty
			})
		},
		SINGLE_PRODUCT(state, data) {
			return state.singleproduct = data
		},
		REMOVE_PRODUCT_FROM_CART(state,product){
		
			state.carts = state.carts.filter(function(item){
				return item.product.id != product.id;
			})
		},

		

	},
	

});

export default store;