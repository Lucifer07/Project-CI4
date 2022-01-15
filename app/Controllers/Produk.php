<?php

namespace App\Controllers;
use App\Models\cctv2Model;
use App\Models\cctv5Model;
class Produk extends BaseController
{

    protected $cctv2Model;
    protected $cctv5Model;
    public function __construct()
    {
        $this->cctv2Model = new cctv2Model;
        $this->cctv5Model = new cctv5Model;
    }
    public function CCTV2Nuansa(){
        $data =[
            'title' => "Produk CCTV 2 MP | Nuansa Inti Persada",
            'cctv2Model' => $this->cctv2Model->getDataCCTV2()
        ];
        return view('produk/cctv2Nuansa/cctv2nuansa',$data);
    }
    public function detailcctv2($id){
        $data =[
            'title' => "Produk CCTV 2 MP | Nuansa Inti Persada",
            'produk' => $this->cctv2Model->getDataCCTV2($id),
            'cctv2Model' => $this->cctv2Model->getDataRelasiCCTV()
        ];
        return view('produk/cctv2Nuansa/detailcctv2',$data);
    }
    public function CCTV5Nuansa(){
        $data = [
            'title' => "Produk CCTV 5 Nuansa | Nuansa Inti Persada",
            'cctv5Model' => $this->cctv5Model->getDataCCTV5()
        ];
        return view('produk/cctv5Nuansa/cctv5Nuansa',$data);

    }
    public function detailcctv5($id){
        $data =[
            'title' => "Produk CCTV 5 MP | Nuansa Inti Persada",
            'produk' => $this->cctv5Model->getDataCCTV5($id),
            'cctv5Model' => $this->cctv5Model->getDataRelasiCCTV5()
        ];
        return view('produk/cctv5Nuansa/detailcctv5',$data);
    }


    // Ranah Admin

    public function CCTV2NuansaAdmin(){
        $data =[
            'title' => "Produk CCTV 2 MP | Nuansa Inti Persada",
            'cctv2Model' => $this->cctv2Model->getDataCCTV2()
        ];
        return view('admin/produk/cctv2nuansa',$data);
    }

    public function deletecctv($id){
        $this->cctv2Model->delete($id);
        // unlink('img/'.$this->request->getVar('fotocctv'));
    }

    public function tambahcctv2(){
        $data = [
            'title' => 'Tambah Data CCTV 2 MP | Nuansa Inti Persada'
            
        ];
        return view('admin/insert/insertcctv',$data);
    }


    public function insertcctv2(){
        
        $file = $this->request->getFile('foto');
        $namafoto = $file->getName();
        $file->move('img');    
        $data = [
            'nama'=>$this->request->getPost('nama'),
            'foto'=>$namafoto,
            'stok'=>$this->request->getPost('stok'),
            'harga'=>$this->request->getPost('harga'),
            'deskripsi'=>$this->request->getPost('deskripsi')
        ];
        $this->cctv2Model->insert($data);
        return redirect()->to('/Produk/CCTV2NuansaAdmin');
    }


    public function editcctv2($id){

     $data=[
      'title' => "CCTV Shop Admin | Nuansa Inti Persada",
      'produkcctv' => $this->cctv2Model->getDataCCTV2($id)
     ];
     return view('admin/edit/shopadmincctv',$data);
    }

    public function updatecctv2($id){
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
            'nama'=>$this->request->getPost('nama'),
            'foto'=>$namafoto,
            'stok'=>$this->request->getPost('stok'),
            'harga'=>$this->request->getPost('harga'),
            'status'=>$this->request->getPost('status'),
            'deskripsi'=>$this->request->getPost('deskripsi')
        ];
        $this->cctv2Model->save($data);
        return redirect()->to(base_url('/Produk/CCTV2NuansaAdmin'));
    } 


    public function CCTV5NuansaAdmin(){
        $data= [
            'title' => 'CCTV 5 MP | Nuansa Inti Persada',
            'cctv5mp' => $this->cctv5Model->getDataCCTV5()
        ];
        return view('admin/Produk/cctv5nuansa',$data);
    }

    public function tambahcctv5(){
        $data = [
            'title' => 'Tambah Data CCTV 5 MP | Nuansa Inti Persada'
        ];
        return view('admin/insert/insertcctv5',$data);
    }

    public function editcctv5($id){
    $data=[
        'title' => "CCTV Shop Admin | Nuansa Inti Persada",
        'produkcctv' => $this->cctv5Model->getDataCCTV5($id)
    ];
    return view('admin/edit/editCctv5',$data);
    }
    public function insertcctv5(){
        $file = $this->request->getFile('foto');
        $namafoto = $file->getName();
        $file->move('img');    
        $data = [
            'nama'=>$this->request->getPost('nama'),
            'foto'=>$namafoto,
            'stok'=>$this->request->getPost('stok'),
            'harga'=>$this->request->getPost('harga'),
            'deskripsi'=>$this->request->getPost('deskripsi')
        ];
        $this->cctv2Model->insert($data);
        return redirect()->to('/Produk/CCTV2NuansaAdmin');
    }
    public function updatecctv5($id){
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
            'nama'=>$this->request->getPost('nama'),
            'foto'=>$namafoto,
            'stok'=>$this->request->getPost('stok'),
            'harga'=>$this->request->getPost('harga'),
            'status'=>$this->request->getPost('status'),
            'deskripsi'=>$this->request->getPost('deskripsi')
        ];
        $this->cctv5Model->save($data);
        return redirect()->to(base_url('/Produk/CCTV5NuansaAdmin'));
    } 
    public function deletecctv5($id){
        $this->cctv5Model->delete($id);
        // unlink('img/'.$this->request->getVar('fotocctv'));
    }
}
?>