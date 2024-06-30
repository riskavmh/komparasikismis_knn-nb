<?php

namespace App\Controllers;
use App\Models\TrainingModel;

class TrainingController extends BaseController
{
    public function index()
    {
            $data['page'] = 'training';
            $data['active'] = 'training';
            $data['collapse'] = '';
            return $this->render->auth('pages/training/index', $data);
    }

    public function add()
    {
        $data['active'] = 'training';
        $data['collapse'] = '';
        $data['id'] = $this->generate_id();

        return $this->render->auth('pages/training/add', $data);
    }

    public function create()
    {
        $model = new TrainingModel();
        
        $id = $this->request->getPost('id');
        $area = $this->request->getPost('area');
        $majorAxis = $this->request->getPost('majorAxis');
        $minorAxis = $this->request->getPost('minorAxis');
        $eccentricity = $this->request->getPost('eccentricity');
        $convexArea = $this->request->getPost('convexArea');
        $extent = $this->request->getPost('extent');
        $perimeter = $this->request->getPost('perimeter');
        $kelas = $this->request->getPost('kelas');

        $model->insert(array(
                'id' => $id,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas));

        return redirect('training')->with('success', 'Data Berhasil Ditambahkan.'); 
    }

    public function edit($id)
    {
        $training = new TrainingModel();
        $data['edit'] = $training->getWhere(['id' => $id])->getResult();

        $data['active'] = 'training';
        $data['collapse'] = '';
        return $this->render->auth('pages/training/edit', $data);
    }

    public function update($id = null)
    {
        $model = new TrainingModel();
        
        $area = $this->request->getPost('area');
        $majorAxis = $this->request->getPost('majorAxis');
        $minorAxis = $this->request->getPost('minorAxis');
        $eccentricity = $this->request->getPost('eccentricity');
        $convexArea = $this->request->getPost('convexArea');
        $extent = $this->request->getPost('extent');
        $perimeter = $this->request->getPost('perimeter');
        $kelas = $this->request->getPost('kelas');

        $model->update($id, array(
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter,
                'kelas' => $kelas));

        return redirect('training')->with('success', 'Data Berhasil Diubah.'); 
    }

    public function delete($id)
    {
        $training = new TrainingModel();

        $training->delete($id);
        return redirect('training')->with('success', 'Data Berhasil Dihapus.'); 
    }

    public function generate_id()
    {
        $model = new TrainingModel();
        $last = $model->last();
        if(!empty($last)) {
            $number = intval($last->id)+1;
        }
        return $number;
    }

}
