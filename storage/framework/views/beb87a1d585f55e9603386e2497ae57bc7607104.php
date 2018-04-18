<!-- show trans modal -->
<?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="showtrans<?php echo e($tran->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Transportasi</h4>
      <div class="modal-body">
        <table class="table table-hover">
          <tr>
            <td colspan="5"><img src="/img/<?php echo e($tran->photo); ?>" width="100" height="100" alt=""></td>
          </tr>
          <tr>
            <th>Kode Transportasi</th>
            <td><?php echo e($tran->code); ?></td>
          </tr>
          <tr>
            <th>Jenis Transportasi</th>
            <td><?php echo e($tran->description); ?></td>
          </tr>
          <tr>
            <th>Jumlah tempat duduk</th>
            <td><?php echo e($tran->seat_qty); ?></td>
          </tr>
          <tr>
            <th>Type Transportasi</th>
            <td><?php echo e($tran->transportation_types['description']); ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
