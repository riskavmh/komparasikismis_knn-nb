<?php

namespace App\Controllers;
use App\Models\NBCModel;
use App\Models\TestingModel;

class NBCController extends BaseController
{
    public function index()
    {
        $data['page'] = 'nbc';
        $data['active'] = 'nbc';
        $data['collapse'] = 'uji';
        
        return $this->render->auth('pages/nbc/index', $data);
    }

    public function uji($id = null)
    {
        $model = new NBCModel();
        $test = new TestingModel();
        $data['active'] = 'nbc';
        $data['collapse'] = 'uji';

        $data['uji'] = $this->main->getTesting()->getwhere(['id'=>$id])->getResult();
        // var_dump($data['uji']);
        
        $testing = [];
        foreach ($data['uji'] as $item) {
            $id_testing = $item->id;
            $area = intval($item->area);
            $majorAxis = floatval($item->majorAxis);
            $minorAxis = floatval($item->minorAxis);
            $eccentricity = floatval($item->eccentricity);
            $convexArea = intval($item->convexArea);
            $extent = floatval($item->extent);
            $perimeter = floatval($item->perimeter);

            $x_row = array(
                'id_testing' => $id_testing,
                'ar' => $area,
                'ma' => $majorAxis,
                'mi' => $minorAxis,
                'ec' => $eccentricity,
                'co' => $convexArea,
                'ex' => $extent,
                'pe' => $perimeter,
            );
            array_push($testing, $x_row);
        }
            // var_dump($testing);

        $data['training'] = $this->main->getTraining();
        $kecimen = 0; $besni = 0;

        $training = [];
        foreach ($data['training'] as $item) {
            // $id_training = $item->id;
            $area = intval($item->area);
            $majorAxis = floatval($item->majorAxis);
            $minorAxis = floatval($item->minorAxis);
            $eccentricity = floatval($item->eccentricity);
            $convexArea = intval($item->convexArea);
            $extent = floatval($item->extent);
            $perimeter = floatval($item->perimeter);
            $kelas = $item->kelas;
    
            $t_row = array(
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas
            );
                array_push($training, $t_row);

            if ($kelas == "kecimen") {
                $kecimen = $kecimen+1;
            } else {
                $besni = $besni+1;
            }
        }

        //untuk menghitung class probabilty
        $prob_k = $kecimen / count($data['training']);
        $prob_b = $besni / count($data['training']);

        //menghitung rata-rata -> NBCModel
        $mean = $model->getMean();

        //menghitung standar deviasi
        $var_k = 0; $vma_k = 0; $vmi_k = 0; $vec_k = 0; $vco_k = 0; $vex_k = 0; $vpe_k = 0;
        $var_b = 0; $vma_b = 0; $vmi_b = 0; $vec_b = 0; $vco_b = 0; $vex_b = 0; $vpe_b = 0; 
        for ($i=0; $i < count($training); $i++) {
            if ($training[$i]['kelas'] == "kecimen") {
                $var_k = $var_k+(pow(($training[$i]['area'] - $mean[0]['areaMean']), 2)/($kecimen-1));
                $vma_k = $vma_k+(pow(($training[$i]['majorAxis'] - $mean[0]['majorAxisMean']), 2)/($kecimen-1));
                $vmi_k = $vmi_k+(pow(($training[$i]['minorAxis'] - $mean[0]['minorAxisMean']), 2)/($kecimen-1));
                $vec_k = $vec_k+(pow(($training[$i]['eccentricity'] - $mean[0]['eccentricityMean']), 2)/($kecimen-1));
                $vco_k = $vco_k+(pow(($training[$i]['convexArea'] - $mean[0]['convexAreaMean']), 2)/($kecimen-1));
                $vex_k = $vex_k+(pow(($training[$i]['extent'] - $mean[0]['extentMean']), 2)/($kecimen-1));
                $vpe_k = $vpe_k+(pow(($training[$i]['perimeter'] - $mean[0]['perimeterMean']), 2)/($kecimen-1));
            } else if ($training[$i]['kelas'] == "besni") {
                $var_b = $var_b+(pow(($training[$i]['area'] - $mean[1]['areaMean']), 2)/($besni-1));
                $vma_b = $vma_b+(pow(($training[$i]['majorAxis'] - $mean[1]['majorAxisMean']), 2)/($besni-1));
                $vmi_b = $vmi_b+(pow(($training[$i]['minorAxis'] - $mean[1]['minorAxisMean']), 2)/($besni-1));
                $vec_b = $vec_b+(pow(($training[$i]['eccentricity'] - $mean[1]['eccentricityMean']), 2)/($besni-1));
                $vco_b = $vco_b+(pow(($training[$i]['convexArea'] - $mean[1]['convexAreaMean']), 2)/($besni-1));
                $vex_b = $vex_b+(pow(($training[$i]['extent'] - $mean[1]['extentMean']), 2)/($besni-1));
                $vpe_b = $vpe_b+(pow(($training[$i]['perimeter'] - $mean[1]['perimeterMean']), 2)/($besni-1));
            }
        }
        $variance = [];
        array_push($variance, $var_k, $vma_k, $vmi_k, $vec_k, $vco_k, $vex_k, $vpe_k, $var_b, $vma_b, $vmi_b, $vec_b, $vco_b, $vex_b, $vpe_b);
        //akhir dari menghitung standar deviasi

        //untuk menghitung dengan rumus naive bayes
        $ar_k = 0; $ma_k = 0; $mi_k = 0; $ec_k = 0; $co_k = 0; $ex_k = 0; $pe_k = 0; $e_k = 0;
        $ar_b = 0; $ma_b = 0; $mi_b = 0; $ec_b = 0; $co_b = 0; $ex_b = 0; $pe_b = 0; $e_b = 0;
        for ($i=0; $i < count($testing); $i++) {
            $id_testing = $testing[$i]['id_testing'];
            $ar_k = $ar_k+(1/sqrt(2*3.14*$var_k)*exp((pow(-($testing[$i]['ar']-$mean[0]['areaMean']), 2)) / (2*pow($var_k, 2))));
            $ma_k = $ma_k+(1/sqrt(2*3.14*$vma_k)*exp((pow(-($testing[$i]['ma']-$mean[0]['majorAxisMean']), 2)) / (2*pow($vma_k, 2))));
            $mi_k = $mi_k+(1/sqrt(2*3.14*$vmi_k)*exp((pow(-($testing[$i]['mi']-$mean[0]['minorAxisMean']), 2)) / (2*pow($vmi_k, 2))));
            $ec_k = $ec_k+(1/sqrt(2*3.14*$vec_k)*exp((pow(-($testing[$i]['ec']-$mean[0]['eccentricityMean']), 2)) / (2*pow($vec_k, 2))));
            $co_k = $co_k+(1/sqrt(2*3.14*$vco_k)*exp((pow(-($testing[$i]['co']-$mean[0]['convexAreaMean']), 2)) / (2*pow($vco_k, 2))));
            $ex_k = $ex_k+(1/sqrt(2*3.14*$vex_k)*exp((pow(-($testing[$i]['ex']-$mean[0]['extentMean']), 2)) / (2*pow($vex_k, 2))));
            $pe_k = $pe_k+(1/sqrt(2*3.14*$vpe_k)*exp((pow(-($testing[$i]['pe']-$mean[0]['perimeterMean']), 2)) / (2*pow($vpe_k, 2))));
            $e_k = $e_k+($ar_k * $ma_k * $mi_k * $ec_k * $co_k * $ex_k * $pe_k * $prob_k);
            $ar_b = $ar_b+(1/sqrt(2*3.14*$var_b)*exp((pow(-($testing[$i]['ar']-$mean[1]['areaMean']), 2)) / (2*pow($var_b, 2))));
            $ma_b = $ma_b+(1/sqrt(2*3.14*$vma_b)*exp((pow(-($testing[$i]['ma']-$mean[1]['majorAxisMean']), 2)) / (2*pow($vma_b, 2))));
            $mi_b = $mi_b+(1/sqrt(2*3.14*$vmi_b)*exp((pow(-($testing[$i]['mi']-$mean[1]['minorAxisMean']), 2)) / (2*pow($vmi_b, 2))));
            $ec_b = $ec_b+(1/sqrt(2*3.14*$vec_b)*exp((pow(-($testing[$i]['ec']-$mean[1]['eccentricityMean']), 2)) / (2*pow($vec_b, 2))));
            $co_b = $co_b+(1/sqrt(2*3.14*$vco_b)*exp((pow(-($testing[$i]['co']-$mean[1]['convexAreaMean']), 2)) / (2*pow($vco_b, 2))));
            $ex_b = $ex_b+(1/sqrt(2*3.14*$vex_b)*exp((pow(-($testing[$i]['ex']-$mean[1]['extentMean']), 2)) / (2*pow($vex_b, 2))));
            $pe_b = $pe_b+(1/sqrt(2*3.14*$vpe_b)*exp((pow(-($testing[$i]['pe']-$mean[1]['perimeterMean']), 2)) / (2*pow($vpe_b, 2))));
            $e_b = $e_b+($ar_b * $ma_b * $mi_b * $ec_b * $co_b * $ex_b * $pe_b * $prob_b);
        }
        $equation = [];
        array_push($equation, $id_testing, $ar_k, $ma_k, $mi_k, $ec_k, $co_k, $ex_k, $pe_k, $e_k, $ar_b, $ma_b, $mi_b, $ec_b, $co_b, $ex_b, $pe_b, $e_b);
        // var_dump($equation);
        //akhir dari menghitung menggunakan rumus nb

        $nbc = $this->main->getNBC()->getResultArray();
        for ($i=0; $i < 1 ; $i++) {
        $a = (($equation[8]) > ($equation[16]));
            if (!in_array($equation[0], array_column($nbc, 'id_testing'))) {
                $model->insert(array(
                    'id' => $equation[0],
                    'id_testing' => $equation[0],
                    'result' => ($a) ? "kecimen" : "besni"
                ));
                $test = new TestingModel();
                $test->update($equation[0], array(
                    'nbc' => "1"
                ));
            } else {
                $model->update($equation[0], array(
                    'id_testing' => $equation[0],
                    'result' => ($a) ? "kecimen" : "besni"
                ));
            }

        }

        $data['prob_k'] = $prob_k; $data['prob_b'] = $prob_b;
        $data['mean'] = $mean; $data['variance'] = $variance; $data['equation'] = $equation;
        return $this->render->auth('pages/nbc/detail', $data);
    }

