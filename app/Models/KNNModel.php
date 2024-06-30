<?php

namespace App\Models;

use CodeIgniter\Model;

class KNNModel extends Model
{
   public function __construct() {
     $this->db = \Config\Database::connect();
   }

   protected $table                = 'uji_knn';
   protected $primaryKey           = 'id';
   protected $useAutoIncrement     = true;
   protected $allowedFields        = ['id', 'id_testing', 'k', 'result'];

   function post_uji($result = array())
   {
      $total_array = count($result);

      if($total_array != 0)
      {
          $this->db->insert_batch('uji_knn', $result);
      }
   }
}