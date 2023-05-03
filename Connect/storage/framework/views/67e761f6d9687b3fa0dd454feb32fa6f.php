

<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-6 mb-3">
            <h3 class="text-white text-center">Edit post</h3>
            <form action="<?php echo e(route('editPost')); ?>" method="get">
                <input type="hidden" name="idPost" value="<?php echo e($post->idPost); ?>">
                <input type="hidden" name="idUser" value="<?php echo e(auth()->user()->idUser); ?>">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title" value="<?php echo e($post->title); ?>">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <textarea id="text" name="text" class="form-control" cols="23" rows="10"><?php echo e($post->text); ?></textarea>
                </div>
                <input class="btn btn-success" type="submit" value="Edit">
            </form>
        </div>
    </div class="row">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/editPost.blade.php ENDPATH**/ ?>