<?php $__env->startSection('content'); ?>
    <!--login form-->
    <div class="container mt-3">
        <div class="box">

          <div class="card">
            <div class="card-header">
                <h1>welcome to my website <?php echo e(Auth::user()->name); ?></h1>

            </div>
        </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/Profile/user_dashboard.blade.php ENDPATH**/ ?>