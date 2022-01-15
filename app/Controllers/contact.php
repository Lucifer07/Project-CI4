<?php
namespace App\Controllers;

use App\Models\infoModel;
use App\Models\kontakModel;
class contact extends BaseController
{
    protected $kontakModel;
    public function __construct(){
     $this->kontakModel = new kontakModel();
    }
    public function index()
    {
       $data = [
        'title' => 'Kontak Perusahaan | Nuansa Inti Persada',
        'kontak' => $this->kontakModel->getDataKontak()

       ];

       return view('contact/index',$data);
    }

    public function contactadmin(){
        $data = [
            'title' => 'Kontak Perusahaan | Nuansa Inti Persada',
            'kontak' => $this->kontakModel->getDataKontak()
           ];
    
           return view('admin/contactadmin',$data);
    }
}
?>