<template>
	<Head>
		<title>Edit</title>
	</Head>
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card border-0 rounded-3 shadow border-top-purple">
							<div class="card-header">
								<span class="font-wight-bold"><i class="fa fa-shopping-bag"></i> EDIT PRODUCT</span>
							</div>
							<div class="card-body">
								<form @submit.prevent="submit">
								    <div class="mb-2">
                                        <input class="form-control" @input="form.image = $event.target.files[0]" :class="{ 'is-invalid': errors.image }" type="file">
                                    </div>
                                    <div v-if="errors.image" class="alert alert-danger">
                                        {{ errors.image }}
                                    </div>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Barcode</label>
												<input type="text" v-model="form.barcode" class="form-control" :class="{'is-invalid': errors.barcode }" placeholder="Input Barcode">
												<div v-if="errors.barcode" class="alert alert-danger">
													{{ errors.barcode }}
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Category</label>
												<select v-model="form.category_id" class="form-select" :class="{ 'is-invalid': errors.category}" >
													<option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
												</select>
												<div v-if="errors.category_id" class="alert alert-danger">
													{{ errors.category_id }}
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label class="fw-bold">Title</label>
												<input type="text" v-model="form.title" class="form-control" :class="{'is-invalid': errors.title }" placeholder="Input Title">
												<div v-if="errors.title" class="alert alert-danger">
													{{ errors.title }}
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Stock</label>
												<input type="number" v-model="form.stock" class="form-control" :class="{'is-invalid': errors.stock }" placeholder="Input Stock">
												<div v-if="errors.stock" class="alert alert-danger">
													{{ errors.stock }}
												</div>
											</div>
										</div>
									</div>
										<div class="mb-3">
											<label class="fw-bold">Description</label>
											<textarea type="text" v-model="form.description" class="form-control" rows="4" :class="{'is-invalid': errors.description }" placeholder="Input Description"></textarea> 
										</div>
										<div v-if="errors.description" class="alert alert-danger">
												{{ errors.description }}
										</div>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Buy Price</label>
												<input type="number" v-model="form.buy_price" class="form-control" :class="{'is-invalid': errors.buy_price }" placeholder="Input Buy Price">
												<div v-if="errors.buy_price" class="alert alert-danger">
													{{ errors.buy_price }}
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Sell Price</label>
												<input type="number" v-model="form.sell_price" class="form-control" :class="{'is-invalid': errors.sell_price }" placeholder="Input Sell Price">
												<div v-if="errors.sell_price" class="alert alert-danger">
													{{ errors.sell_price }}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn-primary shadow-sm rounded-sm">SAVE</button>
											<button type="reset" class="btn-warning shadow-sm rounded-sm ms-3">RESET</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</template>
<script>
	//layout
	import LayoutApp from '../../../layouts/App.vue';

	//import head and link from inertia
	import { Head, Link } from '@inertiajs/inertia-vue3';

	//import reactive from vue
	import { reactive } from 'vue';

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import sweetalert2
	import Swal from 'sweetalert2';

	export default {
		layout: LayoutApp,

		components: {
			Head,
			Link
		},
		//props
		props: {
			categories: Array,
			product: Object,
			errors: Object
		},

		setup(props) {
			const form = reactive({
					image: '',
					barcode: props.product.barcode,
					category_id: props.categories.category_id,
					title: props.product.title,
					stock: props.product.stock,
					buy_price: props.product.buy_price,
					sell_price: props.product.sell_price,
			});

			//method "submit"
            const submit = () => {

                //send data to server
                Inertia.post(`/apps/products/${props.product.id}`, {
                    //data
                    _method: 'PUT',
                    image: form.image,
                    barcode: form.barcode,
                    category_id: form.category_id,
                    title: form.title,
                    description: form.description,
                    buy_price: form.buy_price,
                    sell_price: form.sell_price,
                    stock: form.stock
                }, {
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Product updated successfully.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });
			}
			//return
			return {
				form,
				submit
			}
		}
	}
</script>