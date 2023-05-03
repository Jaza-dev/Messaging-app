

<?php $__env->startSection('title', 'Create new post'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-6 mb-3">
            <h3 class="text-white text-center">Create new post</h3>
            <form action="<?php echo e(route('createNewPost')); ?>" method="get">
                <input type="hidden" name="idUser" value="<?php echo e(auth()->user()->idUser); ?>">
                <div class="mb-3">
                    <label class="form-label text-white" for="title">Title:</label>
                    <input id="title" class="form-control" type="text" name="title" placeholder="Type title here...">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label text-white">Text:</label>
                    <textarea id="text" name="text" class="form-control" cols="23" rows="10" placeholder="Type text here..."></textarea>
                </div>
                <input class="btn btn-success" type="submit" value="Post">
            </form>
        </div>
    </div class="row">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/createNewPostForm.blade.php ENDPATH**/ ?>