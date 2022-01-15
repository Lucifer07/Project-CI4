<?php
namespace App\Models;

use CodeIgniter\Model;

class runtModel extends Model
{
    protected $table      = 'runtnuansa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','harga','stok','deskripsi','foto','created_at','updated_at'];

    public function getDataRunt($id =False){
     if($id === false){
      return $this->findAll();
     }else{
      return $this->where(['id'=>$id])->first();
     }
    }
    public function getDataRelasiRunt(){
        $uri = current_url(true);
        $idsegment = $uri->getSegment(4);
       
        $db = \Config\Database::connect();
        $query= $db->query("SELECT * FROM runtnuansa WHERE id != $idsegment LIMIT 4 ");
        $result = $query->getResultArray();
        return $result;
       }
}
?>