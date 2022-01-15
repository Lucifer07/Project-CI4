<?php
namespace App\Models;

use CodeIgniter\Model;

class balasModel extends Model
{
    protected $table      = 'balas';

    protected $allowedFields = ['balas','id_user','id_komen','created_at','updated_at'];

    protected $useTimestamps = false;
  
  
}
?>