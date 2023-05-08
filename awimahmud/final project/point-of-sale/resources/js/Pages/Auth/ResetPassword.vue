<template>
	<head>
		<title>Update Password</title>
	</head>
	<div class="col-md-4">
		<div class="fade-in">
			<div class="text-center mb-4">
				<a href="" class="text-dark text-decoration-none">
        			<img src="/images/cash-machine.png" class="bg-light rounded shadow-sm p-1" width="35"> <span class="ml-2 font-weight-bold" style="font-size: 25px">Kasir</span><span class="font-weight-bold" style="font-size: 26px; color:crimson">Kita</span><span class="font-weight-bold" style="font-size: 25px">.</span>					<h3 class="mt-2 font-weight-bold">APLIKASI KASIR</h3>
				</a>
			</div>
			<div class="card-group">
				<div class="card-body">
					<div class="text-start">
						<h5>Update Password</h5>
					</div>
					<hr>
					<div v-if="session.status" class="alert alert-success mt-2">
						{{ session.status }}
					</div>
					<form @submit.prevent="submit">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fa fa-envelope"></i>
								</span>
							</div>
							<input type="email" placeholder="Email Address" class="form-control" v-model="form.email" :class="{ 'is-invalid': errors.email }">
						</div>
						<div v-if="errors.email" class="alert alert-danger">
							{{ errors.email }}
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fa fa-lock"></i>
								</span>
							</div>
							<input type="password" class="form-control" placeholder="Password" v-model="form.password" :class="{ 'is-invalid': errors.password }">
						</div>
						<div v-if="errors.password" class="alert alert-danger">
							{{ errors.password }}
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fa fa-lock"></i>
								</span>
							</div>
							<input type="password" class="form-control" placeholder="Password" v-model="form.password_confirmation" :class="{ 'is-invalid': errors.password_confirmation }">
						</div>
						<div class="row">
							<div class="col-12">
								<button class="btn btn-primary shadow-sm px-4 w-100" type="submit">UPDATE PASSWORD</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	//import layout
	import LayoutAuth from '../../layouts/auth.vue';

	//import reactive
	import { reactive } from 'vue';

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import Heade and userForm form Inertia
	import {
		Head,
		Link,
	}from '@inertiajs/inertia-vue3';

	export default {
		//layout
		layout: LayoutAuth,

		//register component
		components: {
			Head,
			Link
		},

		props: {
			errors: Object,
			route: Object,
			session: Object,
		},

		//define compotition API
		setup(props) {
			//define from state
			const form = reactive({
				email: props.route.query.email,
				password: '',
				password_confirmation: '',
				token: props.route.params.token,
			});

			//submit method
			const submit = () => {
				//send data to server
				Inertia.post('/reset-password', {
					//data
					email: form.email,
					password: form.password,
					password_confirmation: form.password_confirmation,
					token: form.token,
				});
			}

			return {
				form,
				submit,
			};
		}
	}

</script>

<!-- <style>

</style> -->