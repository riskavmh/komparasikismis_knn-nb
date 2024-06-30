<?php

namespace App\Controllers;
use App\Models\TestingModel;

class TestingController extends BaseController
{
    public function index()
    {
            $data['page'] = 'testing';
            $data['active'] = 'testing';
            $data['collapse'] = '';
            return $this->render->auth('pages/testing/index', $data);
    }

    public function add()
    {
        $data['active'] = 'testing';
        $data['collapse'] = '';
        $data['id'] = $this->generate_id();

        return $this->render->auth('pages/testing/add', $data);
    }

    public function create()
    {
        $model = new TestingModel();
        
        $id = $this->request->getPost('id');
        $area = $this->request->getPost('area');
        $majorAxis = $this->request->getPost('majorAxis');
        $minorAxis = $this->request->getPost('minorAxis');
        $eccentricity = $this->request->getPost('eccentricity');
        $convexArea = $this->request->getPost('convexArea');
        $extent = $this->request->getPost('extent');
        $perimeter = $this->request->getPost('perimeter');

        // dd($id);

        $model->insert(array(
                'id' => $id,
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter));

        return redirect('testing')->with('success', 'Data Berhasil Ditambahkan.'); 
    }

    public function edit($id)
    {
        $testing = new TestingModel();
        $data['edit'] = $testing->getWhere(['id' => $id])->getResult();

        $data['active'] = 'testing';
        $data['collapse'] = '';
        return $this->render->auth('pages/testing/edit', $data);
    }

    public function update($id = null)
    {
        $model = new TestingModel();
        
        $area = $this->request->getPost('area');
        $majorAxis = $this->request->getPost('majorAxis');
        $minorAxis = $this->request->getPost('minorAxis');
        $eccentricity = $this->request->getPost('eccentricity');
        $convexArea = $this->request->getPost('convexArea');
        $extent = $this->request->getPost('extent');
        $perimeter = $this->request->getPost('perimeter');

        // dd($id);
        
        $model->update($id, array(
                'area' => $area,
                'majorAxis' => $majorAxis,
                'minorAxis' => $minorAxis,
                'eccentricity' => $eccentricity,
                'convexArea' => $convexArea,
                'extent' => $extent,
                'perimeter' => $perimeter));

        return redirect('testing')->with('success', 'Data Berhasil Diubah.'); 
    }

    public function delete($id)
    {
        $testing = new TestingModel();

        $testing->delete($id);
        return redirect('testing')->with('success', 'Data Berhasil Dihapus.'); 
    }

    public function generate_id()
    {
        $model = new TestingModel();
        $last = $model->last();
        if(!empty($last)) {
            $number = intval($last->id)+1;
        }
        return $number;
    }

}
