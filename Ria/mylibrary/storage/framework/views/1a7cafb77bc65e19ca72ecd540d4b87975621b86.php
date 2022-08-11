
<?php $__env->startSection('header', 'Publisher'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">DATA PUBLISHER</h3>
<div class="card-tools">
    <a href="<?php echo e(url('publishers/create')); ?>" class="btn btn-sm btn-primary pull-left">Create New Publisher</a>
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
<th class="text-center">Email</th>
<th class="text-center">Phone Number</th>
<th class="text-center">Address</th>
<th class="text-center">Created Date</th>
<th class="text-center">Updated Date</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td class="text-center"><?php echo e($key+1); ?></td>
<td class="text-center"><?php echo e($publisher->name); ?></td>
<td class="text-center"><?php echo e($publisher->email); ?></td>
<td class="text-center"><?php echo e($publisher->phone_number); ?></td>
<td class="text-center"><?php echo e($publisher->address); ?></td>
<td class="text-center"><?php echo e(date('H:i:s - d M y', strtotime($publisher->created_at))); ?></td>
<td class="text-center"><?php echo e(date('H:i:s - d M y', strtotime($publisher->updated_at))); ?></td>
<td class="text-center">
    <a href="<?php echo e(url('publishers/'.$publisher->id.'/edit')); ?>" class="btn btn-warning btn-sm">Edit</a>
    <form action="<?php echo e(url('publishers', ['id' => $publisher->id])); ?>" method="post">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravue\library\resources\views/admin/publisher/index.blade.php ENDPATH**/ ?>