

<?php $__env->startSection('header'); ?>
    <div class="row sticky-top">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(route('showFeed')); ?>">
                    <i class="bi bi-c-square"></i>
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="<?php echo e(route('showFeed')); ?>" class="nav-link active">Feed</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('showCreateNewPostForm')); ?>" class="nav-link active">Create new post</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('showMyPosts', ['id' => auth()->user()->idUser])); ?>" class="nav-link active">My posts</a></li>
                </ul>
                
                <span class="text-white dropdown form-inline my-2 my-lg-0">
                    <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->surname); ?>&emsp;
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('myProfile')); ?>">Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a></li>
                    </ul>
                </span>
            </div>
        </nav>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jazar\zeljko-project\resources\views/logged_user_template.blade.php ENDPATH**/ ?>