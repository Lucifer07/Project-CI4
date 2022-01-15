<?php

namespace App\Controllers;
use App\Models\komentarModel;
use App\Models\balasModel;
class komentar extends BaseController
{
    protected $komentarModel;
    protected $balasModel;

    public function __construct()
    {
     $this->komentarModel= new komentarModel();
     $this->balasModel= new balasModel();
    }
    public function index()
    {
        $data =[
         'title' => 'Komentar | Nuansa Inti Persada',
        ];
          return view('admin/komentar/index.php',$data);

    }
    public function kirim($id){
     $uri = current_url(true);
     $idblog = $id;

     $user = session()->get('user_id');
     if($user == null){
      session()->setFlashdata('success','Mohon Login Terlebih Dahulu');
      return redirect()->to(base_url('/login'));
     }
     $data =[
      'komentar' => $this->request->getPost('komentar'),
      'id_user' => $user,
      'id_blog' => $idblog
     ];
     $this->komentarModel->insert($data);
     if(session()->get('useradmin')){

      return redirect()->back();
     }elseif(session()->get('username')){
      return redirect()->back();

     }
    }
    public function viewBalas(){

 
     $data =[
      'title'=>'Balas | Nuansa Inti Persada',
     ];
     return view('admin/komentar/balas',$data);
    }


    public function balas($id){
     
     $uri = current_url(true);
     $idk = $id;
     $user = session()->get('user_id');
     if($user == null){
      return redirect()->to(base_url('/login'));
     }
     $data =[
      'balas' => $this->request->getPost('balas'),
      'id_user' => $user,
      'id_komen' => $idk
     ];
     $this->balasModel->insert($data);
     if(session()->get('useradmin')){

      return redirect()->back();
     }elseif(session()->get('username')){
      return redirect()->back();

     }
    }
   

 //    public function create(){
 //     $id_barang = $this->request->uri->getSegment(3);
 //     $model = new \App\Models\KomentarModel();

 //     if($this->request->getPost())
 //     {
 //         $data = $this->request->getPost();
 //         $this->validation->run($data, 'komentar');
 //         $errors = $this->validation->getErrors();

 //         if(!$errors)
 //         {
 //             $komentarEntity = new \App\Entities\Komentar();

 //             $komentarEntity->fill($data);
 //             $komentarEntity->created_by = $this->session->get('id');
 //             $komentarEntity->created_date = date("Y-m-d H:i:s");

 //             $model->save($komentarEntity);

 //             $segments = ['etalase','beli', $id_barang];

 //             return redirect()->to(site_url($segments));
 //         }
 //     }

 //     return view('komentar/create',[
 //         'id_barang' => $id_barang,
 //         'model' => $model,
 //     ]);
 // }

}
?>