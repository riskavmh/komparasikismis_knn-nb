<?= $this->extend("layout/layout"); ?>

<?= $this->section("content"); ?>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <?php foreach ($uji as $dt) { ?>
                                    <div class="float-left"> <h3 class="t-0">Detail Perhitungan Data</h3>
                                    Data Testing: #<?= $dt->id; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="card-body text-center text-dark">
                                    <div class="row t-2 ml-3">
                                        <h3 class="text-dark t-1">Data Testing</h3>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Area</th>
                                                    <th>MajorAxisLength</th>
                                                    <th>MinorAxisLength</th>
                                                    <th>Eccentricity</th>
                                                    <th>ConvexArea</th>
                                                    <th>Extent</th>
                                                    <th>Perimeter</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-warning">
                                                <?php foreach ($uji as $dt) { ?>
                                                <tr>
                                                    <td class="center"><?= $dt->area; ?></td>
                                                    <td class="left strong"><?= $dt->majorAxis; ?></td>
                                                    <td class="left"><?= $dt->minorAxis; ?></td>
                                                    <td class="right"><?= $dt->eccentricity; ?></td>
                                                    <td class="center"><?= $dt->convexArea; ?></td>
                                                    <td class="right"><?= $dt->extent; ?></td>
                                                    <td class="right"><?= $dt->perimeter; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-body text-center text-dark">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>K</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-success">
                                                    <td class="center"><?= $k; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                <div class="card-body text-center text-dark">
                                    <div class="row t-2 ml-3">
                                        <h3 class="text-dark t-1">Distance</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table tb_detail">
                                            <thead>
                                                <tr>
                                                    <th>Area</th>
                                                    <th>MajorAxisLength</th>
                                                    <th>MinorAxisLength</th>
                                                    <th>Eccentricity</th>
                                                    <th>ConvexArea</th>
                                                    <th>Extent</th>
                                                    <th>Perimeter</th>
                                                    <th>Distance</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($distance as $i => $d) {
                                                ?>
                                                <tr class="<?= (($i < $k) && ($d['kelas'] == "kecimen")) ? "table-primary" : ((($i < $k) && ($d['kelas'] == "besni")) ? "table-secondary" : "") ?>">
                                                    <td class="center"><?= $d['area']; ?></td>
                                                    <td class="center"><?= $d['majorAxis']; ?></td>
                                                    <td class="center"><?= $d['minorAxis']; ?></td>
                                                    <td class="center"><?= $d['eccentricity']; ?></td>
                                                    <td class="center"><?= $d['convexArea']; ?></td>
                                                    <td class="center"><?= $d['extent']; ?></td>
                                                    <td class="center"><?= $d['perimeter']; ?></td>
                                                    <td class="center"><?= $d['distance']; ?></td>
                                                    <td class="center"><?= ucfirst($d['kelas']); ?></td>
                                                </tr>
                                                    
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                            <div class="col-5 ml-auto">
                                                <table class="table table-clear">
                                                    <tbody>
                                                        <tr>
                                                            <td class="left">
                                                                <strong class="text-dark">Result</strong>
                                                            </td>
                                                            <td class="left <?= (end($knnn) == "kecimen") ? "table-primary" : "table-secondary" ;?>">
                                                                <strong class="text-dark"><?= ucfirst(end($knnn)); ?></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-white">
                                    <p class="t-0"><a href="<?= base_url('knn');?>"><button class="btn btn-submit float-right col-2" title="Selesai">Selesai</button></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>