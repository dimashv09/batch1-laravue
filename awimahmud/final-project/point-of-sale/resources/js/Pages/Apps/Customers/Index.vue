<template>
	<Head>
		<title>Customers</title>
	</Head>
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card border-0 rounded-3 border-top-purple">
							<div class="card-header">
								<span class="font-weight-bold"><i class="fa fa-user-circle"></i> CUSTOMER</span>
							</div>
							<div class="card-body">
								<form @submit.prevent="handleSearch">
									<div class="input-group mb-3">
										<Link href="/apps/customers/create" v-if="hasAnyPermission(['customers.create'])" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD</Link>
										<input v-model="search" type="text" class="form-control" placeholder="Search by customer name...">
										<button type="submit" class="btn btn-primary input-group-text"><i class="fa fa-search me-2"></i> Search</button>
									</div>
								</form>
								<table class="table table-bordered table-striped table-hover"> 
									<thead>
										<tr>
											<th>No</th>
											<th scope="col">Name</th>
											<th scope="col">Phone Number</th>
											<th scope="col">Address</th>
											<th class="text-center" scope="col" style="width:20%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(customer, index) in customers.data" :key="index">
											<td class="text-center">{{ startIndex + index + 1 }}</td>
											<td>{{ customer.name }}</td>
											<td>{{ customer.no_telp }}</td>
											<td>{{ customer.address }}</td>
											<td class="text-center">
												<Link :href="`/apps/customers/${customer.id}/edit`" v-if="hasAnyPermission(['customers.edit'])" class="btn btn-warning btn-sm me-2"><i class="fa fa-pencil-alt me-1"></i> EDIT</Link>
												<button @click.prevent="destroy(customer.id)"  v-if="hasAnyPermission(['customers.delete'])" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
											</td>
										</tr>
									</tbody>
								</table>
								<Pagination :links="customers.links" align="end" />
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

	//import ref
	import { ref } from 'vue';
 	//import Pagination
	import  Pagination  from '../../../Components/Pagination.vue';

	//import adapter inertia
	import { Inertia } from '@inertiajs/inertia';
	//import sweetalert2
	import Swal from 'sweetalert2';

	export default {
		layout: LayoutApp,

		components: {
			Head,
			Link,
			Pagination
		},

		props: {
			customers: Object,
			startIndex: {
				type: Number,
				required: true
			}
		},

		setup(props) {

			const startIndex = props.startIndex;

			const search = ref('' || (new URL(document.location)).searchParams.get('q'));

			const handleSearch = () => {
				Inertia.get('/app/customers', {
					q: search.value,
				});
			}

			const destroy = (id) => {
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert it",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
				})
				.then((result) => {
					if(result.isConfirmed){
						Inertia.delete(`/apps/customers/${id}`);
						Swal.fire({
							title: 'Deleted!',
							text: 'Member deleted successfully.',
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
				destroy,
			}
		}
	}
</script>