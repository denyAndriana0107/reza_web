<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\PenggunaModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->userModel->search($keyword);
        } else {
            $user = $this->userModel;
        }

        $data = [
            'title' => "Data User",
            'user' => $user->paginate(3, 'user'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage
        ];

        return view('user/index', $data);
    }
    public function chart()
    {
        $data = [
            'title' => "Dashboard",
            'user' => $this->userModel->findAll()
        ];
        echo view('user/chart', $data);
    }
}
