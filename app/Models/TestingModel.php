<?php

namespace App\Models;

use CodeIgniter\Model;

class TestingModel extends Model
{
   public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    protected $table                = 'data_testing';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['id', 'area', 'majorAxis', 'minorAxis', 'eccentricity', 'convexArea', 'extent', 'perimeter', 'kelas', 'knn', 'nbc'];

/*    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }*/

    public function last() {
      return $this->db->table('data_testing')
        ->select('*')
        ->orderBy("id", "desc")
        ->limit(0,1)
        ->get()->getRow();
   }

}