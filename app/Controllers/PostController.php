<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    public $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function get_all_post(){
        $datas = $this->postModel->getAllPost();
        $komenModel = new CommentModel();

        foreach ($datas as &$post) {
            $post['total_comment'] = count($komenModel->where('id_post', $post['id_post'])->findAll());
        }

        $data = [
            'datas' => $datas,
        ];

        return view('home', $data);
    }

    public function create_post(){
        $auth = service('authentication');
        $path = 'assets/img-post/';
        $gambar = $this->request->getFile('gambar');
        $name = $gambar->getRandomName();
        if($gambar->move($path, $name)){
            $gambar = base_url($path . $name);
        }
        $this->postModel->createPost([
            'id_user'   => $auth->id(),
            'gambar'    => $gambar,
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);

        return redirect()->to('/');
    }
}
