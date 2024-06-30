<?= $this->extend("layout/layout"); ?>

<?= $this->section("content"); ?>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    <a href="<?= base_url('training');?>"><button class="btn btn-sm btn-space btn-cancel" title="Kembali"><i class="fas fa-arrow-left"></i></button></a>
                    Form Data Training
                </h5>
                <div class="card-body">

                    <form method="post" action="<?= base_url('training') ;?>" class="needs-validation" novalidate>

                        <input type="hidden" class="form-control" name="id" id="validationCustomid" aria-describedby="inputGroupPrepend" value="<?= $id; ?>">
                        
                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Area</label>
                                    <input type="text" class="form-control" name="area" id="validationCustomarea" aria-describedby="inputGroupPrepend" required>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">ConvexArea</label>
                                    <input type="text" class="form-control" name="convexArea" id="validationCustomconvexArea" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">MajorAxisLength</label>
                                    <input type="text" class="form-control" name="majorAxis" id="validationCustommajorAxis" aria-describedby="inputGroupPrepend" required>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Extent</label>
                                    <input type="text" class="form-control" name="extent" id="validationCustomextent" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">MinorAxisLength</label>
                                    <input type="text" class="form-control" name="minorAxis" id="validationCustomminorAxis" aria-describedby="inputGroupPrepend" required>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Perimeter</label>
                                    <input type="text" class="form-control" name="perimeter" id="validationCustomperimeter" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Eccentricity</label>
                                    <input type="text" class="form-control" name="eccentricity" id="validationCustomeccentricity" aria-describedby="inputGroupPrepend" required>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Class</label>
                                    <select class="form-control" name="kelas" id="input-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="">--Pilih--</option>
                                        <option value="kecimen">Kecimen</option>
                                        <option value="besni">Besni</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="jabatan">jabatan</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" class="form-control" maxlength="50" placeholder="jabatan">
                            </div>
                        </div> -->

                        <br><br>

                        <!-- <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="Password">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input id="inputPassword" type="password" maxlength="8" placeholder="Password" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Silahkan masukkan password.
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group text-right">
                            <div class="row col-12">
                                <div class="col-6"></div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-space btn-submit col-5">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end validation form -->
        <!-- ============================================================== -->
    </div>
</div>
<?= $this->endSection(); ?>
