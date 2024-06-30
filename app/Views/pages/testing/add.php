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
                    <a href="<?= base_url('testing');?>"><button class="btn btn-sm btn-space btn-cancel" title="Kembali"><i class="fas fa-arrow-left"></i></button></a>
                    Form Data Kismis
                </h5>
                <div class="card-body">

                    <form method="post" action="<?= base_url('testing') ;?>" class="needs-validation" novalidate>

                        <input type="hidden" class="form-control" name="id" id="validationCustomid" aria-describedby="inputGroupPrepend" value="<?= $id; ?>">

                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Area</label>
                                    <input type="text" class="form-control" name="area" id="validationCustomarea" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan Area.
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">ConvexArea</label>
                                    <input type="text" class="form-control" name="convexArea" id="validationCustomconvexArea" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan ConvexArea.
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">MajorAxisLength</label>
                                    <input type="text" class="form-control" name="majorAxis" id="validationCustommajorAxis" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan MajorAxisLength.
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Extent</label>
                                    <input type="text" class="form-control" name="extent" id="validationCustomextent" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan Extent.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">MinorAxisLength</label>
                                    <input type="text" class="form-control" name="minorAxis" id="validationCustomminorAxis" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan MinorAxisLength.
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Perimeter</label>
                                    <input type="text" class="form-control" name="perimeter" id="validationCustomperimeter" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan Perimeter.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row col-12">
                                <div class="col-6">
                                    <label class="col-form-label text-sm-right text-dark">Eccentricity</label>
                                    <input type="text" class="form-control" name="eccentricity" id="validationCustomeccentricity" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Masukkan Eccentricity.
                                    </div>
                                </div>

                                <div class="col-6 text-right mt-4" style="margin-top: 90px;">
                                    <button type="submit" class="btn btn-space btn-submit col-5">Tambah</button>
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
