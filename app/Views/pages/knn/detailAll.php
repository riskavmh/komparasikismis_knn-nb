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
                                    <div class="float-left"> <h3 class="t-0">Detail Perhitungan Data</h3></div>
                                </div>
                                
                                <div class="card-body text-dark">
                                    <div class="accrodion-regular">
                                        <div id="accordion">
                                            <?php foreach ($kunci as $key) { ?> 
                                            <div class="card">
                                                <h5 class="mb-2 mt-2 ml-2 mr-auto">
                                                   <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapse<?= $key['key'] ?>" aria-expanded="false" aria-controls="collapse<?= $key['key'] ?>">
                                                    <span class="fas fa-angle-down mr-3"></span>Data Testing: #<?= $key['key'] ?>
                                                    </button>
                                                 </h5>
                                                <div id="collapse<?= $key['key'] ?>" class="collapse" aria-labelledby="heading<?= $key['key'] ?>" data-parent="#accordion">
                                                    <div class="card">
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
                                                                        <?php foreach ($uji as $dt) {
                                                                                if ($dt['id'] == $key['key'] ) { ?>
                                                                        <tr>
                                                                            <td class="center"><?= $dt['area']; ?></td>
                                                                            <td class="left strong"><?= $dt['majorAxis']; ?></td>
                                                                            <td class="left"><?= $dt['minorAxis']; ?></td>
                                                                            <td class="right"><?= $dt['eccentricity']; ?></td>
                                                                            <td class="center"><?= $dt['convexArea']; ?></td>
                                                                            <td class="right"><?= $dt['extent']; ?></td>
                                                                            <td class="right"><?= $dt['perimeter']; ?></td>
                                                                        </tr>
                                                                        <?php } } ?>
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
                                                                            foreach ($kknnn as $dk => $value) {
                                                                                foreach ($value as $dv => $v) {
                                                                                    if ($v['id_testing'] == $key['key'] ) {
                                                                                // var_dump($v['id_testing']);
                                                                        ?>
                                                                            <tr class="<?= (($dv < $k) && ($v['kelas'] == "kecimen")) ? "table-primary" : ((($dv < $k) && ($v['kelas'] == "besni")) ? "table-secondary" : "") ?>">
                                                                                <td class="center"><?= $v['area']; ?></td>
                                                                                <td class="center"><?= $v['majorAxis']; ?></td>
                                                                                <td class="center"><?= $v['minorAxis']; ?></td>
                                                                                <td class="center"><?= $v['eccentricity']; ?></td>
                                                                                <td class="center"><?= $v['convexArea']; ?></td>
                                                                                <td class="center"><?= $v['extent']; ?></td>
                                                                                <td class="center"><?= $v['perimeter']; ?></td>
                                                                                <td class="center"><?= $v['distance']; ?></td>
                                                                                <td class="center"><?= ucfirst($v['kelas']); ?></td>
                                                                            </tr>
                                                                        
                                                                        <?php } } } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row mb-3 mt-5">
                                                                <div class="col-5 ml-auto">
                                                                    <table class="table table-clear">
                                                                        <tbody>
                                                                            <?php
                                                                            foreach ($result as $dr => $r) {
                                                                                    if ($r['key'] == $key['key'] ) {
                                                                                // var_dump($v['id_testing']);
                                                                            ?>
                                                                            <tr>
                                                                                <td class="left">
                                                                                    <strong class="text-dark">Result</strong>
                                                                                </td>
                                                                                <td class="left <?= ($r[0] == "kecimen") ? "table-primary" : "table-secondary" ;?>">
                                                                                    <strong class="text-dark"><?= ucfirst($r[0]); ?></strong>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <div class="card-footer bg-white mt-3">
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
    </div>
</div>
<?= $this->endSection(); ?>