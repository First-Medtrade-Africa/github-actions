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
        $get = "SELECT `quotations`.* , `quotation_responses`.`request_id`, `quotation_responses`.`product_price`, `quotation_responses`.`transport_mode`, `quotation_responses`.`transport_cost`, `quotation_responses`.`total_weight`, `quotation_responses`.`shipping_terms`, `quotation_responses`.`clearing_cost`, `quotation_responses`.`trucking_cost`, `quotation_responses`.`total_cost`, `quotation_responses`.`currency`, `quotation_responses`.`lead_time`, `quotation_responses`.`replied` ,`manufacturers`.`manufacturer` FROM `quotations` JOIN `quotation_responses`,`manufacturers` WHERE `quotations`.`id`= `quotation_responses`.`request_id` AND `quotations`.`vendor_id`=`manufacturers`.`id` ";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([]);

        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getQuotesById($id){
        $get = "SELECT `quotations`.* , `quotation_responses`.`request_id`, `quotation_responses`.`product_price`, `quotation_responses`.`transport_mode`, `quotation_responses`.`transport_cost`, `quotation_responses`.`total_weight`, `quotation_responses`.`shipping_terms`, `quotation_responses`.`clearing_cost`, `quotation_responses`.`trucking_cost`, `quotation_responses`.`total_cost`, `quotation_responses`.`currency`, `quotation_responses`.`lead_time`, `quotation_responses`.`replied`,`manufacturers`.`manufacturer` FROM `quotations` JOIN `quotation_responses`,`manufacturers` WHERE `quotations`.`id`=? AND `quotations`.`id`= `quotation_responses`.`request_id` AND `quotations`.`vendor_id`=`manufacturers`.`id` ";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$id]);

        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    public function addOrders($userId, $productImg, $productId, $qty, $product_size, $price, $status, $orderId, $rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl,$name,$email,$type ){

        $insert = "INSERT INTO `orders`(`userid`, `productid` ,`quantity`, `product_size`, `price`, `orderStatus`, `orderId`, `productImg`, `rate`, `shipper`,`delivery_type`, `delivery_address`, `label_url`, `tracking_no`, `tracking_url`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = Application::$app->db->pdo->prepare($insert);

        $stmt->execute([$userId,$productId,$qty,$product_size,$price,$status,$orderId,$productImg,$rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl]);
        Application::$app->ConfirmPaymentEmail($name,$email);
    
        if($type === "Message"){
            // $sql = "SELECT vendors.*, users.name,users.email,users.role FROM vendors JOIN users WHERE vendors.id= ? AND users.id =vendors.user_id"        

            $sql = " SELECT manufacturers.*, users.name,users.email FROM manufacturers JOIN users WHERE manufacturers.id = ? AND users.id=manufacturers.user_id";
            $stmt = Application::$app->db->pdo->prepare($sql);
            $stmt->execute([$userId]);

            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach( $data as $key => $vendor){
                $vendorStoreName = $vendor['manufacturer'];
                $vendorStoreEmail = $vendor['email'];
            }
                      
            return $stmt;
            Application::$app->ManConfirmPaymentEmail($vendorStoreName,$vendorStoreEmail);  
        }else{
            return true;
        }        
    }

    public function getProductId($name){
        $get = "SELECT * FROM `products` WHERE `products`.`productName` =?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$name]);

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
            if(isset($_GET['quoteid'])){
                $id = $_GET['quoteid'];
                $data = $this->getQuotesById($id);
                $orderId = "FM-".rand(10000,99999);
                $labelurl="";
                $trackno="";
                $trackurl='';
                $status='Awaiting Confirmation';
                $shipper='Manufactuer';
                
                foreach($data as $key=>$quote){
                    $type = $quote['request_type'];
                    if($type  ==="Message"){
                        $userId = $quote['vendor_id'];
                    }else{
                        $userId = 0;
                    }

                    $product_size=$quote['productSize'];
                    $name=$quote['name'];
                    $price =$quote['product_price'];
                    $email=$quote['email'];
                    $qty=$quote['productQuantity'];
                    $rate=$quote['transport_cost'];
                    $delivery=$quote['transport_mode'];
                    $delivery_address=$quote['address'].','.$quote['city'].','.$quote['state'].','.$quote['country'];
                    $productName=$quote['productName'];

                }

                $data2 = $this->getProductId( $productName);
                foreach($data2 as $key=>$quote){
                    $productId =  $quote['id'];
                    $productImg = $quote['productImageDir'].'/'.$quote['productImages'];
                }
                $response =$this->addOrders($userId, $productImg, $productId, $qty, $product_size, $price, $status, $orderId, $rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl,$name,$email,$type );

                return json_encode($response);
            }
            
        }
        
        $data = $this->getQuotes();

        $this->setLayout('main');
        return $this->render('quotes',[
            'quotes' => $data
        ]);
    }

}