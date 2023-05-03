

<?php $__env->startSection('title', 'Connect'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <ul type="none">
                <form action="<?php echo e(route('search')); ?>" method="get">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Search title">
                        <div class="input-group-append">
                            <input class="btn btn-secondary" type="submit" value="Search">
                        </div>
                    </div>
                </form>
                <br>
                <?php $__currentLoopData = $all_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="p-3  bg-opacity-10 border border-secondary border-start-4 rounded">
                        <h2 class="text-white"><?php echo e($post->title); ?></h2>
                        <span class="text-white">Posted by: <?php echo e($post->username); ?></span><br>
                        <span class="text-white">Posted at: <?php echo e($post->posted_at); ?></span><br><hr class="text-white">
                        <p class="text-white"><?php echo e(wordwrap($post->text , 20, "\n", true)); ?></p>
                        <a href="<?php echo e(route('like', ['idUser' => auth()->user()->idUser, 'idPost' => $post->idPost])); ?>" type="button" class="btn btn-success">
                            <span><?php echo e($post->likes); ?></span> <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                        <a href="<?php echo e(route('dislike', ['idUser' => auth()->user()->idUser, 'idPost' => $post->idPost])); ?>" type="button" class="btn btn-danger">
                            <span><?php echo e($post->dislikes); ?></span> <i class="bi bi-hand-thumbs-down"></i>
                        </a>
                    </li><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logged_user_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/feed.blade.php ENDPATH**/ ?>