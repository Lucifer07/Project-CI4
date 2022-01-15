<?php
namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = ['username','password','nama'];
    public function getLogin($username,$password){
     return $this->where(['username' => $username,'password'=>$password])->first();
     }
    public function getLoginAdmin(){
        $db = \Config\Database::connect();
        // $query= $db->query("SELECT * FROM blog WHERE id in ((SELECT max(id) FROM blog),(SELECT max(id) FROM blog)-1,(SELECT max(id) FROM blog)-2)  ");
        $query= $db->query("SELECT username,password from user where username= 'nuansa'");
        $result = $query->getRowArray();
        return $result;
            
    }
}
?>