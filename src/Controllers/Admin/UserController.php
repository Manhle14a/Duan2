<?php

namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';
    public function __construct()
    {
        $this->user = new User;
    }
    public function index()
    {
        $data['users'] = $this->user->Getall();
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    //Thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $this->user->insert($_POST['name'], $_POST['email'], $_POST['password']);
            header('Location: /admin/users');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    //Xem chi tiết theo id
    public function show($id)
    {
        $data['user'] = $this->user->getByID($id);
        if (empty($data['user'])) {
            die(404);
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    //Cập nhật theo id
    public function update($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    //Xóa theo id
    public function delete($id)
    {
        $this->user->deleteByID($id);
    }
}
