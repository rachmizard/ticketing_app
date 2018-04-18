<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php if(session('messages')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> <?php echo e(session('messages')); ?>

                </div>
            <?php endif; ?>
            <div class="panel panel-warning">
                <div class="panel-heading">Transportation Page</div>

                <div id="showFadeIn" class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $transportations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/transportation/deletechecked/<?php echo e($in->id); ?>">
                        <?php echo e(csrf_field()); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="btn-group">
                        <a href="#addtransportation" class="btn btn-success" data-toggle="modal" data-target="#addtransportation" data-backdrop="static" data-keyboard="true" >Add for transportation</a>
                        <?php if(count($transportations) > 0): ?>
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        <?php endif; ?>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <?php if(count($transportations) > 0): ?>
                                <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                <?php endif; ?>
                                <th>No</th>
                                <th>Kode Transportasi</th>
                                <th>Jumlah Tempat Duduk</th>
                                <th>Gambar</th>
                                <th>Jenis Transportasi</th>
                                <th>Type Transportasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if(count($transportations) > 0): ?> 
                            <?php $__currentLoopData = $transportations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="check[]" value="<?php echo e($c->id); ?>" class="checkhour"></td>
                                <td><?php echo e($no); ?></td>
                                <td><?php echo e($c->code); ?></td>
                                <td><?php echo e($c->seat_qty); ?></td>
                                <td>
                                  <img src="/img/<?php echo e($c->photo); ?>" class="img-circle" width="50" height="50">
                                </td>
                                <td><?php echo e($c->description); ?></td>
                                <td><?php echo e($c->transportation_types['description']); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/transportation/delete/<?php echo e($c->id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')">Delete</a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittransportation<?php echo e($c->id); ?>">Edit</a>
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
                <div class="panel-footer">
                    <?php echo e($transportations->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>






















<!-- add transportation modal -->
<div class="modal fade" id="addtransportation" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add transportation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/transportation" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="code">Kode Transportasi</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="Masukan Kode">
          </div>
          <div class="form-group">
            <label for="seat_qty">Jumlah tempat duduk</label>
            <input type="text" class="form-control" id="seat_qty" name="seat_qty" placeholder="Masukan jumlah tempat duduk...">
          </div>
          <div class="form-group">
            <label for="description">Jenis transportasi</label>
            <input type="text" class="form-control" data-required="true" name="description"> 
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select id="select2-option" class="form-control" data-required="true" name="transportation_type_id"> 
              <?php if(count($types) > 0): ?>
              <option selected disabled>--Pilih Type Transportasi--</option>
              <?php else: ?>
              <option selected disabled>--Tidak ada di database--</option>
              <?php endif; ?>
              <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($type->id); ?>"><?php echo e($type->description); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>            
          <div class="form-group">
            <label for="photo">Gambar transportasi</label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto transportasi">
          </div>
        <div class="form-group">
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

<?php $__currentLoopData = $transportations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- edit transportation modal -->
<div class="modal fade" id="edittransportation<?php echo e($edit->id); ?>" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit transportation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/transportation/<?php echo e($edit->id); ?>" enctype="multipart/form-data" method="POST">
            <?php echo e(csrf_field()); ?>

            <!-- check if transportation are has a photo -->
            <?php if(!$edit->photo == null): ?>
          <div class="form-group">
            <img src="/img/<?php echo e($edit->photo); ?>" width="100" height="100" class="img-circle" id="gambar" alt="">
          </div>
          <div class="form-group">
            <a href="/admin/transportasi/deletephoto/<?php echo e($edit->id); ?>" class="btn btn-danger">Delete Photo</a>
          </div>
            <?php endif; ?>
          <div class="form-group">
            <label for="code">Kode Transportasi</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="Masukan Kode" value="<?php echo e($edit->code); ?>" required=>
          </div>
          <div class="form-group">
            <label for="seat_qty">Jumlah tempat duduk</label>
            <input type="text" class="form-control" id="seat_qty" name="seat_qty" placeholder="Masukan jumlah tempat duduk..." value="<?php echo e($edit->seat_qty); ?>" required=>
          </div>
          <div class="form-group">
            <label for="description">Jenis transportasi</label>
            <input id="description" class="form-control" id="description" name="description" placeholder="Masukan jenis transportasi..." value="<?php echo e($edit->description); ?>"  required>
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select id="select2-option" class="form-control" data-required="true" name="transportation_type_id"> 
              <?php if(count($types) > 0): ?>
              <option selected disabled>--Pilih Type Transportasi--</option>
              <?php else: ?>
              <option selected disabled>--Tidak ada di database--</option>
              <?php endif; ?>
              <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($type->id); ?>" <?php if($type->id == $edit->id): ?> selected <?php endif; ?>><?php echo e($type->description); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>                        
          <div class="form-group">
            <label for="photo">Gambar transportasi</label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto transportasi">
            <input type="hidden" name="photoRequest" value="<?php echo e($edit->photo); ?>">
          </div>
        <div class="form-group">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>