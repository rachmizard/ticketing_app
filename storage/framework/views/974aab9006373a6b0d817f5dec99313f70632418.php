<!-- show trans modal -->
<?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="showrute<?php echo e($rute->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Rute yang di pilih</h4>
      <div class="modal-body">
        <table class="table table-hover">
          <tr>
            <th>Depart At</th>
            <td><?php echo e($rute->depart_at); ?></td>
          </tr>
          <tr>
            <th>Rute dari</th>
            <td><?php echo e($rute->rute_from); ?></td>
          </tr>
          <tr>
            <th>Rute ke</th>
            <td><?php echo e($rute->rute_to); ?></td>
          </tr>
          <tr>
            <th>Harga</th>
            <td><?php echo e($rute->price); ?></td>
          </tr>
          <tr>
            <th>Transportasi</th>
            <td>
              <button class="btn btn-sm btn-info" data-toggle="popover" data-html="true" data-placement="top" data-content="
                <div class='scrollable'>
                  <table class='table table-hover'>
                    <tr>
                      <th>Kode Transportasi</th>
                      <td><?php echo e($rute->transportations['code']); ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah tempat duduk</th>
                      <td><?php echo e($rute->transportations['seat_qty']); ?></td>
                    </tr>
                    <tr>
                      <th>Type Transportasi</th>
                      <td><?php echo e($rute->transportations->transportation_types->description); ?></td>
                    </tr>
                  </table>
                </div>
                " title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Transportasi'><?php echo e($rute->transportations['description']); ?></button>
            </td>
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
