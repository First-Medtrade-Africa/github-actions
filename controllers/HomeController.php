<?php


namespace app\controllers;



use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;


class HomeController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile','dashboard','home']));
    }

    protected function getProducts()
    {
        $sql = "SELECT products.*, vendors.storeName, vendors.`vendors_city` FROM products LEFT JOIN vendors ON `products`.`vendor` = `vendors`.`storeName`";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

    protected function getUsers($user)
    {
        $sql = "SELECT * FROM `users` WHERE `role` = ?";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute([$user]);
        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            $res = [];
        }
        return $res ;
    }
    protected function getOrders()
    {
        $sql = "SELECT * FROM `orders`";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute();
        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            $res = [];
        }
        return $res ;
    }

    public function dashboard(){
        $totalProductNo = count($this->getProducts());

        $this->setLayout('main');
        return $this->render('dashboard',[
            'name'=>'Babajide Tomoshegbo',
            'monthlyEarnings'=>4500000,
            'noOrders'=>count($this->getOrders()),
            'totalBuyers'=>count($this->getUsers('buyer')),
            'totalProducts'=>$totalProductNo,
            'totalNoSellers'=>count($this->getUsers('retailer')),
        ]);

    }

}