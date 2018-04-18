<?php $__env->startSection('content'); ?>
 <!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Profie Account</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-heading">Admin Profile Account</div>

                <div class="card-body">
                    <?php if(session('messages')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('messages')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="profile/update" enctype="multipart/form-data" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <?php if(!Auth::user()->photo == null): ?>
                            <img src="/img/<?php echo e(Auth::user()->photo); ?>" class="img-circle" width="100" height="100" alt="">
                            <?php else: ?>
                            <img src="/img/user.png" class="img-circle" width="100" height="100" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" placeholder="Input kan..." value="<?php echo e(Auth::user()->name); ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Input kan..." value="<?php echo e(Auth::user()->email); ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <input type="file" class="form-control" name="photo">
                            <input type="hidden" value="<?php echo e(Auth::user()->photo); ?>" name="photoRequest">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>