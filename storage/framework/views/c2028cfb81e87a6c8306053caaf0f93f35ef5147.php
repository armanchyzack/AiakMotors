<?php $__env->startSection('content'); ?>
    <style>
        .currentImage img {
            height: 140px;
            width: 180px;
        }

        #preview-container img {
            height: 140px;
            width: 170px;
        }

        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .image-preview {
            position: relative;
            width: 100px;
            height: 100px;
            border: 1px solid #ddd;
            overflow: hidden;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-preview .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            padding: 2px 6px;
            font-size: 12px;
        }


    </style>
    <div class="card">
        <?php if(session()->has('deletesuccess')): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo e(session('deletesuccess')); ?>

            </div>
    </div>
    <?php endif; ?>

    <div class="card-header">
        <h2 class="text-center">Product</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6 text-warning">Edit a Accessory Product</h5>
        <span class="col-6 text-end"><a href="<?php echo e(route('accessory.update', $accessories->id)); ?>" class="btn btn-success btn-sm">All Accessories</a></span>
        <hr>
        <form action="<?php echo e(route('accessory.update', $accessories->id)); ?>" method="POST" enctype="multipart/form-data" class="row">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="mb-3 col-lg-12">
                <label class="form-label">Accessory Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo e($accessories->name); ?>">
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
            <div class="mb-3 col-lg-6">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?php echo e(Str::slug($accessories->slug)); ?>">
            </div>
            <div class="mb-3 col-lg-6">
                <label class="form-label">Category</label>
                <select class="form-select" name="parent_category">
                    <option selected value="<?php echo e($accessories->category_id); ?>"> <?php echo e($accessories->category->title); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="text-danger">
                    <?php $__errorArgs = ['parent_category'];
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
            <div class="mb-3 col-lg-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo e($accessories->price); ?>">
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
            <div class="mb-3 col-lg-3">
                <label class="form-label">Discount Price</label>
                <input type="number" name="discount_price" class="form-control" value="<?php echo e($accessories->discount_price); ?>">
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
            <div class="mb-3 col-lg-3">
                <label class="form-label">Discount Price Start Date</label>
                <input type="date" name="discount_price_start_date" class="form-control" value="<?php echo e($accessories->start_date); ?>">
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
            <div class="mb-3 col-lg-3">
                <label class="form-label">Discount Price End Date</label>
                <input type="date" name="discount_price_end_date" class="form-control" value="<?php echo e($accessories->end_date); ?>">
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
            <div class="mb-3 col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="summernote" style="height: 100px" name="desc"><?php echo e($accessories->description); ?></textarea>

                <span class="text-danger">
                    <?php $__errorArgs = ['desc'];
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


            <div class="mb-3 col-12">
                <label class="form-label">Accessory Current thumbnail Image</label>
                <div class="mb-3 col-12 currentImage ">
                    <img src=" <?php echo e($accessories->image_url); ?>" alt="">
                </div>
            </div>


            <div class="mb-3 col-12">
                <label class="form-label">Accessory thumbnail Image</label>
                <input type="file" name="thumbnail_image" class="form-control" id="file-input">
                <span class="text-danger">
                    <?php $__errorArgs = ['thumbnail_image'];
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
            <div class="mb-3 col-12">
                <div id="preview-container">

                </div>
            </div>








            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
    </div>











    <?php $__env->startPush('customJs'); ?>
        <script>
            $(document).ready(function() {
                // Trigger when file input changes
                $('#car_images').on('change', function() {
                    // Get the selected files
                    let files = this.files;
                    $('#image_preview_container').empty(); // Clear previous previews

                    // Loop through each file and display preview
                    $.each(files, function(index, file) {
                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let preview = `
                    <div class="image-preview" data-index="${index}">
                        <img src="${e.target.result}" alt="Product Image">
                        <button class="delete-btn" onclick="removeImage(${index})">x</button>
                    </div>
                `;
                            $('#image_preview_container').append(preview);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            });

            // Delete image preview function
            function removeImage(index) {
                // Remove the specific preview element by data-index
                $(`.image-preview[data-index="${index}"]`).remove();

                // Optionally, clear the file input for re-adding if needed:
                $('#car_images').val('');
            }




























            //?   no relode slug genarate same to same as title

            let title = $('input[name="title"]')
            let slug = $('input[name="slug"]')
            title.keyup(function() {
                let value = $(this).val().toLowerCase().split(' ').join('-')
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

            $(document).ready(function() {
                $('#summernote').summernote();
            });
            $("document").ready(function() {
                setTimeout(function() {
                    $("div.alert").remove();
                }, 1000);
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Backend.Layouts.back_end_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Backend/Accessory/edit_accessory.blade.php ENDPATH**/ ?>