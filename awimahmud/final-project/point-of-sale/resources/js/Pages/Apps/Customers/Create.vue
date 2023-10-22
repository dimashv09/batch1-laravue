<template>
	<Head>
		<title>Create New Customer</title>
	</Head>
	<main class="c-main">
		<div class="container-fluid mt-5">
			<div class="fade-in align-items-center justify-content-center d-flex">
				<div class="col-md-6">
					<div class="card border rounded-3 border-top-purple">
						<div class="card-header">
							<span class="font-weight-bold"><i class="fa fa-user-circle"></i> ADD NEW CUSTOMER</span>
						</div>
						<div class="card-body">
								<form @submit.prevent="submit">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Full Name</label>
												<input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': errors.name }" placeholder="Input name">
											</div>
											<div v-if="errors.name" class="alert alert-danger">
												{{ errors.name }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Phone Number</label>
												<input type="number" v-model="form.no_telp" class="form-control" :class="{ 'is-invalid': errors.no_telp }" placeholder="Input phone number">
											</div>
											<div v-if="errors.no_telp" class="alert alert-danger">
												{{ errors.no_telp }}
											</div>
										</div>
									</div>
									<div class="mb-3">
										<label class="fw-bold">Address</label>
										<textarea v-model="form.address" rows="4" class="form-control" :class="{ 'is-invalid': errors.address }" placeholder="Input address"></textarea>
											<div v-if="errors.address" class="alert alert-danger">
											{{ errors.address }}
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-primary btn-sm me-2" type="submit">SAVE</button>
											<button class="btn btn-warning btn-sm" type="reset">RESET</button>
										</div>
									</div>
								</form>
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

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import reactive from vue
	import { reactive } from 'vue';

	//import sweetalert2
	import Swal from 'sweetalert2';

	export default {
		layout: LayoutApp,

		components: {
			Head,
			Link
		},

		props: {
			errors: Object,
		},

		setup() {
			const form = reactive({
				name: '',
				no_telp: '',
				address: ''
			});

			const submit = () => {
				Inertia.post('/apps/customers/', {
					name: form.name,
					no_telp: form.no_telp,
					address: form.address,
				}, {
					onSuccess: () => {
						Swal.fire({
							title: 'Success!',
							text: 'Member Saved Successfully.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
						});
					}
				})
			}
			return {
				form,
				submit,
			}
		}
	}
</script>