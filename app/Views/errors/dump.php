<?php 

// $id_training = $item->id;
                $area = intval($item->area);
                $majorAxis = floatval($item->majorAxis);
                $minorAxis = floatval($item->minorAxis);
                $eccentricity = floatval($item->eccentricity);
                $convexArea = intval($item->convexArea);
                $extent = floatval($item->extent);
                $perimeter = floatval($item->perimeter);
        
        $k_row = array(
                    'area' => $area,
                    'majorAxis' => $majorAxis,
                    'minorAxis' => $minorAxis,
                    'eccentricity' => $eccentricity,
                    'convexArea' => $convexArea,
                    'extent' => $extent,
                    'perimeter' => $perimeter,
                    'kelas' => $kelas
                );

                    array_push($training, $k_row);

                /*if ($kelas == "kecimen") {
                    $k_row = array(
                        'area' => $area,
                        'majorAxis' => $majorAxis,
                        'minorAxis' => $minorAxis,
                        'eccentricity' => $eccentricity,
                        'convexArea' => $convexArea,
                        'extent' => $extent,
                        'perimeter' => $perimeter
                    );
                    array_push($kecimen, $k_row);
                }
                if ($kelas == "besni") {
                    $b_row = array(
                        'area' => $area,
                        'majorAxis' => $majorAxis,
                        'minorAxis' => $minorAxis,
                        'eccentricity' => $eccentricity,
                        'convexArea' => $convexArea,
                        'extent' => $extent,
                        'perimeter' => $perimeter
                    );
                    array_push($besni, $b_row);
                }*/

                /*$ar_k = 0; $ma_k = 0; $mi_k = 0; $ec_k = 0; $co_k = 0; $ex_k = 0; $pe_k = 0;
            for ($i=0; $i < count($training); $i++) {
                if ($training[$i]['kelas'] == "kecimen") {
                    $ar_k = $ar_k+$training[$i]['area'] / $kecimen;
                    $ma_k = $ma_k+$training[$i]['majorAxis'] / $kecimen;
                    $mi_k = $mi_k+$training[$i]['minorAxis'] / $kecimen;
                    $ec_k = $ec_k+$training[$i]['eccentricity'] / $kecimen;
                    $co_k = $co_k+$training[$i]['convexArea'] / $kecimen;
                    $ex_k = $ex_k+$training[$i]['extent'] / $kecimen;
                    $pe_k = $pe_k+$training[$i]['perimeter'] / $kecimen;
                } else if ($training[$i]['kelas'] == "besni") {
                    $ar_k = $ar_k+$training[$i]['area'] / $besni;
                    $ma_k = $ma_k+$training[$i]['majorAxis'] / $besni;
                    $mi_k = $mi_k+$training[$i]['minorAxis'] / $besni;
                    $ec_k = $ec_k+$training[$i]['eccentricity'] / $besni;
                    $co_k = $co_k+$training[$i]['convexArea'] / $besni;
                    $ex_k = $ex_k+$training[$i]['extent'] / $besni;
                    $pe_k = $pe_k+$training[$i]['perimeter'] / $besni;
                }
            }*/

        $var_k = []; $vma_k = []; $vmi_k = []; $vec_k = []; $vco_k = []; $vex_k = []; $vpe_k = [];
            for ($i=0; $i < count($kecimen); $i++) {
                // for ($j=0; $j < count($mean_k); $j++) {
                    $area_k = pow(($kecimen[$i]['area'] - $ar_k), 2);
                    $majorAxis = pow(($kecimen[$i]['majorAxis'] - $ma_k[$i]['majorAxis']), 2);
                    $minorAxis = pow(($kecimen[$i]['minorAxis'] - $mi_k[$i]['minorAxis']), 2);
                    $eccentricity = pow(($kecimen[$i]['eccentricity'] - $ec_k[$i]['eccentricity']), 2);
                    $convexArea = pow(($kecimen[$i]['convexArea'] - $co_k[$i]['convexArea']), 2);
                    $extent = pow(($kecimen[$i]['extent'] - $ex_k[$i]['extent']), 2);
                    $perimeter = pow(($kecimen[$i]['perimeter'] - $pe_k[$i]['perimeter']), 2);

                    array_push($var_k, $area_k); array_push($vma_k, $majorAxis); array_push($vmi_k, $minorAxis); array_push($vec_k, $eccentricity); array_push($vco_k, $convexArea); array_push($vex_k, $extent); array_push($vpe_k, $perimeter);
                // }
            }
            // $ar_b = 0; $ma_b = 0; $mi_b = 0; $ec_b = 0; $co_b = 0; $ex_b = 0; $pe_b = 0;
            // $var_b = []; $vma_b = []; $vmi_b = []; $vec_b = []; $vco_b = []; $vex_b = []; $vpe_b = [];
            for ($i=0; $i < count($besni); $i++) {
                // for ($j=0; $j < count($mean_b); $j++) {
                    $area = pow(($besni[$i]['area'] - $mean_b[$i]['area']), 2);
                    $majorAxis = pow(($besni[$i]['majorAxis'] - $mean_b[$i]['majorAxis']), 2);
                    $minorAxis = pow(($besni[$i]['minorAxis'] - $mean_b[$i]['minorAxis']), 2);
                    $eccentricity = pow(($besni[$i]['eccentricity'] - $mean_b[$i]['eccentricity']), 2);
                    $convexArea = pow(($besni[$i]['convexArea'] - $mean_b[$i]['convexArea']), 2);
                    $extent = pow(($besni[$i]['extent'] - $mean_b[$i]['extent']), 2);
                    $perimeter = pow(($besni[$i]['perimeter'] - $mean_b[$i]['perimeter']), 2);
                    array_push($var_b, $area); array_push($vma_b, $majorAxis); array_push($vmi_b, $minorAxis); array_push($vec_b, $eccentricity); array_push($vco_b, $convexArea); array_push($vex_b, $extent); array_push($vpe_b, $perimeter);
                // }
            }

            var_dump($var_k);

            $variance_k = []; $variance_b = [];
            $vk_row = [
                'kelas' => "Kecimen",
                'area' => array_sum($var_k) / (count($var_k)-1),
                'majorAxis' => array_sum($vma_k) / (count($vma_k)-1),
                'minorAxis' => array_sum($vmi_k) / (count($vmi_k)-1),
                'eccentricity' => array_sum($vec_k) / (count($vec_k)-1),
                'convexArea' => array_sum($vco_k) / (count($vco_k)-1),
                'extent' => array_sum($vex_k) / (count($vex_k)-1),
                'perimeter' => array_sum($vpe_k) / (count($vpe_k)-1)
            ];
            array_push($variance_k, $vk_row);
            $vb_row = [
                'kelas' => "Besni",
                'area' => array_sum($var_b) / (count($var_b)-1),
                'majorAxis' => array_sum($vma_b) / (count($vma_b)-1),
                'minorAxis' => array_sum($vmi_b) / (count($vmi_b)-1),
                'eccentricity' => array_sum($vec_b) / (count($vec_b)-1),
                'convexArea' => array_sum($vco_b) / (count($vco_b)-1),
                'extent' => array_sum($vex_b) / (count($vex_b)-1),
                'perimeter' => array_sum($vpe_b) / (count($vpe_b)-1)
            ];
            array_push($variance_b, $vb_row);

            // var_dump($variance_b);

            $equation_k = []; $equation_b = [];
            for ($i=0; $i < count($variance_k); $i++) {
                for ($j=0; $j < count($mean_k); $j++) {
                    $ek_row = [
                        'id' => $testing[$i]['id_testing'],
                        'area' => $area = 1/sqrt(2*3.14*$variance_k[$i]['area'])*exp((pow(-($testing[$i]['area']-$mean_k[$i]['area']), 2)) / (2*pow($variance_k[$i]['area'], 2))),
                        'majorAxis' => $majorAxis = 1/sqrt(2*3.14*$variance_k[$i]['majorAxis'])*exp((pow(-($testing[$i]['majorAxis']-$mean_k[$i]['majorAxis']), 2)) / (2*pow($variance_k[$i]['majorAxis'], 2))),
                        'minorAxis' => $minorAxis = 1/sqrt(2*3.14*$variance_k[$i]['minorAxis'])*exp((pow(-($testing[$i]['minorAxis']-$mean_k[$i]['minorAxis']), 2)) / (2*pow($variance_k[$i]['minorAxis'], 2))),
                        'eccentricity' => $eccentricity = 1/sqrt(2*3.14*$variance_k[$i]['eccentricity'])*exp((pow(-($testing[$i]['eccentricity']-$mean_k[$i]['eccentricity']), 2)) / (2*pow($variance_k[$i]['eccentricity'], 2))),
                        'convexArea' => $convexArea = 1/sqrt(2*3.14*$variance_k[$i]['convexArea'])*exp((pow(-($testing[$i]['convexArea']-$mean_k[$i]['convexArea']), 2)) / (2*pow($variance_k[$i]['convexArea'], 2))),
                        'extent' => $extent = 1/sqrt(2*3.14*$variance_k[$i]['extent'])*exp((pow(-($testing[$i]['extent']-$mean_k[$i]['extent']), 2)) / (2*pow($variance_k[$i]['extent'], 2))),
                        'perimeter' => $perimeter = 1/sqrt(2*3.14*$variance_k[$i]['perimeter'])*exp((pow(-($testing[$i]['perimeter']-$mean_k[$i]['perimeter']), 2)) / (2*pow($variance_k[$i]['perimeter'], 2))),
                        'equation' => $area * $majorAxis * $minorAxis * $eccentricity * $convexArea * $extent * $perimeter * $prob_k,
                        'result' => "kecimen"
                    ];
                    array_push($equation_k, $ek_row);
                    // echo json_encode($equation_k);
                    // echo json_encode("<br>");
                    // var_dump($mean_k[$i]['area']);
                }
            }
            for ($i=0; $i < count($variance_b); $i++) {
                for ($j=0; $j < count($mean_b); $j++) {
                    $eb_row = [
                        'id' => $testing[$i]['id_testing'],
                        'area' => $area = 1/sqrt(2*3.14*$variance_b[$i]['area'])*exp((pow(-($testing[$i]['area']-$mean_b[$i]['area']), 2)) / (2*pow($variance_b[$i]['area'], 2))),
                        'majorAxis' => $majorAxis = 1/sqrt(2*3.14*$variance_b[$i]['majorAxis'])*exp((pow(-($testing[$i]['majorAxis']-$mean_b[$i]['majorAxis']), 2)) / (2*pow($variance_b[$i]['majorAxis'], 2))),
                        'minorAxis' => $minorAxis = 1/sqrt(2*3.14*$variance_b[$i]['minorAxis'])*exp((pow(-($testing[$i]['minorAxis']-$mean_b[$i]['minorAxis']), 2)) / (2*pow($variance_b[$i]['minorAxis'], 2))),
                        'eccentricity' => $eccentricity = 1/sqrt(2*3.14*$variance_b[$i]['eccentricity'])*exp((pow(-($testing[$i]['eccentricity']-$mean_b[$i]['eccentricity']), 2)) / (2*pow($variance_b[$i]['eccentricity'], 2))),
                        'convexArea' => $convexArea = 1/sqrt(2*3.14*$variance_b[$i]['convexArea'])*exp((pow(-($testing[$i]['convexArea']-$mean_b[$i]['convexArea']), 2)) / (2*pow($variance_b[$i]['convexArea'], 2))),
                        'extent' => $extent = 1/sqrt(2*3.14*$variance_b[$i]['extent'])*exp((pow(-($testing[$i]['extent']-$mean_b[$i]['extent']), 2)) / (2*pow($variance_b[$i]['extent'], 2))),
                        'perimeter' => $perimeter = 1/sqrt(2*3.14*$variance_b[$i]['perimeter'])*exp((pow(-($testing[$i]['perimeter']-$mean_b[$i]['perimeter']), 2)) / (2*pow($variance_b[$i]['perimeter'], 2))),
                        'equation' => $area * $majorAxis * $minorAxis * $eccentricity * $convexArea * $extent * $perimeter * $prob_b,
                        'result' => "besni"
                    ];
                    array_push($equation_b, $eb_row);
                    /*var_dump($testing[$i]['eccentricity']);
                    var_dump($mean_b[$i]['eccentricity']);
                    var_dump($variance_b[$i]['eccentricity']);*/
                    // echo json_encode($equation_b);
                    // var_dump($equation_b);
                    // var_dump($prob_b);
                }
            }


