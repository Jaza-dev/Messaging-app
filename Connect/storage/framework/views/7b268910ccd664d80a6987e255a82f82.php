

<?php $__env->startSection('title', 'My Posts'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <ul type="none">
                <h3 class="text-white text-center">My posts</h3><br>
                <?php $__currentLoopData = $myPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="p-3 bg-opacity-10 border border-secondary border-start-4 rounded">
                        <h2 class="text-white"><?php echo e($post->title); ?></h2>
                        <span class="text-white">Posted by: <?php echo e(auth()->user()->username); ?></span><br>
                        <span class="text-white">Posted at: <?php echo e($post->posted_at); ?></span><br><hr>
                        <p class="text-white"><?php echo e(wordwrap($post->text , 20, "\n", true)); ?></p><hr class="text-white">
                        <span class="text-white">Likes:</span> <span class="text-white"><?php echo e($post->likes); ?></span><br>
                        <span class="text-white">Dislikes:</span> <span class="text-white"><?php echo e($post->dislikes); ?></span><br><br>
                        <a href="<?php echo e(route('showEditPostForm', ['idPost' => $post->idPost])); ?>" class="btn btn-warning"><i class="bi bi-gear"></i> Edit</a>
                        <a href="<?php echo e(route('deletePost', ['idPost' => $post->idPost, 'idUser' => $post->idUser])); ?>" class="btn btn-danger position-relative"><i class="bi bi-trash"></i></a>
                    </li><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/myPosts.blade.php ENDPATH**/ ?>