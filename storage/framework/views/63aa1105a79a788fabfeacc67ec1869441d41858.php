<?php $__env->startSection('content'); ?>
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Rute</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Rute</h3>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  <i class="fa fa-map-marker"></i> Data Rute
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                    <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/rute/deletechecked/<?php echo e($in->id); ?>">
                        <?php echo e(csrf_field()); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="btn-group">
                        <?php if(count($rutes) > 0): ?>
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        <?php endif; ?>
                    </div>
                    <table class="table table-hover" data-ride="datatables">
                        <thead>
                            <tr>
                                <?php if(count($rutes) > 0): ?>
                                <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                <?php endif; ?>
                                <th>No</th>
                                <th>Depart At</th>
                                <th>Rute From</th>
                                <th>Rute To</th>
                                <th>Price</th>
                                <th>Transportation</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if(count($rutes) > 0): ?> 
                            <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><!-- checkbox -->
                                <div class="col-md-offset-6 checkbox">
                                  <label class="checkbox-custom">
                                    <input type="checkbox" name="check[]" value="<?php echo e($c->id); ?>">
                                    <i class="fa fa-fw fa-square-o"></i>
                                  </label>
                                </div>
                              </td>
                                <td><?php echo e($no); ?></td>
                                <td><?php echo e($c->depart_at); ?></td>
                                <td><?php echo e($c->rute_from); ?></td>
                                <td><?php echo e($c->rute_to); ?></td>
                                <td><?php echo e($c->price); ?></td>
                                <td>
                                <a class="btn btn-default" data-toggle="modal" data-target="#showtrans<?php echo e($c->transportation_id); ?>">
                                  <i class="fa fa-search text"></i> <?php echo e($c->transportations['description']); ?>

                                  <i class="fa fa-search text-active text-danger"></i>
                                </a>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/rute/delete/<?php echo e($c->id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i></a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editrute<?php echo e($c->id); ?>"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="8"><p class="text-center">No data has saved at database.</p></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
                </div>
              </section>
              <section class="panel-footer">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addrute"></i><i class="fa fa-plus"></i> Tambah Rute</a>
              </section>
            </section>




<?php echo $__env->make('admin.rute.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.rute.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.rute.show-transportation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>