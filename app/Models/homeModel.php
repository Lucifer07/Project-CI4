<?php
namespace App\Models;

use CodeIgniter\Model;

class homeModel extends Model
{
    protected $table      = 'homeproduk';
    protected $allowedFields = ['namaproduk','deskripsi','created_at','updated_at'];

    protected $useTimestamps = true;
    public function getDataProduk($id = False){
     if($id === False){
      return $this->findAll();
     }else{
      return $this->where(["id" =>$id])->first();
     }
    }

    public function getDataPekerjaan(){
       $db = \Config\Database::connect();
        // $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
        $query= $db->query("SELECT * FROM blog INNER JOIN author on blog.author = author.id ORDER BY blog.id DESC LIMIT 3 ");
        $result = $query->getResultArray();
        return $result;
    }

 
}
?>