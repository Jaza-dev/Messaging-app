

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<br><h1 class="display-6 text-center text-white">Welcome to Connect</h1><br>
<div class="row justify-content-center">
    <div class="col-4">
        <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required  value="<?php echo e(old('email')); ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <a href="<?php echo e(route('showRegisterForm')); ?>" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Don't have an account yet?</a><br><br>
            <?php if(session('status')): ?>
                <p style="color:red"><?php echo e(session('status')); ?></p>
            <?php endif; ?>
            <input type="submit" class="btn btn-secondary" value="Login">
          </form>
    </div>
</div><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/login.blade.php ENDPATH**/ ?>