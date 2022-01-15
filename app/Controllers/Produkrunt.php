<?php

namespace App\Controllers;
use App\Models\runtModel;
use App\Models\runt2Model;
class Produkrunt extends BaseController
{
    protected $runtModel;
    protected $runt2Model;
    public function __construct()
    {
     $this->runtModel= new runtModel();
     $this->runt2Model= new runtModel();
    }
    public function runt(){
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produkrunt' => $this->runtModel->getDataRunt()

    ];
    return view('produk/runt1nuansa/index',$data);
    }
    public function detailrunt($id){
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produk' => $this->runtModel->getDataRunt($id),
      'runtModelR' => $this->runtModel->getDataRelasiRunt()

    ];

    
    return view('produk/runt1nuansa/detailrunt',$data);
    }

    public function detailrunt2($id){
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produk' => $this->runtModel->getDataRunt($id),
      'runtModelR' => $this->runtModel->getDataRelasiRunt()

    ];

    
    return view('produk/runt2nuansa/detailrunt2',$data);
    }
    public function runt2sisi(){
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produkrunt' => $this->runt2Model->getDataRunt()

    ];
    return view('produk/runt2nuansa/index',$data);
    }
    public function runtAdmin()
    {
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produkrunt' => $this->runtModel->getDataRunt()

    ];
    return view('admin/produk/runtnuansa',$data);
    }

    public function tambahrunt(){
     $data=[
      'title' => "Running Text Shop Admin | Nuansa Inti Persada"
     ];
     return view('admin/insert/insertrunt',$data);
    }

    public function insertrunt()
    {
        $file = $this->request->getFile('foto');
        $namafoto = $file->getName();
        $file->move('img'); 
        $this->runtModel->insert([
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'ukuran' => $this->request->getPost('ukuran'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $namafoto
        ]);
        return redirect()->to('/Produkrunt/runtAdmin');
    }
    public function editrunt($id){
     $data=[
         'title' => "Update Produk Running Text 1 Sisi | Nuansa Inti Persada",
         'produkrunt' => $this->runtModel->getDataRunt($id),
        ];
        return view('admin/edit/shopadminrunt',$data);
 }
    public function updateRunt($id){
     $file = $this->request->getFile('foto');
     if($file->getError()==4){
         $namafoto = $this->request->getVar('gambarproduklama');
     }else{
         $namafoto = $file->getName();
         $file->move('img');
         unlink('img/'.$this->request->getVar('gambarproduklama'));
     }
     $data = [
         'id' => $id,
         'nama' => $this->request->getPost('nama'),
         'harga' => $this->request->getPost('harga'),
         'ukuran' => $this->request->getPost('ukuran'),
         'stok' => $this->request->getPost('stok'),
         'status' => $this->request->getPost('status'),
         'foto' => $namafoto,
         'deskripsi' => $this->request->getPost('deskripsi')
     ];
     $this->runtModel->save($data);
     return redirect()->to(base_url('/Produkrunt/runtAdmin'));
 }
 public function deleterunt($id){
  $this->runtModel->delete($id);
 }
// Produk Running Text 2 Sisi
 public function runt2Admin()
    {
     $data=[
      'title'=>'Running Text 1 Sisi | Nuansa Inti Persada',
      'produkrunt' => $this->runt2Model->getDataRunt()

    ];
    return view('admin/produk/runt2nuansa',$data);
    }

    public function tambahrunt2(){
     $data=[
      'title' => "Running Text Shop Admin | Nuansa Inti Persada"
     ];
     return view('admin/insert/insertrunt2',$data);
    }

    public function insertrunt2()
    {
        $file = $this->request->getFile('foto');
        $namafoto = $file->getName();
        $file->move('img'); 
        $this->runt2Model->insert([
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'ukuran' => $this->request->getPost('ukuran'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $namafoto
        ]);
        return redirect()->to('/Produkrunt/runt2Admin');
    }
    public function editrunt2($id){
     $data=[
         'title' => "Update Produk Running Text 1 Sisi | Nuansa Inti Persada",
         'produkrunt' => $this->runt2Model->getDataRunt($id),
        ];
        return view('admin/edit/editRunt2',$data);
 }
    public function updateRunt2($id){
     $file = $this->request->getFile('foto');
     if($file->getError()==4){
         $namafoto = $this->request->getVar('gambarproduklama');
     }else{
         $namafoto = $file->getName();
         $file->move('img');
         unlink('img/'.$this->request->getVar('gambarproduklama'));
     }
     $data = [
         'id' => $id,
         'nama' => $this->request->getPost('nama'),
         'harga' => $this->request->getPost('harga'),
         'ukuran' => $this->request->getPost('ukuran'),
         'stok' => $this->request->getPost('stok'),
         'status' => $this->request->getPost('status'),
         'foto' => $namafoto,
         'deskripsi' => $this->request->getPost('deskripsi')
     ];
     $this->runt2Model->save($data);
     return redirect()->to(base_url('/Produkrunt/runt2Admin'));
 }
 public function deleterunt2($id){
  $this->runt2Model->delete($id);
 }

}
?>