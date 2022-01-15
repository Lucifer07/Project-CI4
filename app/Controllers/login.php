<?php

namespace App\Controllers;
use App\Models\loginModel;
class login extends BaseController
{
    protected $loginModel;
    public function __construct(){
        $this->loginModel = new loginModel();
    }

    public function index(){
        $data = [
            'title' => 'loginAdmin | Nuansa Inti Persada'
        ];
        
        return view('/login',$data);
    }
    public function gantipassword(){
        $data=[
            'title' => "Ganti Password | Nuansa Inti Persada"
           ];
           return view('/gantipassword/index',$data);
   
    }
  public function updatePass(){
    $validation = [
        'pass_baru'=>'required',
        'pass_konfirmasi'=>'required|matches[pass_baru]'
    ];
    if(!$this->validate($validation)){
        session()->setFlashdata('error',"Password baru dengan Konfirmasi Password tidak sesuai !");

        return redirect()->to(base_url('/login/gantipassword'))->withInput();			
    }else{
        if(session()->get('useradmin')){
            $password = password_hash($this->request->getPost("pass_baru"),PASSWORD_BCRYPT);
            $username = session()->get('useradmin');
            $data = [
                'password' => $password
            ];
            $this->loginModel->whereIn('username',[$username])->set(['password'=>$password])->update();
            return redirect()->to('/homeadmin');
        }else{
            $password = password_hash($this->request->getPost("pass_baru"),PASSWORD_BCRYPT);
            $username = session()->get('username');
            $data = [
                'password' => $password
            ];
            $this->loginModel->whereIn('username',[$username])->set(['password'=>$password])->update();
            return redirect()->to('/');
        }
    }
  }
        public function cek_login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek_data = $this->loginModel->where(["username"=>$username])->first();
       
        if($cek_data){
            if($cek_data['username']=='nuansa'){
                if(password_verify($password,$cek_data['password'])){

                    session()->set([
                        'useradmin'=>$cek_data['username'],
                        'user_id'=>$cek_data['id'],
                        'logged_in'=>TRUE,
                        'nama' => $cek_data['nama']
                    ]);
                    return redirect()->to(base_url('/homeadmin'));
                }else{
                    session()->setFlashdata('error',"Username atau Password anda Salah !");
                    return redirect()->back()->WithInput();
                }
            }elseif($cek_data['username']!='nuansa') {
                if(password_verify($password,$cek_data['password'])){

                    session()->set([
                        'username'=>$cek_data['username'],
                        'user_id'=>$cek_data['id'],
                        'logged_in'=>TRUE,
                        'nama' => $cek_data['nama']
                    ]);
                    return redirect()->to(base_url('/'));
                }else{
                    session()->setFlashdata('error',"Username atau Password anda Salah !");
                    return redirect()->back()->WithInput();
                }
            }else{
                session()->setFlashdata('error',"Username atau Password anda Salah !");
                return redirect()->back()->WithInput();
            }

        }else {
            session()->setFlashdata('error',"Mohon masukkan username dan password Anda !");
            return redirect()->back();


        }
        // $loginCheck = $this->loginModel->getLogin($username,$password);
        // $adminLogin = $this->loginModel->getLoginAdmin($password);
        // if($loginCheck or $adminLogin){
        //     if($username==$adminLogin['username'] && $password==$adminLogin['password']){
                
        //         session()->set('useradmin',$adminLogin['username']);
        //         session()->set('password',$adminLogin['username']);
                
        //         return redirect()->to(base_url('/homeadmin'));
        //     }
        //     elseif(($loginCheck['username']==$username) && ($loginCheck['password']==$password)){
        //         session()->set('username',$loginCheck['username']);
        //         session()->set('password',$loginCheck['password']);
        //         return redirect()->to(base_url('/'));
        //     }
        //     else{
        //         return redirect()->back()->with('error','Username atau password tidak Sesuai !');

        //     }
        // }
    
        // else{
        //     return redirect()->back()->with('error','Username tidak Sesuai !');
        // }    
        // $session = session();
        // $model = $this->loginModel;
        // $username = $this->request->getPost('username');
        // $password = $this->request->getPost('password');
        // $data = $model->where('username', $username)->first();
        // if($data){
        //     $pass = $data['password'];
        //     $verify_pass = password_verify($password, $pass);
        //     if($verify_pass){
        //         $ses_data = [
        //             'useradmin'     => $data['username'],
        //             'logged_in'     => TRUE
        //         ];
        //         $session->set($ses_data);
        //         return redirect()->to('/homeadmin');
        //     }else{
        //         $session->setFlashdata('msg', 'Wrong Password');
        //         return redirect()->to('/login');
        //     }
        // }else{
        //     $session->setFlashdata('msg', 'Email not Found');
        //     return redirect()->to('/login');
        // }
        // $db = \Config\Database::connect();
        // $password = $this->request->getPost('password');
        // $query = $db->table('user')->getWhere(['username' => $this->request->getPost('username')]);
        // $hasil = $query->getRow();
            
        // if($hasil){

        //     if(password_verify($password,$hasil->password)){
        //         session()->set('useradmin',$hasil->username);
        //         return redirect()->to(base_url('/homeadmin'));
        //     }else{
        //         return redirect()->back()->with('error','Username atau Password tidak Sesuai !');
        //     }
        // }else{
        //     return redirect()->back()->with('error','Username tidak Sesuai !');

        // }

    }
    
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    

}
?>