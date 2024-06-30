<?php

namespace App\Models;

use CodeIgniter\Model;

class NBCModel extends Model
{
   public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    protected $table                = 'uji_nbc';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['id', 'id_testing', 'result'];

    public function getMean()
    {
        return $this->db->table('data_training')
        ->select('avg(area) as areaMean, avg(majorAxis) as majorAxisMean, avg(minorAxis) as minorAxisMean, avg(eccentricity) as eccentricityMean, avg(convexArea) as convexAreaMean, avg(extent) as extentMean, avg(perimeter) as perimeterMean, kelas')
        ->groupBy('kelas')
        ->get()->getResultArray();

    }

    function post_uji($result = array())
   {
      $total_array = count($result);

      if($total_array != 0)
      {
          $this->db->insert_batch('uji_nbc', $result);
      }
   }
}