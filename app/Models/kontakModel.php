<?php
namespace App\Models;

use CodeIgniter\Model;

class kontakModel extends Model
{
    protected $table      = 'kontak';

    protected $allowedFields = ['nama','nomor','email','alamat','nomor2'];

    public function getDataKontak($id = False){
     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(['id'=>$id])->first();
     }
    }
}
?>