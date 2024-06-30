<?php

namespace App\Models;

use CodeIgniter\Model;

class TrainingModel extends Model
{
   public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    protected $table                = 'data_training';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['id', 'area', 'majorAxis', 'minorAxis', 'eccentricity', 'convexArea', 'extent', 'perimeter', 'kelas'];

    public function last() {
      return $this->db->table('data_training')
        ->select('*')
        ->orderBy("id", "desc")
        ->limit(0,1)
        ->get()->getRow();
   }

}