<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <h2 class="text-center">Discount Code</h2>
    </div>
    <div class="card-body row">
        <h5 class="col-6 card-title text-bg-warning border-1">Edit Discount Code</h5>
        <span class=" col-6 text-end"><a href="<?php echo e(route('discount.code.all')); ?>" class="btn btn-success btn-sm mb-2">All  Discount Code</a></span>
        <hr>
      <form action="<?php echo e(route('discount.code.update', $discounts->id)); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
          <label class="form-label">Discount Code</label>
          <input type="text" name="name" class="form-control" value="<?php echo e($discounts->name); ?>">
          <span class="text-danger">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Discount Code Slug</label>
            <input type="text" name="slug" class="form-control" value="<?php echo e($discounts->slug); ?>">
            <span class="text-danger">
                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
        <div class="mb-3">
          <label class="form-label">Discount Percentage</label>
          <input type="number" name="percentage" class="form-control" value="<?php echo e($discounts->percentage); ?>">
          <span class="text-danger">
            <?php $__errorArgs = ['percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </span>
        </div>



        <button type="submit" class="btn btn-warning">Update</button>
      </form>
    </div>
</div>

<?php $__env->startPush('customJs'); ?>
<script>
    //?   no relode slug genarate same to same as title

    let title = $('input[name="title"]')
            let slug = $('input[name="slug"]')
            title.keyup(function(){
                let value=$(this).val().toLowerCase().split(' ').join('-')
                slug.val(value)
            })



 // image preview

 $(document).ready(function() {
                $("#file-input").on("change", function() {
                    var files = $(this)[0].files;
                    $("#preview-container").empty();
                    if (files.length > 0) {
                        for (var i = 0; i < files.length; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<div class='preview'><img src='" + e.target.result +
                                    "'><button class='delete'>Delete</button></div>").appendTo(
                                    "#preview-container");
                            };
                            reader.readAsDataURL(files[i]);
                        }
                    }
                });


                $("#preview-container").on("click", ".delete", function() {
                    $(this).parent(".preview").remove();
                    $("#file-input").val(""); // Clear input value if needed
                });
            });

</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Discount/edit_discount_code.blade.php ENDPATH**/ ?>