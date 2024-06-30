<?php

namespace App\Controllers;
use App\Models\KNNModel;
use App\Models\TestingModel;

class KNNController extends BaseController
{
    public function index() {
        $data['page'] = 'knn';
        $data['active'] = 'knn';
        $data['collapse'] = 'uji';
        
        return $this->render->auth('pages/knn/index', $data);
    }

    public function uji($id = null) {
        $data['active'] = 'knn';
        $data['collapse'] = 'uji';

        helper("custom");
        $model = new KNNModel();
        $test = new TestingModel();

        //untuk ngambil data k yang telah diinputkan
        $k = $this->request->getPost('k');

        //untuk ngambil data testing yang dipilih
        $data['uji'] = $this->main->getTesting()->getwhere(['id'=>$id])->getResult();
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

            $a_row = array(
                'id_testing' => $id_testing,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter
            );
            array_push($testing, $a_row);
        }
        // dd($testing);

        //untuk ngambil data training
        $data['training'] = $this->main->getTraining();
        $training = [];
        foreach ($data['training'] as $item) {
            $id_training = $item->id;
            $area = intval($item->area);
            $majorAxis = floatval($item->majorAxis);
            $minorAxis = floatval($item->minorAxis);
            $eccentricity = floatval($item->eccentricity);
            $convexArea = intval($item->convexArea);
            $extent = floatval($item->extent);
            $perimeter = floatval($item->perimeter);
            $kelas = $item->kelas;

            $b_row = array(
                'id_training' => $id_training,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas
            );
            array_push($training, $b_row);
        }
        // dd($training);

        //menghitung jarak
        $distance = [];
        for ($i=0; $i < count($training); $i++) {
            for ($j=0; $j < count($testing); $j++) {

                $id_testing = $testing[$j]['id_testing'];
                $id_training = $training[$i]['id_training'];

                $t_area = $training[$i]['area'];
                $t_majorAxis = $training[$i]['majorAxis'];
                $t_minorAxis = $training[$i]['minorAxis'];
                $t_eccentricity = $training[$i]['eccentricity'];
                $t_convexArea = $training[$i]['convexArea'];
                $t_extent = $training[$i]['extent'];
                $t_perimeter = $training[$i]['perimeter'];
                $kelas = $training[$i]['kelas'];

                $area = pow(($testing[$j]['area'] - $t_area),2);
                $majorAxis = pow(($testing[$j]['majorAxis'] - $t_majorAxis),2);
                $minorAxis = pow(($testing[$j]['minorAxis'] - $t_minorAxis),2);
                $eccentricity = pow(($testing[$j]['eccentricity'] - $t_eccentricity),2);
                $convexArea = pow(($testing[$j]['convexArea'] - $t_convexArea),2);
                $extent = pow(($testing[$j]['extent'] - $t_extent),2);
                $perimeter = pow(($testing[$j]['perimeter'] - $t_perimeter),2);

                $d_row = [
                    'distance' => sqrt($area + $majorAxis + $minorAxis + $eccentricity + $convexArea + $extent + $perimeter),
                    'area' => $area,
                    'majorAxis' => $majorAxis,
                    'minorAxis' => $minorAxis,
                    'eccentricity' => $eccentricity,
                    'convexArea' => $convexArea,
                    'extent' => $extent,
                    'perimeter' => $perimeter,
                    'kelas' => $kelas,
                    'id_testing' => $id_testing,
                    'id_training' => $id_training,
                    // 'key' => $id_testing
                ];
                array_push($distance, $d_row);
            }
        }
        usort($distance, "SortByDistance"); //diurutkan berdasarkan jarak terdekat
        // dd($distance);

        $knnn = []; $kknnn = [];
        foreach (array_slice($distance, 0, $k) as $row) {
            array_push($knnn, $row);
            array_push($kknnn, $row);

        }

        // dd($distance);
        $kelas = [];
        for ($i=0; $i < $k; $i++) {
            array_push($kelas, $knnn[$i]['kelas']);
        }
        $ck = array_count_values($kelas);
        // dd($ck);

