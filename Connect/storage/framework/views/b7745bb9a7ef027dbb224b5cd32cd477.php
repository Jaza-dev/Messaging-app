

<?php $__env->startSection('title', 'Create new post'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('createNewPost')); ?>" method="get">
                <input type="hidden" name="idUser" value="<?php echo e(session('user')->idUser); ?>">
                <input type="text" name="title" placeholder="Title"><br><br>
                <textarea name="text" cols="23" rows="10" placeholder="Text..."></textarea><br><br>
                <input class="btn btn-success" type="submit" value="Post">
            </form>
        </div>
    </div class="row">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/showCreateNewPostForm.blade.php ENDPATH**/ ?>