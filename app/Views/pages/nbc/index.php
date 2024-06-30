<?= $this->extend("layout/layout"); ?>

<?= $this->section("content"); ?>
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <form action="<?= base_url('nbc/ujiAll') ?>" method="post">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title" style="font-size: 20px;">
                    <?php echo strtoupper("uji data kismis dengan metode Naive Bayes Classifier"); ?>        
                        <input type="hidden" id="input-id" name="list-id" required readonly>
                        <button id="uji" class="btn btn-space btn-add float-right" disabled>Uji Data Terpilih</button>
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
                 <?php echo session()->getFlashdata('success') ?>
                 <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
              </div>
            <?php } ?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_data" class="table table-striped table-bordered">
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
                                    <th>Hasil</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $no = 1;
                                    foreach ($testing as $t) {
                                        foreach ($nbc as $n) {
                                            if (($t->id == $n->id_testing) && ($t->nbc != null)) {
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
                                    <td><?= ucfirst($n->result) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('nbc/uji/'.$t->id) ;?>" class="btn btn-uji btn-sm" title="Uji">
                                            <i class="fas fa-flask"></i>&nbsp;&nbsp;Uji Ulang
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('nbc/delete/'.$n->id); ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-delete btn-xs" title="Hapus">
                                          <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>

                                <?php } }
                                    if ($t->nbc == null){
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
                                    <td class="text-center">
                                        <a href="<?= base_url('nbc/uji/'.$t->id) ;?>" class="btn btn-uji btn-sm" title="Uji">
                                            <i class="fas fa-flask"></i>&nbsp;&nbsp;Uji
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
    </form>
</div>
<?= $this->endSection(); ?>
