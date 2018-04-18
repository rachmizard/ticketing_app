<?php $__env->startSection('content'); ?>
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Reservasi</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Reservasi</h3>
                <?php if(session('messages')): ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Success!</strong> <?php echo e(session('messages')); ?>

                  </div>
                <?php endif; ?>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  <i class="fa fa-shopping-cart"></i> Data Reservasi
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/reservation/deletechecked/<?php echo e($in->id); ?>">
                        <?php echo e(csrf_field()); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="btn-group">
                        <?php if(count($reservations) > 0): ?>
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        <?php endif; ?>
                    </div>
                    <table class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <?php if(count($reservations) > 0): ?>
                                <th>
                                  <button type="button" class="checkall btn btn-primary btn-sm">Check All</button>
                                </th>
                                <?php endif; ?>
                                <th>No</th>
                                <th>Kode reservasi</th>
                                <th>Tanggal reservasi</th>
                                <th>Nama Customer</th>
                                <th>Rute</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if(count($reservations) > 0): ?> 
                            <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                <!-- checkbox -->
                                <div class="col-md-offset-6 checkbox">
                                  <label class="checkbox-custom">
                                    <input type="checkbox" name="check[]" value="<?php echo e($c->id); ?>">
                                    <i class="fa fa-fw fa-square-o"></i>
                                  </label>
                                </div>
                                </td>
                                <td><?php echo e($no); ?></td>
                                <td><?php echo e($c->reservation_code); ?></td>
                                <td><?php echo e($c->reservation_date); ?></td>
                                <td><?php echo e($c->customers['name']); ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#showrute<?php echo e($c->rute_id); ?>"><?php echo e($c->rutes['rute_from']); ?> ke <?php echo e($c->rutes['rute_to']); ?></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(URL::to('/admin/reservation/' . $c->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
                                        <a href="/admin/reservation/delete/<?php echo e($c->id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i></a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editReservation<?php echo e($c->id); ?>"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
                </div>
              </section>
              <section class="panel-footer">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addReservation"><i class="fa fa-plus"></i> Tambah Reservasi</a>
              </section>
            </section>
<?php echo $__env->make('admin.reservation.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.reservation.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.reservation.show-rute', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.rute.show-transportation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>