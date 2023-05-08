<template>
	<Head>
		<title>Add New User</title>
	</Head>
	<div class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card border-0 rounded-0 shadow border-top-purple">
							<div class="card-header"> 
								<span class="font-weight-bold"><i class="fa fa-user"></i>ADD NEW USER</span>
							</div>
							<div class="card-body">
								<form @submit.prevent="submit">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="fw-bold">Full Name</label>
												<input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': errors.name }" placeholder="Full Name">
												<div v-if="errors.name" class="alert alert-danger">
													{{ errors.name }}
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="" class="fw-bold">Email</label>
												<input type="email" class="form-control" v-model="form.email" :class="{ 'is-invalid': errors.email }" placeholder="Email">
												<div v-if="errors.email" class="alert alert-danger">
													{{ errors.email }}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="" class="fw-bold">Password</label>
												<input type="password" class="form-control" v-model="form.password" :class="{ 'is-invalid': errors.password }" placeholder="Password">
												<div v-if="errors.password" class="alert alert-danger">
													{{ errors.password }}
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="" class="fw-bold">Password Confirmation</label>
												<input type="password" class="form-control" v-model="form.password_confirmation" placeholder="Password Confirmation">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="md-3">
												<label class="fw-bold">Roles</label>
												<br>
												<div class="form-check form-check-inline" v-for="(role, index) in roles" :key="index">
													<input class="form-check-input" type="checkbox" v-model="form.roles" :value="role.name" id="`check-${role.id}`">
													<label class="form-check-label" :for="`check-${role.id}`">{{ role.name }}</label>
												</div>
											</div>
											<div v-if="errors.roles" class="alert alert-danger">
												{{ errors.roles }}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<button class="btn btn-primary shadow-sm rounded-sm" type="submit">SAVE</button>
											<button class="btn btn-warning fshadow-sm rounded-sm ms-3" type="reset">RESET</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	//import layout
	import LayoutApp from '../../../layouts/App.vue';

	//import head and link form inertia
	import { Head, Link } from '@inertiajs/inertia-vue3';

	//import reactive form vue
	import { reactive } from 'vue';

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import sweet alert2
	import Swal from 'sweetalert2';

	export default {
		layout: LayoutApp,

		components: {
			Head,
			Link,
		},

		//props
		props: {
			roles: Array,
			errors: Object,
		},

		//composition api
		setup() {
			//define form with reactive
			const form = reactive({
				name: '',
				email: '',
				password: '',
				password_confirmation: '',
				roles: []
				
			});

			//method "submit"
			const submit = () => {
				//send data to server
				Inertia.post('/apps/users', {
					//date
					name: form.name,
					email: form.email,
					password: form.password,
					password_confirmation: form.password_confirmation,
					roles: form.roles
				}, {
					onSuccess: () => {
						//show success alert
						Swal.fire({
							title: 'Success!',
							text: 'User saved successfully.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
						});
					},
				});
			}
			return {
				form,
				submit,
			}
		}

	}
</script>