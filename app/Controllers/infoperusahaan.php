<?php
namespace App\Controllers;

use App\Models\infoModel;
class infoperusahaan extends BaseController
{
    protected $infoModel;
    public function __construct(){
     $this->infoModel = new infoModel;
    }
    public function index()
    {
       $data = [
        'title' => 'Info Perusahaan | Nuansa Inti Persada',
        'info' => $this->infoModel->getInfoAll() 
       ];

       return view('info/index',$data);
    }


    // Admin Info 
    public function infoadmin()
    {
     $data = [
      'title' => 'Info Perusahaan | Nuansa Inti Persada',
      'info' => $this->infoModel->getInfoAll()
        ];

    return view('admin/infoadmin',$data);    
    }
    public function tambahData(){
        $data = [
            'title' => 'Info Perusahaan | Nuansa Inti Persada',
            'info' => $this->infoModel->getInfoAll()
              ];
      
        return view('admin/insert/insertinfo',$data);  
    }
    public function insertInfo(){
        $file = $this->request->getFile('foto2');
        $namafoto = $file->getName();
        $file->move('img');
        $selected = $this->request->getPost('posisi');
        $this->infoModel->insert([
            'headingprofil' => $this->request->getPost('headingprofil'),
            'deskripsiprofil' => $this->request->getPost('deskripsiprofil'),
            'posisi' => $selected,
            'foto2' => $namafoto
        ]);
      
        return redirect()->to(base_url('infoadmin'));  
    }
 
    public function editinfo($id){
        $data = [
            'title' => 'Info Perusahaan | Nuansa Inti Persada',
            'info' => $this->infoModel->getInfoAll($id)
              ];
        return view('admin/edit/editinfo',$data); 
    }

    public function deleteInfo($id){
        $this->infoModel->delete($id);
        return redirect()->to(base_url('/infoadmin'));
    }
    public function tambahInfo(){
        $data =[
            'title' => 'Tambah Data Info Perusahaan | Nuansa Inti Persada'
        ];
        return view('admin/insert/insertinfo',$data);
    }

    public function updateInfo($id){
        $file = $this->request->getFile('gambarinfo');
        if($file->getError()==4){
            $namafoto = $this->request->getVar('gambarlama');
        }else{
            $namafoto = $file->getName();
            $file->move('img');
            // unlink('img/'.$this->request->getVar('gambarlama'));
        }
        $data = [
            'id' => $id,
            'headingprofil' => $this->request->getPost('headingprofil'),
            'deskripsiprofil' => $this->request->getPost('deskripsi'),
            'foto2' => $namafoto
        ];
        $this->infoModel->save($data);
        return redirect()->to(base_url('/infoadmin'));
    }
}
?>