<template>
	<head>
		<title>Login</title>
	</head>
	<div class="col-md-4">
		<div class="fade-in">
			<div class="text-center mb-4">
				<a href="" class="text-dark text-decoration-none">
					<img src="/images/cash-machine.png" class="bg-light rounded shadow-sm p-1" width="40"> <span class="text-center mt-2 ml-2 font-weight-bold" style="font-size: 25px">Sarawi</span><span class="text-center mt-2 font-weight-bold" style="font-size: 28px; color:crimson">Store</span><span class="mt-2 text-center font-weight-bold" style="font-size: 25px">.</span>
				</a>
			</div>
			<div class="card-group">
				<div class="card border-top-purple border-0 shadow-sm rounded-3">
					<div class="card-body">
						<div class="text-start">
							<h5>LOGIN ACCOUNT</h5>
							<P class="text-muted">Sign In to your account</P>
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
							<div class="row">
								<div class="col-12 mb-3 text-end">
									 <Link href="/forgot-password">Forgot Password?</Link>
								</div>
								<div class="col-12">
									<button class="btn btn-primary shadow-sm px-4 w-100" type="submit">LOGIN</button>
								</div>
							</div>
						</form>
					</div>
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
			session: Object,
		},

		//define compotition API
		setup() {
			//define from state
			const form = reactive({
				email: '',
				password: '',
			});

			//submit method
			const submit = () => {
				//send data to server
				Inertia.post('/login', {
					//data
					email: form.email,
					password: form.password,
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