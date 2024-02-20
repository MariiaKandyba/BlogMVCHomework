<?php

class Controller_Main extends Controller
{
    public $model;
    public function __construct()
    {
        parent::__construct();
        require_once "application/core/ImageUploader.php";
        $this->model = new Model_Main();
    }
    function action_index()
    {
        $data = $this->model->get_articles();
        $this->view->generate("main_view.php", "articles_view.php", $data);
    }
    function action_create()
    {
        $this->view->generate("create_view.php", "articles_view.php");
    }
    public function action_store()
    {
        $name = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $photo = ImageUploader::upload($_FILES['photo']);
        $this->model->create_article($name, $content, $photo, $category);
        header('Location:/');
    }

    function action_edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->model->get_article_by_id($id);
            $this->view->generate("edit_view.php", "articles_view.php", $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $photo = ImageUploader::update($_FILES['photo']);
            $this->model->edit_article($_POST['id'], $_POST['title'], $_POST['content'], $photo, $_POST['category']);
            header('Location:/');
        }
    }
    function action_delete($id)
    {
        $this->model->delete_article($id);
        header('Location:/');
    }
}
