<?php
namespace App\Models;

use CodeIgniter\Model;

class blogModel extends Model
{
    protected $table      = 'blog';
    protected $allowedFields = ['namapekerjaan','fotopekerjaan','deskripsi','created_at','updated_at'];

    protected $returnType = 'array';


    public function getDataBlog($id = False){
        if ($id === False){
            $db = \Config\Database::connect();
            // $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
            $query= $db->query("SELECT blog.id,blog.namapekerjaan,blog.deskripsi,blog.foto,author.author FROM brosurnuansa INNER JOIN author on brosurnuansa.author = author.id ");
            $result = $query->getResultArray();
            return $result;
         }else{
             return $this->where(['id' => $id])->first();
         }

     }
     public function getTanggal($id){
        $db = \Config\Database::connect();
        $query= $db->query("SELECT * FROM blog where id = $id");
        $result = $query->getResultArray();
        return $result;
    }

    public function getNewPekerjaan(){
        
        $db = \Config\Database::connect();
        // $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
        $query= $db->query("SELECT * FROM blog INNER JOIN author on blog.author = author.id ORDER BY blog.id DESC LIMIT 3 ");
        $result = $query->getResultArray();
        return $result;
    }

}
?>