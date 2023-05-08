<template>
  <Head>
	<title>Products</title>
  </Head>
  <main class="c-main">
	<div class="container-fluid">
		<div class="fade-in">
			<div class="row">
				<div class="col-md-12">
					<div class="card border-0 rounded-3 shadow border-top-purple">
						<div class="card-header">
							<span class="font-weight-bold"><i class="fa fa-shopping-bag"></i> PRODUCTS</span>
						</div>
						<div class="card-body">
							<form @submit.prevent="handleSearch">
								<div class="input-group mb-3">
									<Link href="/apps/products/create" v-if="hasAnyPermission(['products.create'])" class="btn btn-primary input-group-text"><i class="fa fa-plus-circle me-2"></i> NEW</Link>
									<input type="text" class="form-control" v-modal="search" placeholder="Search by name...">
									<button type="submit" class="btn btn-primary input-group-text"><i class="fa fa-search me-2"></i>Search</button>
								</div>
							</form>
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th scope="col" class="text-center">Barcode</th>
										<th scope="col">Title</th>
										<th scope="col">Image</th>
										<th scope="col">Buy Price</th>
										<th scope="col">Sell Price</th>
										<th scope="col">Stock</th>
										<th style="width:20%">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(product, index) in products.data" :key="index">
										<td class="text-center">{{ startIndex + index + 1 }}</td>
										<td class="text-center">
											<Barcode :value="product.barcode" :format="'CODE39'" :lineColor="'#000'" :width="1" :height="20" />
										</td>
										<td>{{ product.title }}</td>
										<td class="text-center"><img :src="product.image" width="40px"></td>
										<td>Rp. {{ formatPrice(product.buy_price) }}</td>
										<td>Rp. {{ formatPrice(product.sell_price )}}</td>
										<td>{{ product.stock }}</td>
										<td class="text-center">
											<Link :href="`/apps/products/${product.id}/edit`" v-if="hasAnyPermission(['products.edit'])" class="btn btn-warning btn-sm me-2"><i class="fa fa-pencil-alt me-1"></i> EDIT</Link>
											<button @click.prevent="destroy(product.id)" v-if="hasAnyPermission(['products.delete'])" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
										</td>
									</tr>
								</tbody>
							</table>
							<pagination :links="products.links" align="end"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </main>
</template>

<script>

	//import layout
	import LayoutApp from '../../../layouts/App.vue';
	
	//import head and link from inertia
	import { Head, Link } from '@inertiajs/inertia-vue3';

	//import pagination
	import Pagination from '../../../Components/Pagination.vue';

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import ref and watch from vue
	import { ref, watch } from 'vue';

	//import sweet alert2
	import Swal from 'sweetalert2';

	import Barcode from '../../../Components/Barcode.vue';

	export default {
		//layout
		layout: LayoutApp,

		//register components
		components: {
			Head,
			Link,
			Pagination,
			Barcode
		},

		//props
		props: {
			products: Object,
			startIndex: {
				type: Number,
				required: true
			}
		},

		//setup
		setup(props) {
			
			//define state search
			const search = ref('' || (new URL(document.location)).searchParams.get('q'));
			
			//define method search
			const handleSearch = () => {
				Inertia.get('/apps/products/', {
					p: search.value
				});
			}

			//define method startIndex
			const startIndex = props.startIndex;

			watch(search, () => {
				setTimeout(() => {
					handleSearch();
				}, 100);
			});

			const destroy = (id) => {
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revet this!",
					icon: 'warning',
					showConfirmButton: true,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Yes, delete it',
					showCancelButton: true,
					cancelButtonColor: '#d33',
				})
				.then((result) => {
					if(result.isConfirmed){
						Inertia.delete(`/apps/products/${id}`);
						Swal.fire({
							title: 'Deleted!',
							text: 'Product delete successfully.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000,
						});
					}
				});

			}

			//return
			return {
				search,
				handleSearch,
				startIndex,
				destroy
			}
		},

	}
</script>

<style>

</style>