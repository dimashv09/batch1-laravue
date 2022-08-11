
<?php $__env->startSection('header', 'Catalog'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">DATA CATALOG</h3>
<div class="card-tools">
	<a href="<?php echo e(url('catalogs/create')); ?>" class="btn btn-sm btn-primary pull-left">Create New Catalog</a>
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">Name</th>
<th class="text-center">Total Books</th>
<th class="text-center">Created Date</th>
<th class="text-center">Update Date</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
	<?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td class="text-center"><?php echo e($key+1); ?></td>
<td class="text-center"><?php echo e($catalog->name); ?></td>
<td class="text-center"><?php echo e(count($catalog->books)); ?></td>
<td class="text-center"><?php echo e(date('H:i:s - d M y', strtotime($catalog->created_at))); ?></td>
<td class="text-center"><?php echo e(date('H:i:s - d M y', strtotime($catalog->updated_at))); ?></td>
<td class="text-center">
	<a href="<?php echo e(url('catalogs/'.$catalog->id.'/edit')); ?>" class="btn btn-warning btn-sm">Edit</a>
	<form action="<?php echo e(url('catalogs', ['id' => $catalog->id])); ?>" method="post">
		<input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are You Sure?')">
		<?php echo method_field('delete'); ?>
		<?php echo csrf_field(); ?>
	</form>
</td>
</tr>
</tbody>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>

</div>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravue\library\resources\views/admin/catalog/index.blade.php ENDPATH**/ ?>