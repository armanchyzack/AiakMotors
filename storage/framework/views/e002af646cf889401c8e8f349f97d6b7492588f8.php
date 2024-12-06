<?php $__env->startSection('content'); ?>
<div class="wheel-container">
    <canvas id="spinWheel" width="400" height="400"></canvas>
    <button id="spinButton">Spin</button>
</div>


<?php $__env->startPush('customJs'); ?>
<script>
    const canvas = document.getElementById('spinWheel');
const ctx = canvas.getContext('2d');
const button = document.getElementById('spinButton');

// Spin Wheel Data
const segments = ["Prize 1", "Prize 2", "Prize 3", "Try Again", "Prize 4"];
const colors = ["#FF5733", "#33FF57", "#3357FF", "#FF33A1", "#A133FF"];
let startAngle = 0;
let arc = Math.PI / (segments.length / 2);
let spinAngle = 0;
let isSpinning = false;

// Draw the Spin Wheel
function drawWheel() {
for (let i = 0; i < segments.length; i++) {
const angle = startAngle + i * arc;
ctx.beginPath();
ctx.arc(200, 200, 180, angle, angle + arc, false);
ctx.lineTo(200, 200);
ctx.fillStyle = colors[i];
ctx.fill();

ctx.save();
ctx.fillStyle = "#fff";
ctx.translate(
  200 + Math.cos(angle + arc / 2) * 140,
  200 + Math.sin(angle + arc / 2) * 140
);
ctx.rotate(angle + arc / 2 + Math.PI / 2);
ctx.fillText(segments[i], -ctx.measureText(segments[i]).width / 2, 0);
ctx.restore();
}
}

// Spin Animation
function spin() {
if (isSpinning) return;
isSpinning = true;
const spinTime = Math.random() * 3 + 3; // Random spin duration (3-6 seconds)
const spinSpeed = Math.random() * 10 + 10; // Random spin speed
let currentAngle = 0;

const interval = setInterval(() => {
currentAngle += spinSpeed;
spinAngle += spinSpeed;

if (currentAngle >= spinTime * 360) {
  clearInterval(interval);
  spinAngle %= 360;
  const winningIndex = Math.floor(
    (segments.length - Math.floor((spinAngle / 360) * segments.length)) %
      segments.length
  );
  alert(`You won: ${segments[winningIndex]}`);
  isSpinning = false;
}
drawRotatingWheel();
}, 1000 / 60);
}

// Draw Rotating Wheel
function drawRotatingWheel() {
ctx.clearRect(0, 0, 400, 400);
ctx.save();
ctx.translate(200, 200);
ctx.rotate((spinAngle * Math.PI) / 180);
ctx.translate(-200, -200);
drawWheel();
ctx.restore();
}

drawWheel();
button.addEventListener("click", spin);

  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/spinewheel.blade.php ENDPATH**/ ?>