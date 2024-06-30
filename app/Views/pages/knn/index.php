<?= $this->extend("layout/layout"); ?>

<?= $this->section("content"); ?>
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title" style="font-size: 20px;">
                    <?= strtoupper("uji data kismis dengan metode k-nearest neighbor"); ?>
                    <a href="#" title="Uji" data-toggle="modal" data-target="#ujiAllModal">
                        <button id="uji" class="btn btn-space btn-add float-right" disabled>Uji Data Terpilih</button>
                    </a>
                </h2>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php if (!empty(session()->getFlashdata('success'))) { ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <?= session()->getFlashdata('success') ?>
                 <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
              </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Pilih</th>
                                    <th>No.</th>
                                    <th>Area</th>
                                    <th>MajorAxisLength</th>
                                    <th>MinorAxisLength</th>
                                    <th>Eccentricity</th>
                                    <th>ConvexArea</th>
                                    <th>Extent</th>
                                    <th>Perimeter</th>
                                    <th>K</th>
                                    <th>Hasil</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $no = 1;
                                    foreach ($testing as $t) {
                                        foreach ($knn as $k) {
                                            if (($t->id == $k->id_testing) && ($t->knn != null)) {
                                ?>

                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ckb" name="ck[]" value="<?= $t->id ?>" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input ckb"><span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $t->area ?></td>
                                    <td><?= $t->majorAxis ?></td>
                                    <td><?= $t->minorAxis ?></td>
                                    <td><?= $t->eccentricity ?></td>
                                    <td><?= $t->convexArea ?></td>
                                    <td><?= $t->extent ?></td>
                                    <td><?= $t->perimeter ?></td>
                                    <td><?= $k->k ?></td>
                                    <td><?= $k->result ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-uji btn-sm btn-uji" title="Uji" data-toggle="modal" data-target="#ujiModal" data-id="<?= $t->id; ?>" data-area="<?= $t->area; ?>" data-majorAxis="<?= $t->majorAxis; ?>" data-minorAxis="<?= $t->minorAxis; ?>" data-eccentricity="<?= $t->eccentricity; ?>" data-convexArea="<?= $t->convexArea; ?>" data-extent="<?= $t->extent; ?>" data-perimeter="<?= $t->perimeter; ?>">
                                            <i class="fas fa-flask mr-2"></i>Uji Ulang
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('knn/delete/'.$k->id); ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-delete btn-xs" title="Hapus">
                                          <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>

                                <?php } }
                                    if ($t->knn == null){
                                ?>

                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ckb" name="ck[]" value="<?= $t->id ?>" type="checkbox" data-parsley-multiple="groups"data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input ckb"><span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $t->area ?></td>
                                    <td><?= $t->majorAxis ?></td>
                                    <td><?= $t->minorAxis ?></td>
                                    <td><?= $t->eccentricity ?></td>
                                    <td><?= $t->convexArea ?></td>
                                    <td><?= $t->extent ?></td>
                                    <td><?= $t->perimeter ?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-uji btn-sm btn-uji" title="Uji" data-toggle="modal" data-target="#ujiModal" data-id="<?= $t->id; ?>" data-area="<?= $t->area; ?>" data-majorAxis="<?= $t->majorAxis; ?>" data-minorAxis="<?= $t->minorAxis; ?>" data-eccentricity="<?= $t->eccentricity; ?>" data-convexArea="<?= $t->convexArea; ?>" data-extent="<?= $t->extent; ?>" data-perimeter="<?= $t->perimeter; ?>">
                                            <i class="fas fa-flask mr-2"></i>Uji
                                        </a>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>

                                <?php } } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>
</div>

<div class="modal fade" id="ujiModal" tabindex="-1" role="dialog" aria-labelledby="ujiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url('knn/uji/'); ?>" id="form-modal-uji" class="needs-validation" novalidate>
                <div class="modal-header">
                    <!-- Masukkan K -->
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row col-12">
                            <div class="col-3">
                                <label class="text-small text-dark" style="zoom:90%">Masukkan K :</label>
                            </div>
                            <div class="col-3">
                                <input type="hidden" id="input-area" name="area" required readonly>
                                <input type="hidden" id="input-majorAxis" name="majorAxis" required readonly>
                                <input type="hidden" id="input-minorAxis" name="minorAxis" required readonly>
                                <input type="hidden" id="input-eccentricity" name="eccentricity" required readonly>
                                <input type="hidden" id="input-convexarea" name="convexarea" required readonly>
                                <input type="hidden" id="input-extent" name="extent" required readonly>
                                <input type="hidden" id="input-perimeter" name="perimeter" required readonly>
                                <input type="number" class="form-control" name="k" id="validationCustomK" max="<?= count($training) ?>" aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="col-6 mt-2" style="zoom:85%">
                                <span class="">K adalah jumlah tetangga terdekat.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Uji</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ujiAllModal" tabindex="-1" role="dialog" aria-labelledby="ujiAllModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url('knn/ujiAll/'); ?>" id="form-modal-ujiAll" class="needs-validation" novalidate>
                <div class="modal-header">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row col-12">
                            <div class="col-3">
                                <label class="text-small text-dark" style="zoom:90%">Masukkan K :</label>
                            </div>
                            <div class="col-3">
                                <input type="hidden" id="input-id" name="list-id" required readonly>
                                <input type="number" class="form-control" name="k" id="validationCustomK" aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="col-6 mt-2" style="zoom:85%">
                                <span class="">K adalah jumlah tetangga terdekat.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Uji</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