$variance = [];
        $var_k = 0; $vma_k = 0; $vmi_k = 0; $vec_k = 0; $vco_k = 0; $vex_k = 0; $vpe_k = 0;
        $var_b = 0; $vma_b = 0; $vmi_b = 0; $vec_b = 0; $vco_b = 0; $vex_b = 0; $vpe_b = 0; 
        for ($i=0; $i < count($training); $i++) {
            // if ($training[$i]['kelas'] == "kecimen") {
            $vk_row = [
                'var_k' => $var_k = $var_k+(pow(($training[$i]['area'] - $mean[0]['areaMean']), 2)/($kecimen-1)),
                'vma_k' => $vma_k = $vma_k+(pow(($training[$i]['majorAxis'] - $mean[0]['majorAxisMean']), 2)/($kecimen-1)),
                'vmi_k' => $vmi_k = $vmi_k+(pow(($training[$i]['minorAxis'] - $mean[0]['minorAxisMean']), 2)/($kecimen-1)),
                'vec_k' => $vec_k = $vec_k+(pow(($training[$i]['eccentricity'] - $mean[0]['eccentricityMean']), 2)/($kecimen-1)),
                'vco_k' => $vco_k = $vco_k+(pow(($training[$i]['convexArea'] - $mean[0]['convexAreaMean']), 2)/($kecimen-1)),
                'vex_k' => $vex_k = $vex_k+(pow(($training[$i]['extent'] - $mean[0]['extentMean']), 2)/($kecimen-1)),
                'vpe_k' => $vpe_k = $vpe_k+(pow(($training[$i]['perimeter'] - $mean[0]['perimeterMean']), 2)/($kecimen-1)),
            ];
            // } else if ($training[$i]['kelas'] == "besni") {
           $vb_row = [
                'var_b' => $var_b = $var_b+(pow(($training[$i]['area'] - $mean[1]['areaMean']), 2)/($besni-1)),
                'vma_b' => $vma_b = $vma_b+(pow(($training[$i]['majorAxis'] - $mean[1]['majorAxisMean']), 2)/($besni-1)),
                'vmi_b' => $vmi_b = $vmi_b+(pow(($training[$i]['minorAxis'] - $mean[1]['minorAxisMean']), 2)/($besni-1)),
                'vec_b' => $vec_b = $vec_b+(pow(($training[$i]['eccentricity'] - $mean[1]['eccentricityMean']), 2)/($besni-1)),
                'vco_b' => $vco_b = $vco_b+(pow(($training[$i]['convexArea'] - $mean[1]['convexAreaMean']), 2)/($besni-1)),
                'vex_b' => $vex_b = $vex_b+(pow(($training[$i]['extent'] - $mean[1]['extentMean']), 2)/($besni-1)),
                'vpe_b' => $vpe_b = $vpe_b+(pow(($training[$i]['perimeter'] - $mean[1]['perimeterMean']), 2)/($besni-1)),
            ];
            // }
        }
        array_push($variance, $vk_row, $vb_row);





