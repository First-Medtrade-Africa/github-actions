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
        $get = "SELECT `quotations`.* , `quotation_responses`.`request_id`, `quotation_responses`.`product_price`, `quotation_responses`.`transport_mode`, `quotation_responses`.`transport_cost`, `quotation_responses`.`total_weight`, `quotation_responses`.`shipping_terms`, `quotation_responses`.`clearing_cost`, `quotation_responses`.`trucking_cost`, `quotation_responses`.`total_cost`, `quotation_responses`.`currency`, `quotation_responses`.`lead_time`, `quotation_responses`.`replied` ,`vendors`.`storeName` FROM `quotations` JOIN `quotation_responses`,`vendors` WHERE `quotations`.`id`= `quotation_responses`.`request_id` AND `quotations`.`vendor_id`=`vendors`.`id` ";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([]);

        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getQuotesById($id){
        $get = "SELECT `quotations`.* , `quotation_responses`.`request_id`, `quotation_responses`.`product_price`, `quotation_responses`.`transport_mode`, `quotation_responses`.`transport_cost`, `quotation_responses`.`total_weight`, `quotation_responses`.`shipping_terms`, `quotation_responses`.`clearing_cost`, `quotation_responses`.`trucking_cost`, `quotation_responses`.`total_cost`, `quotation_responses`.`currency`, `quotation_responses`.`lead_time`, `quotation_responses`.`replied`,`vendors`.`storeName` FROM `quotations` JOIN `quotation_responses`,`vendors` WHERE `quotations`.`id`=? AND `quotations`.`id`= `quotation_responses`.`request_id` AND `quotations`.`vendor_id`=`vendors`.`id` ";
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