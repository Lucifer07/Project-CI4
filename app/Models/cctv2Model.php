<?php
namespace App\Models;

use CodeIgniter\Model;

class cctv2Model extends Model
{
    protected $table      = 'cctvnuansa';


    protected $allowedFields=['nama','stok','foto','harga','status','deskripsi'];    
    public function getDataCCTV2($id = False){
     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(['id' =>$id])->first();
     }
    }
    public function getDataRelasiCCTV(){
     $uri = current_url(true);
     $idsegment = $uri->getSegment(4);
    
     $db = \Config\Database::connect();
     $query= $db->query("SELECT * FROM cctvnuansa WHERE id != $idsegment LIMIT 4 ");
     $result = $query->getResultArray();
     return $result;
    }

}
?>