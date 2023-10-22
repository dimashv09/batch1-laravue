<template>
	<Head>
		<title>Add New Category</title>
	</Head>
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card border-0 rounded-3 shadow border-top-purple">
							<div class="card-header">
								<span class="font-weight-bold"><i class="fa fa-folder"></i> ADD NEW CATEGORY</span>
							</div>
							<div class="card-body">
								<form @submit.prevent="submit">
									<div class="mb-3">
										<input type="file" class="form-control" @input="form.image = $event.target.files[0]" :class="{ 'is-invalid': errors.image }">
									</div>
									<div v-if="errors.image" class="alert alert-danger">
										{{ errors.image }}
									</div>
									<div class="mb-3">
										<label class="fw-bold">Category Name</label>
										<input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid': errors.name }" placeholder="Category Name">
									</div>
									<div v-if="errors.name" class="alert alert-danger">
										{{ errors.name }}
									</div>
									<div class="mb-3">
										<label class="fw-bold">Description</label>
										<input type="text" class="form-control" v-model="form.description" :class="{ 'is-invalid': errors.description }" placeholder="Category Description">
									</div>
									<div v-if="errors.description" class="alert alert-danger">
										{{ errors.description }}
									</div>
									<div class="row">
										<div class="col-12">
											<button class="btn btn-primary btn-sm me-2" type="submit">SAVE</button>
											<button class="btn btn-warning btn-sm" type="submit">RESET</button>
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
	//import layout app
	import LayoutApp from '../../../layouts/App.vue';

	//import head and link from inertia
	import { Head, Link } from '@inertiajs/inertia-vue3';

	//import reactive form vue
	import { reactive } from 'vue';

	//import inertia adapter
	import { Inertia } from '@inertiajs/inertia';

	//import sweet alert2
	import Swal from 'sweetalert2';

	export default {
		//layout
		layout: LayoutApp,

		components: {
			Head,
			Link,
		},

		props: {
			errors: Object
		},

		setup() {
			//defiine state with reactive
			const form = reactive({
				name: '',
				image: '',
				description: ''
			});

			//method submit
			const submit = () => {
				//send data to server
				Inertia.post('/apps/categories', {
					//data
					name: form.name,
					image: form.image,
					description: form.description
				}, {
					onSuccess: () => {
						//show success alert
						Swal.fire({
							title: 'Success!',
							text: 'Category saved successfully.',
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