<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentController extends BaseController
{
    public $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function get_all_comment(){
        $dta = [
            'comments' => $this->commentModel->getAllComment(),
        ];

        return view('home', $dta);
    }

    public function create_comment(){
        $auth = service('authentication');
        $this->commentModel->createComment([
            'id_user'   => $auth->id(),
            'id_post'   => $this->request->getVar('id_post'),
            'comment'   => $this->request->getVar('comment'),
        ]);

        return redirect()->to('/');
    }
}
