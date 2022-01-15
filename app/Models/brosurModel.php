<?php

namespace App\Models;

use CodeIgniter\Model;

class brosurModel extends Model
{
    protected $table = "brosurnuansa";
    protected $useTimestamps = True;
    protected $allowedFields = ['nama','deskripsi','foto','author'];
    public function getBrosurAll($id = False){
     if ($id === False){
        $db = \Config\Database::connect();
        // $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
        $query= $db->query("SELECT brosurnuansa.id,brosurnuansa.nama,brosurnuansa.deskripsi,brosurnuansa.foto,author.author FROM brosurnuansa INNER JOIN author on brosurnuansa.author = author.id ");
        $result = $query->getResultArray();
        return $result;
     }else{
         return $this->where(['id' => $id])->first();
     }
 }
  
}