<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
      <h2 class="text-center">Car</h2>
    </div>
    <div class="card-body row">
      <h5 class="card-title col-6">All Cars</h5>
        <span class="col-6 text-end"><a href="" class="btn btn-success btn-sm">Add Car</a></span>
        <hr>
      <div class="table-responsive">
        <table class="display table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="">Edit</th>
                <th scope="">Delete</th>

              </tr>
            </thead>
            <tbody class="table-group-divider">


                <tr>
                  <th scope="row"></th>
                  <td style="height: 2rem; width:1rem"><img style="width: 100%; height:100%" src="" alt=""></td>
                  <td>
                    sgad
                  </td>
                  <td></td>

                  <td class="parent_class " id="expanded_employee" data-id=""><a href=""><i class='fas fa-edit' style='font-size:1rem'></i></a></td>
                  <td class="text-right deleteBtn">
                    <button class="btn btn-sm" onclick="">
                        <i class='fas fa-trash' style='font-size:1rem;color:red'></i>
                    </button>
                    <a href="#"  class="btn btn-sm deleteBtn"></a>
                    <form action="" id="delete-form-" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>

                    </form>

                  </td>
                </tr>
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

function confirmDelete(categoryId) {
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
            document.getElementById(`delete-form-${categoryId}`).submit();
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

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Accessory/all_accessory.blade.php ENDPATH**/ ?>