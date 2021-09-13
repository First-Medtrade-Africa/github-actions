<?php


namespace app\controllers;

namespace app\controllers;


use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Product;



class MarkUpController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['markup']));
    }

    public function getMarkup(){
        $get = "SELECT * FROM `markup`";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getExchange(){
        $get = "SELECT * FROM `exchange_rate`";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getMarkupById($id){
        $get = "SELECT * FROM `markup` WHERE `markup_id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }public function getExchangById($id){
        $get = "SELECT * FROM `exchange_rate` WHERE `exchange_rate`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function updateMarkup($id,$markup){
        $get = "UPDATE `markup` SET `markup_value` = ? WHERE `markup_id` = ?";;
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$markup,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function addExchange($rate,$inverserate,$currency,$xch){
        $get = "INSERT INTO `exchange_rate`(`currency`, `inverse_rate`, `rate`, `x_currency`) VALUES (?,?,?,?)";;
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$currency,$inverserate,$rate,$xch]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function UpdateExchange($id,$rate,$inverserate,$currency,$xch){
        $get = "UPDATE  `exchange_rate` SET `currency`= ?, `inverse_rate`= ?, `rate`= ?, `x_currency`= ? WHERE `exchange_rate`.`id` = ?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$currency,$inverserate,$rate,$xch,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function markup(Request $request)
    {
        if ($request->getMethod() === 'post'){

            if (isset($_GET['getmarkup'])){
                $data = $this->getMarkup();
                return json_encode($data);
            }
            if (isset($_GET['getexchange'])){
                $data = $this->getExchange();
                return json_encode($data);
            }

            if (isset($_GET['buy'])){
                $buy = strtoupper($_GET['buy']);
                $sell =strtoupper($_GET['sell']);
                $rate =$_GET['rate'];
                $inverse =$_GET['inverse'];
                $data = $this->addExchange($rate,$inverse,$buy,$sell);
                return json_encode($data);
            }
            if (isset($_GET['exchange_id'])){
                $id = $_GET['exchange_id'];
                $buy = strtoupper($_GET['ebuy']);
                $sell =strtoupper($_GET['esell']);
                $rate =$_GET['erate'];
                $inverse =$_GET['einverse'];
                $data = $this->UpdateExchange($id,$rate,$inverse,$buy,$sell);
                return json_encode($data);
            }

            if (isset($_GET['getmarkupbyid'])){
                $id = $_GET['getmarkupbyid'];
                $data = $this->getMarkupById($id);
                return json_encode($data);
            }
            if (isset($_GET['getexchangebyid'])){
                $id = $_GET['getexchangebyid'];
                $data = $this->getExchangById($id);
                return json_encode($data);
            }
            if (isset($_GET['markupType'])){
                $id = $_GET['markupid'];
                $markup = $_GET['markupType'];
                $data = $this->updateMarkup($id,$markup);
                return json_encode($data);
            }

        }
        $this->setLayout('main');
        return $this->render('markup');
    }

}