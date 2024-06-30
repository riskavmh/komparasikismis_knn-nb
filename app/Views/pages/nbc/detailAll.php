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
                                            <?php foreach ($uji as $key) { ?> 
                                            <div class="card">
                                                <h5 class="mb-2 mt-2 ml-2 mr-auto">
                                                   <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapse<?= $key['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $key['id'] ?>">
                                                    <span class="fas fa-angle-down mr-3"></span>Data Testing: #<?= $key['id'] ?>
                                                    </button>
                                                 </h5>
                                                <div id="collapse<?= $key['id'] ?>" class="collapse" aria-labelledby="heading<?= $key['id'] ?>" data-parent="#accordion">
                                                    <div class="card">
                                                        <div class="card-body text-center text-dark">
                                                            <div class="row mb-2 ml-3">
                                                                <h3 class="text-dark mb-1">Data Testing</h3>
                                                            </div>
                                                            <div class="table-responsive">
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
                                                                            if ($dt['id'] == $key['id'] ) { ?>
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
                                                            <div class="row mb-2 ml-3">
                                                                <h3 class="text-dark mb-1">Class Probability</h3>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="50%">Kecimen</th>
                                                                            <th width="50%">Besni</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="center table-primary"><?= $prob_k; ?></td>
                                                                            <td class="center table-secondary"><?= $prob_b; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="card-body text-center text-dark">
                                                            <div class="row mb-2 ml-3">
                                                                <h3 class="text-dark mb-1">Mean</h3>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Class</th>
                                                                            <th>Area</th>
                                                                            <th>MajorAxisLength</th>
                                                                            <th>MinorAxisLength</th>
                                                                            <th>Eccentricity</th>
                                                                            <th>ConvexArea</th>
                                                                            <th>Extent</th>
                                                                            <th>Perimeter</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($mean as $m) { ?>
                                                                        <tr class="<?= ($m['kelas'] == "kecimen") ? "table-primary" : "table-secondary" ; ?>">
                                                                            <td class="right"><?= ucfirst($m['kelas']); ?></td>
                                                                            <td class="center"><?= $m['areaMean']; ?></td>
                                                                            <td class="left strong"><?= $m['majorAxisMean']; ?></td>
                                                                            <td class="left"><?= $m['minorAxisMean']; ?></td>
                                                                            <td class="right"><?= $m['eccentricityMean']; ?></td>
                                                                            <td class="center"><?= $m['convexAreaMean']; ?></td>
                                                                            <td class="right"><?= $m['extentMean']; ?></td>
                                                                            <td class="right"><?= $m['perimeterMean']; ?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="card-body text-center text-dark">
                                                            <div class="row mb-2 ml-3">
                                                                <h3 class="text-dark mb-1">Standard Deviation</h3>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Class</th>
                                                                            <th>Area</th>
                                                                            <th>MajorAxisLength</th>
                                                                            <th>MinorAxisLength</th>
                                                                            <th>Eccentricity</th>
                                                                            <th>ConvexArea</th>
                                                                            <th>Extent</th>
                                                                            <th>Perimeter</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="table-primary">
                                                                            <td class="center"><?= "Kecimen"; ?></td>
                                                                            <td class="center"><?= $variance[0]; ?></td>
                                                                            <td class="center"><?= $variance[1]; ?></td>
                                                                            <td class="center"><?= $variance[2]; ?></td>
                                                                            <td class="center"><?= $variance[3]; ?></td>
                                                                            <td class="center"><?= $variance[4]; ?></td>
                                                                            <td class="center"><?= $variance[5]; ?></td>
                                                                            <td class="center"><?= $variance[6]; ?></td>
                                                                        </tr>
                                                                        <tr class="table-secondary">
                                                                            <td class="center"><?= "Besni"; ?></td>
                                                                            <td class="center"><?= $variance[7]; ?></td>
                                                                            <td class="center"><?= $variance[8]; ?></td>
                                                                            <td class="center"><?= $variance[9]; ?></td>
                                                                            <td class="center"><?= $variance[10]; ?></td>
                                                                            <td class="center"><?= $variance[11]; ?></td>
                                                                            <td class="center"><?= $variance[12]; ?></td>
                                                                            <td class="center"><?= $variance[13]; ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="card-body text-center text-dark">
                                                            <div class="row mb-2 ml-3">
                                                                <h3 class="text-dark mb-1">Result</h3>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table" >
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Class</th>
                                                                            <th>Area</th>
                                                                            <th>MajorAxisLength</th>
                                                                            <th>MinorAxisLength</th>
                                                                            <th>Eccentricity</th>
                                                                            <th>ConvexArea</th>
                                                                            <th>Extent</th>
                                                                            <th>Perimeter</th>
                                                                            <th>Result</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($equation as $de => $e) {
                                                                            if ($e['id_testing'] == $key['id'] ) { ?>
                                                                        <tr class="table-primary">
                                                                            <td class="center"><?= "Kecimen"; ?></td>
                                                                            <td class="center"><?= $e['ar_k']; ?></td>
                                                                            <td class="center"><?= $e['ma_k']; ?></td>
                                                                            <td class="center"><?= $e['mi_k']; ?></td>
                                                                            <td class="center"><?= $e['ec_k']; ?></td>
                                                                            <td class="center"><?= $e['co_k']; ?></td>
                                                                            <td class="center"><?= $e['ex_k']; ?></td>
                                                                            <td class="center"><?= $e['pe_k']; ?></td>
                                                                            <td class="center"><?= $e['e_k']; ?></td>
                                                                        </tr>
                                                                        <tr class="table-secondary">
                                                                            <td class="center"><?= "Besni"; ?></td>
                                                                            <td class="center"><?= $e['ar_b']; ?></td>
                                                                            <td class="center"><?= $e['ma_b']; ?></td>
                                                                            <td class="center"><?= $e['mi_b']; ?></td>
                                                                            <td class="center"><?= $e['ec_b']; ?></td>
                                                                            <td class="center"><?= $e['co_b']; ?></td>
                                                                            <td class="center"><?= $e['ex_b']; ?></td>
                                                                            <td class="center"><?= $e['pe_b']; ?></td>
                                                                            <td class="center"><?= $e['e_b']; ?></td>
                                                                        </tr>
                                                                        <?php } } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-lg-4 col-sm-5">
                                                                </div>
                                                                <div class="col-lg-4 col-sm-5 ml-auto">
                                                                    <table class="table table-clear">
                                                                        <tbody>
                                                                            <?php foreach ($equation as $de => $e) {
                                                                            if ($e['id_testing'] == $key['id'] ) { ?>
                                                                            <tr>
                                                                                <td class="left">
                                                                                    <strong class="text-dark">Max Result</strong>
                                                                                </td>
                                                                                <td class="right <?= (($e['e_k']) > ($e['e_b'])) ? "table-primary" : "table-secondary" ?>"><?php echo (($e['e_b']) > ($e['e_k'])) ? $e['e_b'] : $e['e_k'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="left">
                                                                                    <strong class="text-dark">Final Result</strong>
                                                                                </td>
                                                                                <td class="right <?= (($e['e_k']) > ($e['e_b'])) ? "table-primary" : "table-secondary" ?>"><?php echo (($e['e_k']) > ($e['e_b'])) ? ucfirst("kecimen") : ucfirst("besni") ?></td>
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
                                            <?php } ?>
                                        </div>

                                        <div class="card-footer bg-white mt-3">
                                            <p class="t-0"><a href="<?= base_url('nbc');?>"><button class="btn btn-submit float-right col-2" title="Selesai">Selesai</button></a></p>
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