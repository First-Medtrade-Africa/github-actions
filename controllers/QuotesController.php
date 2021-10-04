<?php
namespace app\controllers;


use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class QuotesController extends Controller{

    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(['quotes']));
    }


    public function getQuotes(){
        $get = "SELECT * FROM `quotations`";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([]);

        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getQuotesById($id){
        $get = "SELECT * FROM `quotations` WHERE id=?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$id]);

        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function quote( Request $request ){
        
        if($request->getMethod() === 'post' ){
            
            if(isset($_GET['gq'])){

                $data = $this->getQuotes();
                return json_encode($data); 
            }
            if(isset($_GET['pt'])){
                $id = $_GET['pt'];
                $data = $this->getQuotesById($id);
                return json_encode($data); 
            }
            
        }
        
        $data = $this->getQuotes();

        $this->setLayout('main');
        return $this->render('quotes',[
            'quotes' => $data
        ]);
    }

}