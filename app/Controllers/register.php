<?php

namespace App\Controllers;
use App\Models\loginModel;
class register extends BaseController
{
    protected $loginModel;

    public function __construct(){
     $this->loginModel = new loginModel();
    }
    public function index()
    {
        $data=[
         'title' => "Registrasi Akun | Nuansa Inti Persada"
        ];
        return view('/register/index',$data);

    }
   public function insert(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama_lengkap'];

    $datasimpan = [
     'username' => $username,
     'password' => password_hash($password,PASSWORD_DEFAULT),
     'nama' => $nama
    ];

    $this->loginModel->insert($datasimpan);
    return redirect()->to(base_url('/login'));
   }

public function registerData(){
    if (!$this->validate([
        'username' => [
            'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 20 Karakter',
                'is_unique' => 'Username sudah digunakan sebelumnya'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[4]|max_length[50]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 50 Karakter',
            ]
        ],
        'konfirmasipass' => [
            'rules' => 'matches[password]',
            'errors' => [
                'matches' => 'Konfirmasi Password tidak sesuai dengan password',
            ]
        ],
        'nama_lengkap' => [
            'rules' => 'required|min_length[4]|max_length[100]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
            ]
        ],
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }
    $users = new loginModel();
    $users->insert([
        'username' => $this->request->getVar('username'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        'nama' => $this->request->getVar('nama_lengkap')
    ]);
    return redirect()->to('/login');
}
}
?>