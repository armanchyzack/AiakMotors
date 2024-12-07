<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo e(asset('Frontend/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('Frontend/css/bootstrap.min.css')); ?>">
</head>
<body>
    <div class="row">
        <div class="col-3 sidenavbar" style="height: 100vh;">
            <div class="sidenav">
                <a href="#about" class="d-flex" style="color: #ffd700">About <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
                <hr style="width: 100%; color: #ffd700; ">

            </div>
        </div>
        <div class="col-9" style="height: 100vh;">
            <div class="row ">
                    <div class=" col-4 col-lg-6 col-xl-8 logo center mb-2">
                        <a href="#">
                            <img src="<?php echo e(asset('Frontend/img/car logo.jpeg')); ?>" alt="..">
                        </a>
                    </div>
                    <div class=" col-8 col-lg-6 col-xl-4 d-flex mt-3 text-end me-0 pl-3">
                        <!--add to cart , profile buton-->

                        <div class="dropdown btn-group-sm">
                          <a class="btn dropdown-toggle btn-sm btn-group-sm" style="border: 2px solid #ffd700;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="color: #ffd700"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark">
                            <?php if(auth()->guard()->guest()): ?>
                            <li><a class="dropdown-item active" href="<?php echo e(route('user.login')); ?>">Log In</a></li>
                            <li><a class="dropdown-item active" href="<?php echo e(route('user.regester')); ?>">Register</a></li>
                            <?php else: ?>
                            <li><a class="dropdown-item active" href="#">Profile</a></li>
                            <li>
                                <a class="dropdown-item active" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 Log Out
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                            <?php endif; ?>
                          </ul>
                        </div>
                        <a href="" class="cart-btn">
                          <i class="fa-solid fa-cart-shopping" style="color: #ffd700; border: 2px solid #ffd700; padding: 6px;"></i>
                        </a>

                    </div>
            </div>
                <div class="col-12 mb-3 p-2 search">
                  <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary btn-sm" type="submit">Search</button>
                  </form>
                </div>
            <div class="row">
                <div class="col-6" >
                    <div class="dropdown" >
                        <button class="btn btn-secondary dropdown-toggle btn-sm w-100 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categories
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                  <div class="dropdown" >
                    <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Price Filter
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item select" href="#">Low to high</a></li>
                        <li><a class="dropdown-item" href="#">high to low</a></li>
                    </ul>
                </div>
                </div>
            </div>


            <?php echo $__env->yieldContent('content'); ?>

            


            <div class="container my-5">

                <footer class="text-center text-lg-start social-btn">
                  <div class="container d-flex justify-content-center py-5">
                    <a href="#"class="btn btn-group-sm btn-floating mx-2" style="background-color: #54456b;">
                        <i class="fa-brands fa-facebook" style="color: blue;"></i>
                    </a>
                    <a href="#" class="btn btn-group-sm  btn-floating mx-2" style="background-color: #54456b;">
                        <i class="fa-brands fa-facebook-messenger" style="color: #168aff;"></i>
                    </a>
                    <a href="#" class="btn btn-group-sm  btn-floating mx-2" style="background-color: #54456b;">
                        <i class="fa-brands fa-whatsapp" style="color: #25D366;"></i>
                    </a>
                  </div>
                  <div>
                    <h5 class="text-white">Our Shop</h5>
                    <p class="text-white text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit quo nostrum velit nulla optio libero eum sapiente. Minus explicabo, corporis laboriosam quae, eum aliquid voluptate odit in magnam consectetur eaque.</p>
                  </div>

                  <!-- Copyright -->
                  <div class="text-center text-white p-3">
                    © 2024 Copyright:
                    <a class="text-white" href="<?php echo e(env('APP_URL')); ?>">aiakmotors.com</a>
                  </div>
                  <!-- Copyright -->
                </footer>

              </div>
              <!-- End of .container -->
          </div>

      </div>

      </div>















      <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>

      <?php echo $__env->yieldPushContent('customJs'); ?>
  </body>
  </html>
<?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/layouts/front_end.blade.php ENDPATH**/ ?>