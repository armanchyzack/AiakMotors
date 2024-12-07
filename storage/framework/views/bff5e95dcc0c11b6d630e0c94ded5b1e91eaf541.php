<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="card-group carde">
    <div class="card" style="border-radius: 5%">
      <img src="<?php echo e(asset('Frontend/img/car one.jpeg')); ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">toyota supra</h5>
        <small class="text-start text-white">This is a wider card with supporting text below as a natural natural natural ...</small>
        <h6 class="text-white mt-1 text-bg-light">100 <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
        <button type="button" class="btn btn-light mt-1">all images</button>
        <div class="d-flex mt-2 button">

            <a t class="btn btn-light me-2"><i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i></a>
            <a href="" class="btn btn-sm">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/index.blade.php ENDPATH**/ ?>