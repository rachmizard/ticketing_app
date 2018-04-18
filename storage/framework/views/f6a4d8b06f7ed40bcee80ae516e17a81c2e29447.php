<?php $__env->startSection('content'); ?>

            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-check"></i> Validasi</a></li>
                <li class="active"><?php echo e(Auth::user()->name); ?></li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Validasi Biodata Customer</h3>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  Form Validasi
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                </header>
                <div class="panel-body">
                    <div class="form-validation">
                    <form class="form-valide" action="validate-customer/validate" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-username" name="name" placeholder="Masukan nama.." value="<?php echo e(Auth::user()->name); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-address">Alamat <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-address" name="address" placeholder="Masukan Alamat anda...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-phoneus">Nomor Telepon (Ind) <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-phoneus" name="phone" placeholder="212-999-0000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-skill" name="gender">
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Validasi</button>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
              </section>
            </section>
 <?php $__env->stopSection(); ?>



<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>