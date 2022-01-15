<?php
namespace App\Controllers;

use App\Models\blogModel;
use App\Models\komentarModel;

class blog extends BaseController
{
    protected $blogModel;
    protected $balasModel;
    protected $komentarModel;
    public function __construct(){
     $this->blogModel = new blogModel();
     $this->komentarModel = new komentarModel();
    }
    public function index()
    {
        $data=[
         'title' => 'Berita | Nuansa Inti Persada',
         'blogModel' => $this->blogModel->paginate(6,'blogModel'),
         'pager' => $this->blogModel->pager
        ];
        return vieW('blog/index',$data);
    }

    public function detail($id){
        $uri = current_url(true);
        $idb = $uri->getSegment(4);
        $komentar = $this->komentarModel->where(['id_blog'=> $idb])->findAll();
        $db = \Config\Database::connect();
        $query= $db->query("SELECT balas.balas, balas.id_komen, komentar.id_user,user.nama from balas inner join komentar on balas.id_komen = komentar.id inner join user on komentar.id_user = user.id ; ");
        $result = $query->getResultArray();
     $data = [
      'title' => "Berita | Nuansa Inti Persada",
      'detailblog' => $this->blogModel->getDataBlog($id),
      'komen' => $komentar,
      'kontenBalas' => $result
     ];
     return view('blog/detailblog',$data);
    }

// blogadmin 
    public function blogadmin(){
    
     $data = [
         'title' => 'Blog | Nuansa Inti Persada',
         'blogModel' => $this->blogModel->paginate(6,'blogModel'),
         'pager' => $this->blogModel->pager
         // 'brosurnuansa' => $this->brosur->getBrosurAll()
     ];
     return view('admin/blogadmin',$data);
 }
// 
 public function editBlog($id){
  $data = [
   'title' => 'Blog | Nuansa Inti Persada',
   'blog' => $this->blogModel->getDataBlog($id),
   // 'brosurnuansa' => $this->brosur->getBrosurAll()
 ];
 return view('admin/edit/editblog',$data);
 }
 public function updateFotoBlog($id){
  $filefoto = $this->request->getFile('fotopekerjaan');
      $namafile = $filefoto->getName();
      $filefoto->move('img');
 $this->blogModel->save([
     'id' => $id,
    'fotopekerjaan' => $namafile,
   ]);
 }

 
 public function updateBlog($id){
     $file = $this->request->getFile('fotopekerjaan');

    if($file->getError()==4){
        $namafoto = $this->request->getVar('fotopekerjaanlama');
    }else{
        $namafoto = $file->getName();
        $file->move('img');
        unlink('img/'.$this->request->getVar('fotopekerjaanlama'));
    }

         $data = [
             'id' => $id,
             'namapekerjaan' => $this->request->getPost('namapekerjaan'),
             'deskripsi' => $this->request->getPost('deskripsi'),
             'fotopekerjaan' => $namafoto
         ];
         $this->blogModel->save($data);
    return redirect()->to(base_url('/blogadmin'));
 }

 public function tambahBlog(){
  $data =[
   'title' => 'Tambah Data Pekerjaan | Nuansa Inti Persada'
 ];
 return view('admin/insert/insertPekerjaan',$data);
 }
 public function insertBlog(){
  $file = $this->request->getFile('fotopekerjaan');
  $namafile = $file->getName();
  $file->move('img');
  $this->blogModel->insert([
    'namapekerjaan' => $this->request->getPost('namapekerjaan'),
    'fotopekerjaan' => $namafile,
    'deskripsi' => $this->request->getPost('deskripsi')
  ]);
  return redirect()->to('/blog/blogadmin');
 }
 
 public function delete($id){
     $blog = $this->blogModel->find($id);
     unlink('img/'.$blog['fotopekerjaan']);
     $this->blogModel->delete($id);
     return redirect()->to('/blog/blogadmin');
 }

public function komentar(){
$data = [
    'title' => 'Komentar Blog | Nuansa Inti Persada',
     

];
return view('/komentar/index',$data);
}


}
?>