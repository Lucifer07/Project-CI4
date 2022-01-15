<?php
namespace App\Models;

use CodeIgniter\Model;

class infoModel extends Model
{
    protected $table      = 'info';
    protected $allowedFields = ['headingprofil','deskripsiprofil','posisi','foto2'];
    public function getInfoAll($id = False){
     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(["id" => $id])->first();
     }
    
    }

 

}
?>