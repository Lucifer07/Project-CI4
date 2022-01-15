<?php
namespace App\Controllers;

use App\Models\brandModel;
class brand extends BaseController
{
  protected $brandModel;
    public function __construct()
    {
     $this->brandModel = new brandModel();
    }
    
    public function index()
    {
     $data = [
      'title' => "Pengelolaan Brand | Nuansa Inti Persada",
      'brands' => $this->brandModel->getBrandAll()

     ];
     return view('admin/brandAdmin',$data);
    }
    
  
    
    public function tambahBrand()
    {
     $data = [
      'title' => "Pengelolaan Brand | Nuansa Inti Persada",

     ];
     return view('admin/insert/insertBrand',$data);
    }
    
    public function insertBrand()
    {
    
     $file = $this->request->getFile('gambarbrand');
     $namafile = $file->getName();
     $file->move('img');
     $data = [
      'foto' => $namafile
     ];
     $this->brandModel->insert($data);
     return redirect()->to(base_url('/homeadmin'));
    }
    
    public function editBrand($id)
    {
     
     $data = [
      'title' => "Pengelolaan Brand | Nuansa Inti Persada",
      'brands' => $this->brandModel->getBrandAll($id)

     ];
     return view('admin/edit/editBrand',$data);
    }
    
    public function update($id)
    {
     $file = $this->request->getFile('gambarbrand');

     if($file->getError()==4){
      $namabrand = $this->request->getVar('gambarbrandlama');
     }else{
      $namabrand = $file->getName();
      $file->move('img');
      unlink('img/'.$this->request->getVar('gambarbrandlama'));
     }
     $data = [
      'id' =>$id,
      'foto' => $namabrand
     ];
     $this->brandModel->save($data);
     return redirect()->to(base_url('/homeadmin'));
    }
    
    // public function remove($id = null)
    // {
    // }
    
    public function delete($id)
    {
     $this->brandModel->delete($id);
    }
}
?>