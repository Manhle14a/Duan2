<?php

namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    private string $folder = 'categories.';
    public function __construct()
    {
        $this->category = new Category;
    }
    public function index()
    {
        $data['categories'] = $this->category->Getall();
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function create()
    {
        if (!empty($_POST)) {
            $this->category->insert($_POST['name']);
            header('Location: /admin/categories');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    //Xem chi tiết theo id
    public function show($id)
    {
        $data['category'] = $this->category->getByID($id);
        if (empty($data['categories'])) {
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
        $data['category'] = $this->category->getByID($id);

        if (empty($data['category'])) {
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
        $this->category->deleteByID($id);
    }
}
