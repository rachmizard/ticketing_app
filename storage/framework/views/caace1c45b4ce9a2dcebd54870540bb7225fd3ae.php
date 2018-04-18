<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php if(session('messages')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> <?php echo e(session('messages')); ?>

                </div>
            <?php endif; ?>
            <div class="panel panel-warning">
                <div class="panel-heading"><a href="<?php echo e(URL::previous()); ?>" class="btn btn-warning btn-sm"><span class="glyphicons glyphicons-circle-arrow-left"></span>Kembali</a> Detail Pemesanan <strong><?php echo e($detail->customers['name']); ?></strong></div>

                <div id="showFadeIn" class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <table class="table table-hover table-striped">
                      <tbody>
                        <tr>
                          <th>Kode Reservasi</th>
                          <td><?php echo e($detail->reservation_code); ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal Reservasi</th>
                          <td><?php echo e($detail->reservation_date); ?></td>
                        </tr>
                        <tr>
                          <th>Nama Kustomer</th>
                          <td><?php echo e($detail->customers['name']); ?></td>
                        </tr>
                        <tr>
                          <th>Rute</th>
                          <td><?php echo e($detail->rutes['rute_from']); ?> ke <?php echo e($detail->rutes['rute_to']); ?></td>
                        </tr>
                        <tr>
                          <th>Pemesan</th>
                          <td><?php echo e($detail->users['name']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
</div>




















<!-- detail Detail of Reservation modal -->
<div class="modal fade" id="detailDetail of Reservation<?php echo e($detail->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">detail Detail of Reservation</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>