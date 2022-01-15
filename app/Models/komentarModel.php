<?php


namespace App\Models;

use CodeIgniter\Model;

class komentarModel extends Model
{
    protected $table = 'komentar';


    protected $allowedFields = ['komentar','id_blog','id_user','created_at'];

    public function getKomen($id = False){
     if ($id === False){
        return $this->where(['id' => $id])->first();
      }else{
         
          $db = \Config\Database::Connect();
          $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
          $result = $query->getResultArray();
          return $result;
      }
      
  }
 
 }
?>