<?php
namespace App\Models;

use CodeIgniter\Model;

class brandModel extends Model
{
    protected $table      = 'brandnuansa';
    protected $allowedFields = ['foto'];
    public function getBrandAll($id=False){

     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(['id'=>$id])->first();
     }
    }
   
    public function getBrandAll2($id=False){
   
     if($id === False){
      return $this->find([5,6,7,8]);
     }else{
      return $this->where(['id'=>$id])->first();
     }
    }
 
}
?>