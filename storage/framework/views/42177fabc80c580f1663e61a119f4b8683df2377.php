<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="referrer" content="origin" />
    <meta name="description" content="<?php echo e($description); ?>" />
    <meta name="author" content="<?php echo e($author); ?>" />
    <title><?php echo e($app); ?> - <?php echo e($title); ?> </title>
    
    
    <link rel="icon" type="image/x-icon" href="media/logo/icon.ico')" />
    

    
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<body id="body" class="modal-open bg-dark">
    

    <?php echo $__env->make('partials.navbar.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="d-none d-lg-block" style="height: 55px;">&nbsp;</div>
    <?php echo $__env->make('layouts.notif', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
    
    <?php echo $__env->yieldContent('app'); ?>
    
    

    
    <?php echo $__env->make('partials.footer.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
    
    

    
    <?php echo $__env->make('layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>

</html><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/layouts/template.blade.php ENDPATH**/ ?>