        //untuk menyimpan data
        $b = (isset($ck['besni'])); $c = isset($ck['kecimen']);
        $knn = $this->main->getKNN()->getResultArray();
        for ($i=0; $i < 1 ; $i++) {
            if ($b && $c) {
                $a = ($ck['kecimen'] > $ck['besni']);
                if (!in_array($knnn[$i]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $knnn[$i]['id_testing'],
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => $a ? "kecimen" : "besni"       
                    ));
                    $test = new TestingModel();
                    $test->update($knnn[$i]['id_testing'], array(
                        'knn' => "1"
                    ));
                   array_push($knnn, $a ? "kecimen" : "besni");
                } else {
                    $model->update($knnn[$i]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => $a ? "kecimen" : "besni"
                    ));
                   array_push($knnn, $a ? "kecimen" : "besni");
                }
            } else if (!$b) {
                if (!in_array($knnn[$i]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $knnn[$i]['id_testing'],
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => "kecimen"       
                    ));
                    $test = new TestingModel();
                    $test->update($knnn[$i]['id_testing'], array(
                        'knn' => "1"
                    ));
                    array_push($knnn, "kecimen");
                } else {
                    $model->update($knnn[$i]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => "kecimen"
                    ));
                    array_push($knnn, "kecimen");
                }
            } else if (!$c) {
                if (!in_array($knnn[$i]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $knnn[$i]['id_testing'],
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => "besni"       
                    ));
                    $test = new TestingModel();
                    $test->update($knnn[$i]['id_testing'], array(
                        'knn' => "1"
                    ));
                    array_push($knnn, "besni");
                } else {
                    $model->update($knnn[$i]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $knnn[$i]['id_testing'],
                        'result' => "besni"
                    ));
                    array_push($knnn, "besni");
                }
            }
        }
        // dd($knnn);

            
        $data['distance'] = $distance; $data['k'] = $k;
        $data['set'] = $training; $data['knnn'] = $knnn;
        $data['kknnn'] = $kknnn;

        return $this->render->auth('pages/knn/detail', $data);
    }

    public function ujiAll() {
        $data['active'] = 'knn';
        $data['collapse'] = 'uji';

        helper("custom");
        $model = new KNNModel();
        $test = new TestingModel();
        
        //menginisialisasikan data mana saja yang akan dihitung
        $id_testing = $this->request->getPost('list-id');
        $k = $this->request->getPost('k');
        $listId = explode(",", $id_testing);
        // var_dump($listId);
        // dd($listId);

        $data['uji'] = $this->main->getTesting()->whereIn('id', $listId)->get()->getResultArray();
        // dd($data['uji']);
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

            $a_row = array(
                'id_testing' => $id_testing,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter
            );
            array_push($testing, $a_row);
        }
        // dd($testing);

        $data['training'] = $this->main->getTraining();
        $training = [];
        foreach ($data['training'] as $item) {
            $id_training = $item->id;
            $area = intval($item->area);
            $majorAxis = floatval($item->majorAxis);
            $minorAxis = floatval($item->minorAxis);
            $eccentricity = floatval($item->eccentricity);
            $convexArea = intval($item->convexArea);
            $extent = floatval($item->extent);
            $perimeter = floatval($item->perimeter);
            $kelas = $item->kelas;

            $b_row = array(
                'id_training' => $id_training,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas
            );
            array_push($training, $b_row);
        }
        // dd($training);

        $distance = [];
        for ($i=0; $i < count($training); $i++) {
            for ($j=0; $j < count($testing); $j++) { 
                // $id_training = $training[$i]['id_training'];
                $id_testing = $testing[$j]['id_testing'];

                $t_area = $training[$i]['area'];
                $t_majorAxis = $training[$i]['majorAxis'];
                $t_minorAxis = $training[$i]['minorAxis'];
                $t_eccentricity = $training[$i]['eccentricity'];
                $t_convexArea = $training[$i]['convexArea'];
                $t_extent = $training[$i]['extent'];
                $t_perimeter = $training[$i]['perimeter'];
                $kelas = $training[$i]['kelas'];

                $area = pow(($testing[$j]['area'] - $t_area),2);
                $majorAxis = pow(($testing[$j]['majorAxis'] - $t_majorAxis),2);
                $minorAxis = pow(($testing[$j]['minorAxis'] - $t_minorAxis),2);
                $eccentricity = pow(($testing[$j]['eccentricity'] - $t_eccentricity),2);
                $convexArea = pow(($testing[$j]['convexArea'] - $t_convexArea),2);
                $extent = pow(($testing[$j]['extent'] - $t_extent),2);
                $perimeter = pow(($testing[$j]['perimeter'] - $t_perimeter),2);

                $d_row = [
                    'distance' => sqrt($area + $majorAxis + $minorAxis + $eccentricity + $convexArea + $extent + $perimeter),
                    'area' => $area,
                    'majorAxis' => $majorAxis,
                    'minorAxis' => $minorAxis,
                    'eccentricity' => $eccentricity,
                    'convexArea' => $convexArea,
                    'extent' => $extent,
                    'perimeter' => $perimeter,
                    'kelas' => $kelas,
                    // 'id_training' => $id_training,
                    'id_testing' => $id_testing,
                    'key' => $id_testing
                ];
                array_push($distance, $d_row);
            }
        }

        $result = [];
        foreach ($distance as $key => $row) {
            $result[array_pop($row)][] = $row;
        }
        // dd($result);

        $kunci = [];
        $hasil = [];

        foreach($result as $key => $row){
            usort($result[$key], "SortByDistance");
            $kunci[] = array('key' => $key);
            $hasil[] = array('key' => $key);
        }
        // dd($kunci);
        /*foreach ($result as $i => $v) {
            foreach ($v as $key => $d) {
            var_dump($d);
            }
        }
        dd();*/

        $knnn = [];
        foreach ($result as $key => $row) {
            array_push($knnn, array_slice($row, 0, $k));

        }
        $kknnn = [];
        foreach ($result as $key => $row) {
            array_push($kknnn, $row);

        }
        // dd($kknnn);

        $b = (isset($ck['besni'])); $c = isset($ck['kecimen']);

        $kelas = [];
        if ($b && $c) {
            foreach ($knnn as $key => $row) {
                $ck = array_count_values(array_column($row, 'kelas'))['kecimen'];
                $cb = array_count_values(array_column($row, 'kelas'))['besni'];
                array_push($kelas, array('ck' => $ck, 'cb' => $cb));
            }
        } else if (!$b) {
            foreach ($knnn as $key => $row) {
                $ck = array_count_values(array_column($row, 'kelas'))['kecimen'];
                array_push($kelas, array('ck' => $ck));
            }
        } else if (!$c) {
            foreach ($knnn as $key => $row) {
                $cb = array_count_values(array_column($row, 'kelas'))['besni'];
                array_push($kelas, array('cb' => $cb));
            }
        }
        // dd($kelas);

        $knn = $this->main->getKNN()->getResultArray();
        foreach ($knnn as $dk => $value) {
            if ($b && $c) {
                $a = ($kelas[$dk]['ck'] > $kelas[$dk]['cb']);
                if (!in_array($value[$dk]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $value[$dk]['id_testing'],
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => $a ? "kecimen" : "besni"       
                    ));
                    $test->update($value[$dk]['id_testing'], array(
                        'knn' => "1"
                    ));
                    array_push($hasil[$dk], $a ? "kecimen" : "besni");
                } else {
                    $model->update($value[$dk]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => $a ? "kecimen" : "besni"
                    ));
                   array_push($hasil[$dk], $a ? "kecimen" : "besni");
                }
            } else if (!$b) {
                if (!in_array($value[$dk]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $value[$dk]['id_testing'],
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => "kecimen"      
                    ));
                    $test->update($value[$dk]['id_testing'], array(
                        'knn' => "1"
                    ));
                   array_push($hasil[$dk], "kecimen");
                } else {
                    $model->update($value[$dk]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => "kecimen"
                    ));
                   array_push($hasil[$dk], "kecimen");
                }
            } else if (!$c) {
                if (!in_array($value[$dk]['id_testing'], array_column($knn, 'id_testing'))) {
                    $model->insert(array(
                        'id' => $value[$dk]['id_testing'],
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => "besni"       
                    ));
                    $test->update($value[$dk]['id_testing'], array(
                        'knn' => "1"
                    ));
                   array_push($hasil[$dk], "besni");
                } else {
                    $model->update($value[$dk]['id_testing'], array(
                        'k' => $k,
                        'id_testing' => $value[$dk]['id_testing'],
                        'result' => "besni"
                    ));
                   array_push("besni");
                }
            }
        }
        // dd($knnn);
            
        $data['distance'] = $distance; $data['k'] = $k;
        $data['set'] = $training; $data['kknnn'] = $kknnn;
        $data['kunci'] = $kunci; $data['result'] = $hasil;

        return $this->render->auth('pages/knn/detailAll', $data);
    }


    public function detail() {
        $data['active'] = 'knn';
        $data['collapse'] = 'uji';
    }

    public function detailAll() {
        $data['active'] = 'knn';
        $data['collapse'] = 'uji';

        return $this->render->auth('pages/knn/detailAll', $data);
    }

    
    public function delete($id)
    {
        $knn = new KNNModel();
        $test = new TestingModel();

        $knn->delete($id);
        $test->update($id, array(
                'knn' => null
            ));
        return redirect('knn')->with('success', 'Data Berhasil Dihapus.'); 
    }

}
