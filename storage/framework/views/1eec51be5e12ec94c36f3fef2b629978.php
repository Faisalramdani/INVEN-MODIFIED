<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>X-Bakery</title>
    <link type="image/x-icon" href="<?php echo e(asset('/favicon.ico')); ?>" rel="icon" />
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/fontawesome.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/toastify.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('js/toastify-js.js')); ?>"></script>
    <script src="<?php echo e(asset('js/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/config.js')); ?>"></script>

    
    <script src=" https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js "></script>
</head>

<body>

    <div class="LoadingOverlay d-none" id="loader">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>

    
    <script src="<?php echo e(asset('js/auth.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\Laravel-11-Inventory-main\resources\views/layout/app.blade.php ENDPATH**/ ?>