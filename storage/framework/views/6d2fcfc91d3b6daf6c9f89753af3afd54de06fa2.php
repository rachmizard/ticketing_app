<?php $__env->startSection('content'); ?>
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Pemesanan Tiket</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none"><i class="fa fa-ticket"></i> Form pemesanan tiket online <?php echo e($pesan->rute_from); ?> ke <?php echo e($pesan->rute_to); ?></h3>
              </div>
              <div class="panel panel-default">
                <div class="wizard clearfix" id="form-wizard">
                  <ul class="steps">
                    <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Validasi Biodata Customer</li>
                    <li data-target="#step2"><span class="badge">2</span>Pengambilan tempat duduk</li>
                    <li data-target="#step3"><span class="badge">3</span>Konfirmasi</li>
                  </ul>
                </div>
                <div class="step-content">
                  <form action="/user/konfirmasi-tiket" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="step-pane active" id="step1">
                      <p>Nama Customer</p>
                      <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input type="text" class="form-control" data-trigger="change" name="name" data-required="true" placeholder="Nama.." value="<?php echo e($customer->name); ?>">
                      <p class="m-t">No Telp:</p>
                      <input type="text" class="form-control" data-trigger="change" name="phone" data-required="true" data-type="number" placeholder="Nomor telepon.." value="<?php echo e($customer->phone); ?>"> 
                      <p class="m-t">Alamat:</p>
                      <input type="text" class="form-control" data-trigger="change" name="address" data-required="true" placeholder="Alamat.." value="<?php echo e($customer->address); ?>"> 
                      <p class="m-t">Gender:</p>
                      <select class="form-control" data-trigger="change" name="gender" data-required="true"> 
                        <option selected disabled value="<?php echo e($customer->gender); ?>">Pilih</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="step-pane" id="step2">
                      <p>Jumlah penumpang(tempat duduk)</p> <span class="text-danger">*</span><span>transportasi tersedia <?php echo e($pesan->transportations['seat_qty']); ?> tempat duduk.</span>: 
                      <input type="number" class="form-control" data-trigger="change" data-required="true" data-type="number" name="jumlah_penumpang" placeholder="Masukan jumlah penumpang..">
                      <input type="hidden" name="transportation_id" value="<?php echo e($pesan->transportations['id']); ?>">
                      <p>Kode tempat duduk:</p>
                      <input type="text" class="form-control" data-trigger="change" data-required="true" placeholder="Masukan kode.." name="seat_code" value="<?php echo substr(sha1(mt_rand()),17,6); ?>">
                    </div>
                    <div class="step-pane" id="step3">
                      <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <th>Kode Reservasi</th>
                            <td>
                              <input type="text" class="form-control" data-trigger="change" data-required="true" placeholder="Masukan kode.." name="reservation_code" value="<?php echo substr(sha1(mt_rand()),17,6); ?>">
                            </td>
                          </tr>
                          <tr>
                            <th>Tanggal Reservasi</th>
                            <td>
                              <input type="date" class="form-control" data-trigger="change" data-required="true" placeholder="Masukan kode.." name="reservation_date">
                            </td>
                          </tr>
                          <tr>
                            <th>Rute</th>
                            <td>
                              <?php echo e($pesan->rute_from); ?> menuju <?php echo e($pesan->rute_to); ?>

                              <input type="hidden" value="<?php echo e($pesan->id); ?>" name="rute_id">
                            </td>
                          </tr>
                        </tbody>
                    </table>
                      <button type="submit" class="btn btn-sm btn-next btn-primary">Konfirmasi</button>
                    </div>                
                  </form>
                  <div class="actions m-t">
                    <button type="button" class="btn btn-default btn-sm btn-prev" data-target="#form-wizard" data-wizard="previous" disabled="disabled">Prev</button>
                    <button type="button" class="btn btn-default btn-sm btn-next" data-target="#form-wizard" data-wizard="next" data-last="Finish">Next</button>
                  </div>
                </div>
              </div>
            </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>