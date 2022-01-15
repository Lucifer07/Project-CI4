<?php

namespace App\Controllers;

use App\Models\homeModel;
use App\Models\brandModel;
use App\Models\blogModel;
class Home extends BaseController
{
    protected $homeModel;
    protected $brandModel;
    public function __construct(){
        $this->homeModel = new homeModel;
        $this->brandModel = new brandModel;
    }
    public function index()
    {
        $data = [
            'title' => 'Home | Nuansa Inti Persada',
            'homeProduk' => $this->homeModel->getDataProduk(),
            'homemodels' => $this->homeModel->getDataPekerjaan(),
            'brand' => $this->brandModel->getBrandAll(),
            'brand2' => $this->brandModel->getBrandAll2()
        ];
        return view('home/index',$data);

    }


    // admin
    public function homeadmin(){
        $data = [
            'title' => 'Home | Nuansa Inti Persada',
            'homeProduk' => $this->homeModel->getDataProduk(),
            'homemodels' => $this->homeModel->getDataPekerjaan(),
            'brand' => $this->brandModel->getBrandAll(),
            'brand2' => $this->brandModel->getBrandAll2()
        ];
        return view('admin/homeadmin',$data);
    }
    // CRUD Layanan
        public function editLayanan($id){
            $data =[
            'title' => 'Home | Nuansa Inti Persada',
            'homeProduk' => $this->homeModel->getDataProduk($id)
        ];
        return view('/admin/edit/editLayanan',$data);
    
        }
        public function updateLayanan($id){
            $this->homeModel->save([
            'id' => $id,
            'namaproduk' => $this->request->getPost('namaproduk'),
            'deskripsi' => $this->request->getPost('deskripsi')
            ]);
            
            return redirect()->to(base_url('/homeadmin'));
            }
    
    
        public function tambahLayanan(){
        $data =[
            'title' => 'Tambah Data Layanan | Nuansa Inti Persada'
        ];
        return view('/admin/insert/insertLayanan',$data);
        }
    
    public function insertLayanan(){
        $simpandata = [
        'namaproduk' => $this->request->getPost('namaproduk'),
        'deskripsi' => $this->request->getPost('deskripsi')
        ];
        $this->homeModel->insert($simpandata);
    
        return redirect()->to(base_url('/homeadmin'));
    
    }
    public function deleteLayanan($id){
        $this->homeModel->delete($id);
        return redirect()->to(base_url('/homeadmin'));
 
    }
    public function tambahBrand(){
        if($this->request->isAJAX()){
            $msg = [
                'data' => view('admin/insert/insertBrand')
            ];
            echo json_encode($msg);
        }
    }
    
   
}
