<?php
namespace App\Models;

use CodeIgniter\Model;

class cctv5Model extends Model
{
    protected $table      = 'cctv5nuansa';
   



    protected $allowedFields = ['nama','foto','stok','harga','status','deskripsi'];
    public function getDataCCTV5($id = False){
     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(['id' =>$id])->first();
     }
    }
    public function getDataRelasiCCTV5(){
     $uri = current_url(true);
     $idsegment = $uri->getSegment(4);
    
     $db = \Config\Database::connect();
     $query= $db->query("SELECT * FROM cctv5nuansa WHERE id != $idsegment LIMIT 4 ");
     $result = $query->getResultArray();
     return $result;
    }
}
?>