    public function ujiAll()
    {
        $data['active'] = 'nbc';
        $data['collapse'] = 'uji';
        
        $model = new NBCModel();
        $test = new TestingModel();

        $id_testing = $this->request->getPost('list-id');
        $listId = explode(",", $id_testing);
        // dd($id_testing);

        $data['uji'] = $this->main->getTesting()->whereIn('id', $listId)->get()->getResultArray();
        // var_dump($data['uji']);

        $testing = [];
        foreach ($data['uji'] as $item) {
            $id_testing = $item['id'];
            $area = intval($item['area']);
            $majorAxis = floatval($item['majorAxis']);
            $minorAxis = floatval($item['minorAxis']);
            $eccentricity = floatval($item['eccentricity']);
            $convexArea = intval($item['convexArea']);
            $extent = floatval($item['extent']);
            $perimeter = floatval($item['perimeter']);

            $x_row = array(
                'id_testing' => $id_testing,
                'ar' => $area,
                'ma' => $majorAxis,
                'mi' => $minorAxis,
                'ec' => $eccentricity,
                'co' => $convexArea,
                'ex' => $extent,
                'pe' => $perimeter
            );
            array_push($testing, $x_row);
        }
            // dd($testing);

        $data['training'] = $this->main->getTraining();
        $kecimen = 0; $besni = 0;

        $training = [];
        foreach ($data['training'] as $item) {
            $area = intval($item->area);
            $majorAxis = floatval($item->majorAxis);
            $minorAxis = floatval($item->minorAxis);
            $eccentricity = floatval($item->eccentricity);
            $convexArea = intval($item->convexArea);
            $extent = floatval($item->extent);
            $perimeter = floatval($item->perimeter);
            $kelas = $item->kelas;
    
            $t_row = array(
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas
            );
                array_push($training, $t_row);

            if ($kelas == "kecimen") {
                $kecimen = $kecimen+1;
            } else {
                $besni = $besni+1;
            }
        }

        $prob_k = $kecimen / count($data['training']);
        $prob_b = $besni / count($data['training']);

        $mean = $model->getMean();
        // dd($mean);

        $var_k = 0; $vma_k = 0; $vmi_k = 0; $vec_k = 0; $vco_k = 0; $vex_k = 0; $vpe_k = 0;
        $var_b = 0; $vma_b = 0; $vmi_b = 0; $vec_b = 0; $vco_b = 0; $vex_b = 0; $vpe_b = 0; 
        for ($i=0; $i < count($training); $i++) {
            if ($training[$i]['kelas'] == "kecimen") {
                $var_k = $var_k+(pow(($training[$i]['area'] - $mean[0]['areaMean']), 2)/($kecimen-1));
                $vma_k = $vma_k+(pow(($training[$i]['majorAxis'] - $mean[0]['majorAxisMean']), 2)/($kecimen-1));
                $vmi_k = $vmi_k+(pow(($training[$i]['minorAxis'] - $mean[0]['minorAxisMean']), 2)/($kecimen-1));
                $vec_k = $vec_k+(pow(($training[$i]['eccentricity'] - $mean[0]['eccentricityMean']), 2)/($kecimen-1));
                $vco_k = $vco_k+(pow(($training[$i]['convexArea'] - $mean[0]['convexAreaMean']), 2)/($kecimen-1));
                $vex_k = $vex_k+(pow(($training[$i]['extent'] - $mean[0]['extentMean']), 2)/($kecimen-1));
                $vpe_k = $vpe_k+(pow(($training[$i]['perimeter'] - $mean[0]['perimeterMean']), 2)/($kecimen-1));
            } else if ($training[$i]['kelas'] == "besni") {
                $var_b = $var_b+(pow(($training[$i]['area'] - $mean[1]['areaMean']), 2)/($besni-1));
                $vma_b = $vma_b+(pow(($training[$i]['majorAxis'] - $mean[1]['majorAxisMean']), 2)/($besni-1));
                $vmi_b = $vmi_b+(pow(($training[$i]['minorAxis'] - $mean[1]['minorAxisMean']), 2)/($besni-1));
                $vec_b = $vec_b+(pow(($training[$i]['eccentricity'] - $mean[1]['eccentricityMean']), 2)/($besni-1));
                $vco_b = $vco_b+(pow(($training[$i]['convexArea'] - $mean[1]['convexAreaMean']), 2)/($besni-1));
                $vex_b = $vex_b+(pow(($training[$i]['extent'] - $mean[1]['extentMean']), 2)/($besni-1));
                $vpe_b = $vpe_b+(pow(($training[$i]['perimeter'] - $mean[1]['perimeterMean']), 2)/($besni-1));
            }
        }
        $variance = [];
        array_push($variance, $var_k, $vma_k, $vmi_k, $vec_k, $vco_k, $vex_k, $vpe_k, $var_b, $vma_b, $vmi_b, $vec_b, $vco_b, $vex_b, $vpe_b);
        // dd($variance);

        $nbc = $this->main->getNBC()->getResultArray();

        $equation = [];
        for ($i=0; $i < count($testing); $i++) {
            $e_row = [
                'id_testing' => $testing[$i]['id_testing'],
                'ar_k' => $ar_k = 1/sqrt(2*3.14*$var_k)*exp((pow(-($testing[$i]['ar']-$mean[0]['areaMean']), 2)) / (2*pow($var_k, 2))),
                'ma_k' => $ma_k = 1/sqrt(2*3.14*$vma_k)*exp((pow(-($testing[$i]['ma']-$mean[0]['majorAxisMean']), 2)) / (2*pow($vma_k, 2))),
                'mi_k' => $mi_k = 1/sqrt(2*3.14*$vmi_k)*exp((pow(-($testing[$i]['mi']-$mean[0]['minorAxisMean']), 2)) / (2*pow($vmi_k, 2))),
                'ec_k' => $ec_k = 1/sqrt(2*3.14*$vec_k)*exp((pow(-($testing[$i]['ec']-$mean[0]['eccentricityMean']), 2)) / (2*pow($vec_k, 2))),
                'co_k' => $co_k = 1/sqrt(2*3.14*$vco_k)*exp((pow(-($testing[$i]['co']-$mean[0]['convexAreaMean']), 2)) / (2*pow($vco_k, 2))),
                'ex_k' => $ex_k = 1/sqrt(2*3.14*$vex_k)*exp((pow(-($testing[$i]['ex']-$mean[0]['extentMean']), 2)) / (2*pow($vex_k, 2))),
                'pe_k' => $pe_k = 1/sqrt(2*3.14*$vpe_k)*exp((pow(-($testing[$i]['pe']-$mean[0]['perimeterMean']), 2)) / (2*pow($vpe_k, 2))),
                'e_k' => $e_k = $ar_k * $ma_k * $mi_k * $ec_k * $co_k * $ex_k * $pe_k * $prob_k,
                'ar_b' => $ar_b = 1/sqrt(2*3.14*$var_b)*exp((pow(-($testing[$i]['ar']-$mean[1]['areaMean']), 2)) / (2*pow($var_b, 2))),
                'ma_b' => $ma_b = 1/sqrt(2*3.14*$vma_b)*exp((pow(-($testing[$i]['ma']-$mean[1]['majorAxisMean']), 2)) / (2*pow($vma_b, 2))),
                'mi_b' => $mi_b = 1/sqrt(2*3.14*$vmi_b)*exp((pow(-($testing[$i]['mi']-$mean[1]['minorAxisMean']), 2)) / (2*pow($vmi_b, 2))),
                'ec_b' => $ec_b = 1/sqrt(2*3.14*$vec_b)*exp((pow(-($testing[$i]['ec']-$mean[1]['eccentricityMean']), 2)) / (2*pow($vec_b, 2))),
                'co_b' => $co_b = 1/sqrt(2*3.14*$vco_b)*exp((pow(-($testing[$i]['co']-$mean[1]['convexAreaMean']), 2)) / (2*pow($vco_b, 2))),
                'ex_b' => $ex_b = 1/sqrt(2*3.14*$vex_b)*exp((pow(-($testing[$i]['ex']-$mean[1]['extentMean']), 2)) / (2*pow($vex_b, 2))),
                'pe_b' => $pe_b = 1/sqrt(2*3.14*$vpe_b)*exp((pow(-($testing[$i]['pe']-$mean[1]['perimeterMean']), 2)) / (2*pow($vpe_b, 2))),
                'e_b' => $e_b = $ar_b * $ma_b * $mi_b * $ec_b * $co_b * $ex_b * $pe_b * $prob_b
            ];
            array_push($equation, $e_row);
        }
        foreach ($equation as $de => $value) {
            $a = (($value['e_k']) > ($value['e_b']));
            if (!in_array($value['id_testing'], array_column($nbc, 'id_testing'))) {
                $model = new NBCModel();
                $model->insert(array(
                    'id' => $value['id_testing'],
                    'id_testing' => $value['id_testing'],
                    'result' => ($a) ? "kecimen" : "besni"
                ));
                $test = new TestingModel();
                $test->update($value['id_testing'], array(
                    'nbc' => "1"
                ));
            } else {
                $model = new NBCModel();
                $model->update($value['id_testing'], array(
                    'id_testing' => $value['id_testing'],
                    'result' => ($a) ? "kecimen" : "besni"
                ));
            }
        }
        
        $data['prob_k'] = $prob_k; $data['prob_b'] = $prob_b;
        $data['mean'] = $mean; $data['variance'] = $variance;
        $data['equation'] = $equation;

        return $this->render->auth('pages/nbc/detailAll', $data);
    }

    public function detail()
    {
        $data['active'] = 'nbc';
        $data['collapse'] = 'uji';
    }

    public function detailAll() {
        $data['active'] = 'nbc';
        $data['collapse'] = 'uji';

        return $this->render->auth('pages/nbc/detailAll', $data);
    }

    public function delete($id)
    {
        $nbc = new NBCModel();
        $test = new TestingModel();

        $nbc->delete($id);
        $test->update($id, array(
                'nbc' => null
            ));
        return redirect('nbc')->with('success', 'Data Berhasil Dihapus.'); 
    }

}
