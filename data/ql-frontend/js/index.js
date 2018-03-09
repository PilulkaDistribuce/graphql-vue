document.addEventListener("DOMContentLoaded", function () {
	
	const API = 'http://localhost:17010';
	
	const priceFormat = wNumb({
		decimals: 2,
		thousand: ' ',
		suffix  : ' Kč',
	});
	
	new Vue({
		el: '#vue',
		
		debug: true,
		
		data: {
			data          : null,
			countProduct  : 12,
			search        : '',
			products      : null,
			productsRandom: null,
			showForm      : true,
			loader        : false,
			sale          : {
				value: null,
			},
			
			modal: {
				name   : null,
				price  : null,
				ratings: null,
				
			}
		},
		
		/** Filters **/
		filters: {
			price: function (price) {
				return priceFormat.to(price);
			},
			
			round: function (number) {
				return Math.round(number);
			}
		},
		
		/** Mounted method **/
		mounted() {
			this.loader = true;
			
			this.getProducts(this.countProduct);
		},
		
		computed: {
			filterArticle: function () {
				let self = this;
				
				if (this.products !== null) {
					return this.products.filter((cust) => {
						return cust.name.toLowerCase().indexOf(self.search.toLowerCase()) >= 0
					});
				} else {
					return this.products;
				}
			}
		},
		
		/** Methods **/
		methods: {
			
			getProducts(count) {
				const query = {
					"query": "{products(limit: " + count + "){id, name, price, sale{value}}}"
				};
				
				this.$http.post(API, JSON.stringify(query)).then(response => {
					if (response.ok) {
						this.products = response.body.data.products;
					}
					this.loader = false;
				}, response => {
					console.warn(response)
				});
			},
			
			fetchModalData(id) {
				const query       = {
					"query": "{product(id: " + id + "){id, name, price, ratings{rating, name, comment, id} }}"
				};
				const queryRandom = {
					"query": "{products(limit: 3){id, name, price, sale{value} }}"
				};
				
				this.$http.post(API, JSON.stringify(query)).then(response => {
					if (response.ok) {
						let data = response.body.data.product;
						
						this.modal = {
							name   : data.name,
							price  : data.price,
							ratings: data.ratings,
						};
					}
					
					this.loader = false;
				}, response => {
					console.warn(response)
				});
				
				this.$http.post(API, JSON.stringify(queryRandom)).then(response => {
					this.productsRandom = response.body.data.products;
				}, response => {
					console.warn(response)
				});
			},
			
			showModal() {
				this.$refs.productModal.show()
				
			},
			hideModal() {
				this.$refs.productModal.hide()
			},
		},
	});
});
