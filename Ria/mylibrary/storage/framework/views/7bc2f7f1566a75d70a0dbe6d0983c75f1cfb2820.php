
<?php $__env->startSection('header', 'Publisher'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class="row">
	          <!-- left column -->
	    <div class="col-md-6">
	            <!-- general form elements -->
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Edit Publisher</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="<?php echo e(url('publishers/'.$publisher->id)); ?>" method="post">
	              	<?php echo csrf_field(); ?>
	              	<?php echo e(method_field('PUT')); ?>

	              	
	                <div class="card-body">
	                  <div class="form-group">
	                    <label>Name</label>
	                    <input type="text" name="name" class="form-control" placeholder="Enter publisher name" required="" value="<?php echo e($publisher->name); ?>">
	                  </div>
	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
	              </form>
	            </div>
        </div>
    </div>
            <!-- /.card -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravue\library\resources\views/admin/publisher/edit.blade.php ENDPATH**/ ?>