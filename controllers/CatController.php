<?php


namespace app\controllers;


use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Controller;
use app\core\db\Database;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;


class CatController extends Controller
{

    public array $products;
    public array $p;
    public  $_db;

    public function __construct()
    {
        $this->products = [];
        $this->p = [];
        $this->_db = Application::$app->db;
        $this->registerMiddleware(new AuthMiddleware(['categories']));
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM `product_categories`";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getSubCategories($id)
    {
        $sql = "SELECT * FROM `product_subCategories` WHERE `categoryId`= ?";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function updateCat($value,$id){
        $sql ="UPDATE `product_categories` SET `cat_name` = ? WHERE `product_categories`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function updateSubCat($value,$id){
        $sql ="UPDATE `product_subCategories` SET `subCategories` = ? WHERE `product_subCategories`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function deleteCat($id){
        $sql ="DELETE FROM `product_categories` WHERE `product_categories`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function deleteSubCat($id){
        $sql ="DELETE FROM `product_subCategories` WHERE `product_subCategories`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function insertCat($cat)
    {
        $sql = "INSERT INTO `product_categories` (`cat_name`, `updated`) VALUES ( ? , current_timestamp())";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$cat]);
        return $stmt;
    }
    public function insertSubCat($cat,$id)
    {
        $sql = "INSERT INTO `product_subCategories` (`categoryId`, `subCategories`, `dateUpdated`) VALUES ( ?, ?, current_timestamp())";
        $stmt =  Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id,$cat]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function categories(Request $request)
    {
        if ($request->getMethod() === 'post'){

            if(isset($_GET['updatecat'])){
                $val = $_GET['updatecat'];
                $id = $_GET['updateid'];
                $run = $this->updateCat($val,$id);
                if ($run){
                    echo 'success';
                }
            }
            if(isset($_GET['delid'])){
                $id = $_GET['delid'];
                $run = $this->deleteCat($id);
                if ($run){
                    return true;
                }else{
                    return false;
                }
            }
            if(isset($_GET['newcat'])){
                $val = $_GET['newcat'];
                $caff = $this->insertCat($val);
                return $caff;
            }
            if(isset($_GET['catid'])){
                $val = $_GET['catid'];
                $caff = $this->getSubCategories($val);
                return json_encode($caff);
            }
            if(isset($_GET['updatesubcat'])){
                $val = $_GET['updatesubcat'];
                $id = $_GET['updatesubid'];
                $caff = $this->updateSubCat($val,$id);
                return $caff;
            }
            if(isset($_GET['newsubcat'])){
                $val = $_GET['newsubcat'];
                $id = $_GET['newsubcatid'];
                $caff = $this->insertSubCat($val,$id);
                return $caff;
            }
            if(isset($_GET['delsubid'])){
                $id = $_GET['delsubid'];
                $run = $this->deleteSubCat($id);
                if ($run){
                    return true;
                }else{
                    return false;
                }
            }
        }
        $this->setLayout('main');
        return $this->render('categories', [
            'categories'=>$this->getCategories(),
        ]);

    }
}