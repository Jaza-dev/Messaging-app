

<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-6 ">
            <h3 class="text-white text-center">My profile</h3><br>
            <form action="<?php echo e(route('updateProfile')); ?>" method="post">
            <?php echo csrf_field(); ?>
                <table class="table table-bordered align-middle">
                    <tr>
                        <td class="text-white">Username:</td>
                        <td><input type="text" name="username" value="<?php echo e(auth()->user()->username); ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Email:</td>
                        <td><input type="text" name="email" value="<?php echo e(auth()->user()->email); ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Name:</td>
                        <td><input type="text" name="name" value="<?php echo e(auth()->user()->name); ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Surname:</td>
                        <td><input type="text" name="surname" value="<?php echo e(auth()->user()->surname); ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Password:</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Repeat password:</td>
                        <td><input type="password" name="repeat_password" class="form-control"></td>
                    </tr>
                </table>
                <?php if(session('profileUpdateSuccess') == 1): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Profile has been successfully updated.
                        <?php echo e(session(['profileUpdateSuccess' => 0])); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif(session('profileUpdateSuccess') == 2): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error updating password.
                        <?php echo e(session(['profileUpdateSuccess' => 0])); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <input type="submit" class="btn btn-success" value="Update">
            </form>
        </div>
    </div><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/profile.blade.php ENDPATH**/ ?>