<?php $__env->startSection('content'); ?>
<div id="spin-wheel">
    <canvas id="wheel-canvas">adasd</canvas>
    <canvas id="wheel-canvas">adasd</canvas>
    <canvas id="wheel-canvas">adasd</canvas>
    <canvas id="wheel-canvas">adasd</canvas>
    <button id="spin-button">Spin</button>
</div>

<script>
    document.getElementById('spin-button').addEventListener('click', function () {
        fetch('/spin', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(`Congratulations! You won ${data.prize} - Voucher: ${data.voucher_code}`);
                    // Handle animation and reward display here
                } else {
                    alert('Sorry, better luck next time!');
                }
            });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/SpinWheel/index.blade.php ENDPATH**/ ?>