<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
      <h2 class="text-center">Discout Code</h2>
    </div>
    <div class="card-body row">
      <h5 class="card-title col-6">All Discount Code</h5>
        <span class="col-6 text-end"><a href="<?php echo e(route('discount.code.view')); ?>" class="btn btn-success btn-sm">Add Discount Code</a></span>
        <hr>
      <div class="table-responsive">
        <table class="display table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Percentage</th>
                <th scope="col">Status</th>
                <th scope="">Edit</th>
                <th scope="">Delete</th>

              </tr>
            </thead>
            <tbody class="table-group-divider">


                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$diss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e(++$key); ?></th>
                  <td>
                    <?php echo e($diss->name); ?>

                  </td>
                  <td><?php echo e($diss->percentage); ?>%</td>
                  <td>
                    <?php if($diss->status == 0): ?>

                    <a href="<?php echo e(route('discount.code.status.update', $diss->id)); ?>" btn btn-sm btn-success> <i class="fa-solid fa-toggle-on h5" style="color: #63E6BE;"></i></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('discount.code.status.update', $diss->id)); ?> " btn-sm btn-danger> <i class="fa-solid fa-toggle-off h5" style="color: #ac1025;"></i></a>

                    <?php endif; ?>




                  </td>
                  <td class="parent_class " id="expanded_employee" data-id=""><a href="<?php echo e(route('discount.code.edit', $diss->id)); ?>"><i class='fas fa-edit' style='font-size:1rem'></i></a></td>
                  <td class="text-right deleteBtn">
                    <button class="btn btn-sm" onclick="confirmDelete(<?php echo e($diss->id); ?>)">
                        <i class='fas fa-trash' style='font-size:1rem;color:red'></i>
                    </button>
                    <a href="#"  class="btn btn-sm deleteBtn"></a>
                    <form action="<?php echo e(route('discount.code.delete', $diss->id)); ?>" id="delete-form-<?php echo e($diss->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>

                    </form>

                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

      </div>

    </div>
  </div>
  <div class="col-4 float-end card-header">
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
    <div class="alert alert-warning mt-3" role="alert">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('deletesuccess')): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(session('deletesuccess')); ?>

</div>
</div>
<?php endif; ?>
<?php $__env->startPush('customJs'); ?>
<script>

function confirmDelete(discountID) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action will delete the product and its images!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform form submission to delete product
            document.getElementById(`delete-form-${discountID}`).submit();
        }
    })
}

    $("document").ready(function() {
               setTimeout(function() {
                   $("div.alert").remove();
               }, 2000);
            })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Discount/all_discount.blade.php ENDPATH**/ ?>