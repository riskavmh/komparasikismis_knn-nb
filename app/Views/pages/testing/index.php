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
                    <?php echo strtoupper("data kismis"); ?>
                    <a href="<?= base_url('testing/add') ?>"><button class="btn btn-space btn-add float-right">Tambah Data</button></a>
                </h2>
                <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div> -->
                <!-- <hr> -->
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
                <!-- <div class="card-header">
                    <h5 class="mb-0">Data Tables - Print, Excel, CSV, PDF Buttons</h5>
                    <p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p>
                    <button class="btn btn-space btn-add float-right">Tambah Data</button>
                </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Area</th>
                                    <th>MajorAxisLength</th>
                                    <th>MinorAxisLength</th>
                                    <th>Eccentricity</th>
                                    <th>ConvexArea</th>
                                    <th>Extent</th>
                                    <th>Perimeter</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php //$no = 1; for ($i=0; $i <=100 ; $i++) { ?> -->
                                <?php
                                    $no = 1; foreach ($testing as $d) {
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d->area ?></td>
                                    <td><?= $d->majorAxis ?></td>
                                    <td><?= $d->minorAxis ?></td>
                                    <td><?= $d->eccentricity ?></td>
                                    <td><?= $d->convexArea ?></td>
                                    <td><?= $d->extent ?></td>
                                    <td><?= $d->perimeter ?></td>
                                    <td width="8%">
                                        <a href="<?= base_url('testing/edit/'.$d->id); ?>" class="btn btn-edit btn-xs" title="Ubah">
                                          <span class="fas fa-pencil-alt"></span>
                                        </a>
                                        <a href="<?= base_url('testing/delete/'.$d->id); ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-delete btn-xs" title="Hapus">
                                          <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
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
<?= $this->endSection(); ?>
