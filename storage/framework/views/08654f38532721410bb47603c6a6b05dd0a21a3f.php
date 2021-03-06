<?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- edit reservation modal -->
<div class="modal fade" id="editReservation<?php echo e($edit->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Reservation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/reservation/<?php echo e($edit->id); ?>" data-validate="parsley" method="POST">
            <?php echo e(csrf_field()); ?>

          <div class="form-group has-success">
            <label for="reservation_code">Reservation Code</label>
            <input type="text" name="reservation_code" class="form-control" id="reservation_code" placeholder="Reservation code" data-required="true" value="<?php echo e($edit->reservation_code); ?>">
          </div>
          <div class="form-group has-success">
            <label for="reservation_date">Reservation Date</label>
            <input type="date" id="reservation_date" class="form-control" id="reservation_date" name="reservation_date" placeholder="Reservation Date" data-required="true" value="<?php echo e($edit->reservation_date); ?>">
          </div>            
          <div class="form-group has-success">
            <label for="customer_id">Customer Name</label>
            <select id="customer_id" class="form-control" id="customer_id" name="customer_id" placeholder="Customer Name">
              <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($customer->id); ?>" <?php if($customer->id == $edit->customer_id): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group has-success">
            <label for="seat_code">Seat Code</label>
            <input type="text" id="seat_code" class="form-control" id="seat_code" name="seat_code" placeholder="Seat Code" data-required="true" value="<?php echo e($edit->seat_code); ?>">
          </div>
          <div class="form-group has-success">
            <label for="rute_id">Rute</label>
            <select id="rute_id" class="form-control" id="rute_id" name="rute_id" placeholder="Rute">
              <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($rute->id); ?>" <?php if($edit->rute_id == $rute->id): ?>selected <?php endif; ?>><?php echo e($rute->rute_from); ?> to <?php echo e($rute->rute_to); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>        
        <div class="form-group has-success">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save changes</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
