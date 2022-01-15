<?php
namespace App\Controllers;
use App\Models\brosurModel;
class brosur extends BaseController
{
    protected $brosurModel;
    public function __construct(){
     $this->brosurModel = new brosurModel();
    }
    public function index()
    {
        $data = [
         'title' => "Brosur | Nuansa Inti Persada",
         'heading'=> "Brosur Nuansa Inti Persada",
         'brosurnuansa' => $this->brosurModel->getBrosurAll()

        ];
        return view('brosur/index',$data);
    }
    public function download($id){
       
        $models = $this->brosurModel->getBrosurAll($id);
        // echo './img/'.$models['foto']
        return $this->response->download('./img/'.$models['foto'],null);
    }
    // admin brosur
    public function brosuradmin(){
     $data=[
      'title' => 'Halaman Admin Brosur | Nuansa inti Persada',
      'heading' => 'Nuansa. Informasi Brosur',
      'brosurnuansa' => $this->brosurModel->getBrosurAll()
     ];
     return view('/admin/brosuradmin',$data);
    }
    public function tambahBrosur(){
     $data=[
      'title' => 'Tambah Data Brosur | Nuansa inti Persada',
     ];
     return view('/admin/insert/insertbrosur',$data);
    }
    
    public function insertBrosur(){
     
     $filereq = $this->request->getFile('foto');
     $filereq->move('img');
     $namafile= $filereq->getName();
    
    $this->brosurModel->insert([
     'nama' => $this->request->getPost('nama'),
     'deskripsi' => $this->request->getPost('deskripsi'),
     'foto' => $namafile
    ]);
    return redirect()->to('/brosuradmin');
    
    }
   
    public function editBrosur($id){
     $data = [
      'title' => 'Halaman Admin Brosur | Nuansa inti Persada',
      'heading' => 'Nuansa. Informasi Brosur',
      'brosurnuansa' => $this->brosurModel->getBrosurAll($id)
     ];
     return view('admin/edit/editbrosur',$data);
   
    }
    public function updateBrosur($id){


   
    $file = $this->request->getFile('fotoBrosurBaru');

    if($file->getError()==4){
        $namafoto = $this->request->getVar('fotoBrosurLama');
    }else{
        $namafoto = $file->getName();
        $file->move('img');
        unlink('img/'.$this->request->getVar('fotoBrosurLama'));
    }
     $this->brosurModel->save([
      'id' => $id,
      'nama' => $this->request->getPost('namaproduk'),
      'deskripsi' => $this->request->getPost('deskripsi'),
      'foto' => $namafoto
     ]);
     
     return redirect()->to(base_url('/homeadmin'));
    }
    public function deleteBrosur($id){
      $this->brosurModel->delete($id);
      return redirect()->to(base_url('/brosuradmin'));
    
    }
   }
?>