for ($i=0; $i < count($testing); $i++) {
            // if ($training[$i]['kelas'] == "kecimen") {
                $ar_k = $ar_k+(1/sqrt(2*3.14*$var_k)*exp((pow(-($testing[$i]['ar']-$data['mean'][0]['areaMean']), 2)) / (2*pow($var_k, 2))));
                $ma_k = $ma_k+(1/sqrt(2*3.14*$vma_k)*exp((pow(-($testing[$i]['ma']-$data['mean'][0]['majorAxisMean']), 2)) / (2*pow($vma_k, 2))));
                $mi_k = $mi_k+(1/sqrt(2*3.14*$vmi_k)*exp((pow(-($testing[$i]['mi']-$data['mean'][0]['minorAxisMean']), 2)) / (2*pow($vmi_k, 2))));
                $ec_k = $ec_k+(1/sqrt(2*3.14*$vec_k)*exp((pow(-($testing[$i]['ec']-$data['mean'][0]['eccentricityMean']), 2)) / (2*pow($vec_k, 2))));
                $co_k = $co_k+(1/sqrt(2*3.14*$vco_k)*exp((pow(-($testing[$i]['co']-$data['mean'][0]['convexAreaMean']), 2)) / (2*pow($vco_k, 2))));
                $ex_k = $ex_k+(1/sqrt(2*3.14*$vex_k)*exp((pow(-($testing[$i]['ex']-$data['mean'][0]['extentMean']), 2)) / (2*pow($vex_k, 2))));
                $pe_k = $pe_k+(1/sqrt(2*3.14*$vpe_k)*exp((pow(-($testing[$i]['pe']-$data['mean'][0]['perimeterMean']), 2)) / (2*pow($vpe_k, 2))));
                $e_k = $e_k+($ar_k * $ma_k * $mi_k * $ec_k * $co_k * $ex_k * $pe_k * $prob_k);
                // $r_k = "kecimen";
                // array_push($data['equation'], $area, $majorAxis, $minorAxis, $convexArea, $extent, $perimeter, $equation, $result);
            // } else if ($training[$i]['kelas'] == "besni") {
                $ar_b = $ar_b+(1/sqrt(2*3.14*$var_b)*exp((pow(-($testing[$i]['ar']-$data['mean'][1]['areaMean']), 2)) / (2*pow($var_b, 2))));
                $ma_b = $ma_b+(1/sqrt(2*3.14*$vma_b)*exp((pow(-($testing[$i]['ma']-$data['mean'][1]['majorAxisMean']), 2)) / (2*pow($vma_b, 2))));
                $mi_b = $mi_b+(1/sqrt(2*3.14*$vmi_b)*exp((pow(-($testing[$i]['mi']-$data['mean'][1]['minorAxisMean']), 2)) / (2*pow($vmi_b, 2))));
                $ec_b = $ec_b+(1/sqrt(2*3.14*$vec_b)*exp((pow(-($testing[$i]['ec']-$data['mean'][1]['eccentricityMean']), 2)) / (2*pow($vec_b, 2))));
                $co_b = $co_b+(1/sqrt(2*3.14*$vco_b)*exp((pow(-($testing[$i]['co']-$data['mean'][1]['convexAreaMean']), 2)) / (2*pow($vco_b, 2))));
                $ex_b = $ex_b+(1/sqrt(2*3.14*$vex_b)*exp((pow(-($testing[$i]['ex']-$data['mean'][1]['extentMean']), 2)) / (2*pow($vex_b, 2))));
                $pe_b = $pe_b+(1/sqrt(2*3.14*$vpe_b)*exp((pow(-($testing[$i]['pe']-$data['mean'][1]['perimeterMean']), 2)) / (2*pow($vpe_b, 2))));
                $e_b = $e_b+($ar_b * $ma_b * $mi_b * $ec_b * $co_b * $ex_b * $pe_b * $prob_b);
                // $result = "besni";
                // array_push($data['equation'], $area, $majorAxis, $minorAxis, $convexArea, $extent, $perimeter, $equation, $result);
            // }
        }













 ?>

 <tr class="table-secondary">
                                                    <td class="right"><?= $m['kelas']; ?></td>
                                                    <td class="center"><?= $v['var_b']; ?></td>
                                                    <td class="left strong"><?= $v['vma_b']; ?></td>
                                                    <td class="left"><?= $v['vmi_b']; ?></td>
                                                    <td class="right"><?= $v['vec_b']; ?></td>
                                                    <td class="center"><?= $v['vco_b']; ?></td>
                                                    <td class="right"><?= $v['vex_b']; ?></td>
                                                    <td class="right"><?= $v['vpe_b']; ?></td>
                                                </tr>


                                                


                                <td class="left strong"><?= $v->vma_k; ?></td>
                                                    <td class="left"><?= $v->vmi_k; ?></td>
                                                    <td class="right"><?= $v->vec_k; ?></td>
                                                    <td class="center"><?= $v->vco_k; ?></td>
                                                    <td class="right"><?= $v->vex_k; ?></td>
                                                    <td class="right"><?= $v->vpe_k; ?></td>