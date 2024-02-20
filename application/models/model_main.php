<?php

class Model_Main extends Model
{
    private static $PDO;
    public function __construct()
    {
        require_once "application/core/constant.php";
        Model_Main::$PDO = new PDO("mysql:dbname=" . dbname . ";host=" . dbhost, dbuser, dbpass);
    }
    public function get_articles()
    {
        $select = "SELECT articles.*, categories.name AS category_name FROM articles JOIN categories ON articles.category_id = categories.id";
        $PDOStatement = Model_Main::$PDO->prepare($select);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_category_name($id)
    {
        $select = "SELECT name FROM categories WHERE id = :id";
        $PDOStatement = Model_Main::$PDO->prepare($select);
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        $category = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        return $category['name'];
    }
    public function get_article_by_id($id)
    {
        $select = "SELECT articles.*, categories.name AS 
        category_name FROM articles JOIN categories ON 
        articles.category_id = categories.id WHERE articles.id = ?";
        $PDOStatement = Model_Main::$PDO->prepare($select);
        $PDOStatement->execute([$id]);
        return $PDOStatement->fetch(PDO::FETCH_ASSOC);
    }
    public function create_article($title, $content, $photo, $category)
    {
        $categoryId = $this->getCategoryIdByName($category);

        if ($categoryId !== null) {
            $insert = "INSERT INTO articles (title, content, photo, category_id) VALUES (:title, :content, :photo, :category_id)";
            $PDOStatement = Model_Main::$PDO->prepare($insert);
            $PDOStatement->bindParam(':title', $title);
            $PDOStatement->bindParam(':content', $content);
            $PDOStatement->bindParam(':photo', $photo);
            $PDOStatement->bindParam(':category_id', $categoryId);
            $PDOStatement->execute();
        }
    }
    public function edit_article($id, $title, $content, $photo, $category)
    {

        $categoryId = $this->getCategoryIdByName($category);

        if ($categoryId !== null) {
            $photoString = ($photo == null) ? "" : "photo = :photo,";
            $update  = "UPDATE articles SET " . $photoString . " title = :title, content = :content, category_id = :category_id WHERE id = :id";
            $PDOStatement = Model_Main::$PDO->prepare($update);
            $PDOStatement->bindParam(':id', $id);
            $PDOStatement->bindParam(':title', $title);
            $PDOStatement->bindParam(':content', $content);
            if ($photo != null) {
                $PDOStatement->bindParam(':photo', $photo);
            }
            $PDOStatement->bindParam(':category_id', $categoryId);
            $PDOStatement->execute();
        }
    }

    public function delete_article($id)
    {
        $insert = "delete from articles where id=:id";
        $PDOStatement = Model_Main::$PDO->prepare($insert);
        $PDOStatement->bindParam(':id', $id);
        $PDOStatement->execute();
    }

    private function getCategoryIdByName($categoryName)
    {
        $select = "select id from categories WHERE name = :name";
        $PDOStatement = Model_Main::$PDO->prepare($select);
        $PDOStatement->bindParam(':name', $categoryName);
        $PDOStatement->execute();
        $result = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }
}
