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
                                    <div class="float-left"> <h3 class="mb-0">Detail Perhitungan Data</h3>
                                    Data Testing: #<?= $dt->id; ?></div>
                                    <?php } ?>
                                </div>
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
                                                <tr class="">
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
                                                <?php //foreach ($variance as $v) { ?>
                                                <tr class="table-primary">
                                                    <td class="center"><?= "Kecimen"; ?></td>
                                                    <td class="center"><?= $equation[1]; ?></td>
                                                    <td class="center"><?= $equation[2]; ?></td>
                                                    <td class="center"><?= $equation[3]; ?></td>
                                                    <td class="center"><?= $equation[4]; ?></td>
                                                    <td class="center"><?= $equation[5]; ?></td>
                                                    <td class="center"><?= $equation[6]; ?></td>
                                                    <td class="center"><?= $equation[7]; ?></td>
                                                    <td class="center"><?= $equation[8]; ?></td>
                                                </tr>
                                                <tr class="table-secondary">
                                                    <td class="center"><?= "Besni"; ?></td>
                                                    <td class="center"><?= $equation[9]; ?></td>
                                                    <td class="center"><?= $equation[10]; ?></td>
                                                    <td class="center"><?= $equation[11]; ?></td>
                                                    <td class="center"><?= $equation[12]; ?></td>
                                                    <td class="center"><?= $equation[13]; ?></td>
                                                    <td class="center"><?= $equation[14]; ?></td>
                                                    <td class="center"><?= $equation[15]; ?></td>
                                                    <td class="center"><?= $equation[16]; ?></td>
                                                </tr>
                                                
                                                <?php //} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Max Result</strong>
                                                        </td>
                                                        <td class="right <?= (($equation[8]) > ($equation[16])) ? "table-primary" : "table-secondary" ?>"><?php echo (($equation[8]) > ($equation[16])) ? $equation[8] : $equation[16] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Final Result</strong>
                                                        </td>
                                                        <td class="right <?= (($equation[8]) > ($equation[16])) ? "table-primary" : "table-secondary" ?>"><?php echo (($equation[8]) > ($equation[16])) ? ucfirst("kecimen") : ucfirst("besni") ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0"><a href="<?= base_url('nbc');?>"><button class="btn btn-submit float-right col-2" title="Selesai">Selesai</button></a></p>
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