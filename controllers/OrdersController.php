<?php
namespace app\controllers;


use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class OrdersController extends Controller{

    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(['orders']));
    }
    public function addOrders($userId, $productImg, $productId, $qty, $product_size, $price, $status, $orderId, $rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl,$name,$email ){

        $insert = "INSERT INTO `orders`(`userid`, `productid` ,`quantity`, `product_size`, `price`, `orderStatus`, `orderId`, `productImg`, `rate`, `shipper`,`delivery_type`, `delivery_address`, `label_url`, `tracking_no`, `tracking_url`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = Application::$app->db->pdo->prepare($insert);

        $stmt->execute([$userId,$productId,$qty,$product_size,$price,$status,$orderId,$productImg,$rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl]);
        
        $this->OrderMail($name,$email,$orderId);
        
        return $stmt;
        
    }

    public function OrderMail($name,$email,$orderId){
        Application::$app->OrderEmail($name,$email,$orderId);
        
    }

    protected function getProducts()
    {
        $sql = "SELECT `products`.* ,`vendors`.`storeName`, `vendors`.`vendors_city`, `products_details`.* FROM products JOIN vendors JOIN products_details WHERE `products`.`isDeleted`= 0 AND `products`.`vendorId` = `vendors`.`id` AND `products`.`id` =`products_details`.`product_id`";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

    public function getOrders()
    {
        $sql = "SELECT `orders`.*, `users`.name,`users`.email,`users`.phone , `products`.`productName`, `products`.`productPrice`,`products`.`minimumOrderQuantity`,`products`.`productPriceCurr`,`products`.`vendorId` FROM `orders` JOIN `users`,products WHERE orders.userid = users.id AND orders.productid = products.id";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getSingleProduct($id)
    {
        $sql = "SELECT * FROM `products` JOIN `products_details` WHERE `products`.`id` = ? AND `products`.`id` = `products_details`.`product_id`";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute([$id]);
        if ($statement->rowCount() > 0){
            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }
    public function getSingleOrder($id)
    {
        $sql = "SELECT `orders`.*, `vendors`.`address`, `vendors`.`vendors_city`, `vendors`.`storeName`, `vendors`.`bank`, `vendors`.`acctName`, `vendors`.`acctNo`, `vendors`.`acctType`, `buyersAddressBook`.`buyer_address`, `buyersAddressBook`.city, `buyersAddressBook`.state, `users`.name, `users`.email, `users`.phone, `products`.`productName`, `products`.`productPrice`, `products`.`minimumOrderQuantity`, `products`.`productPriceCurr`, `products`.`vendorId` FROM `orders` JOIN `users`, `products`, `buyersAddressBook`, `vendors` WHERE `orders`.id = ? AND `orders`.userid = `users`.id AND `orders`.productid = `products`.id AND `buyersAddressBook`.`user_id` = `orders`.`userid` AND `vendors`.`id` = `products`.`vendorId`";
        // $sql = "SELECT `orders`.*, `buyersaddressbook`.`buyer_address`, `buyersaddressbook`.city, `buyersaddressbook`.state, `users`.name, `users`.email, `users`.phone, `products`.`productName`, `products`.`productPrice`, `products`.`minimumOrderQuantity`, `products`.`productPriceCurr`, `products`.`vendorId`, `vendors`.`storeName` FROM `orders` JOIN `users`, `products`, `buyersaddressbook`, `vendors` WHERE `orders`.id = 1 AND `users`.id = `orders`.userid AND `products`.id = `orders`.productid AND `buyersaddressbook`.`user_id` = `orders`.`userid` AND `vendors`.`id`=`products`.`vendorId`";

        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    public function getSimilarOrder($id)
    {
        $sql = "SELECT `orders`.*,`vendors`.`address`,`vendors`.`vendors_city`,`vendors`.`storeName`,`vendors`.`bank`,`vendors`.`acctName`,`vendors`.`acctNo`,`vendors`.`acctType`,`buyersAddressBook`.`buyer_address`,`buyersAddressBook`.city,`buyersAddressBook`.state, `users`.name,`users`.email,`users`.phone , `products`.`productName`, `products`.`productPrice`,`products`.`minimumOrderQuantity`,`products`.`productPriceCurr`,`products`.`vendorId` FROM `orders` JOIN `users`,`products`,`buyersAddressBook`,`vendors` WHERE `orders`.orderId = ? AND `orders`.userid = `users`.id AND `orders`.productid = `products`.id AND `buyersAddressBook`.`user_id`= `orders`.`userid` AND vendors.id = products.vendorId";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    public function getVendor($id){
        $sql ="SELECT vendors.user_id FROM `vendors` WHERE id=?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }   
    
    public function changeStats($val,$id){
        $sql ="UPDATE `orders` SET `orderStatus` = ? WHERE `orders`.`id` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$val,$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getBuyerAdd($id){
        $sql ="SELECT * FROM `buyersAddressBook` WHERE user_id = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    public function createUser($name, $email, $phone, $password, $role, $verified, $isdelete)
    {
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);

        $insert = "INSERT INTO `users` (`name`, `email`, `phone`, `password`, `role`, `verified`, `isDeleted`) VALUES (?,?,?,?,?,?,?)";
        $stmt = Application::$app->db->pdo->prepare($insert);
        $stmt->execute([$name,$email, $phone,$hashedpassword, $role, $verified, $isdelete]);
        if($stmt){
            $id = Application::$app->db->pdo->lastInsertId();     
            $this->regMail($name,$email,$password);  
            return $id;
        }
        
    }
    
    public function regMail($name,$email,$password){
        Application::$app->regEmail($name,$email,$password);
    }
    

    public function addBuyerAddress($userId, $address, $city, $country, $postal, $state)
    {
        try{
            $get = "INSERT INTO `buyersAddressBook`(`user_id`, `buyer_address`,`city`,`country`, `postal_code`, `state`) VALUES(?,?,?,?,?,?)";
            $stmt = Application::$app->db->pdo->prepare($get);
            $stmt->execute([$userId, $address, $city, $country, $postal, $state]);
            return true;
        }catch(PDOException $e){
            return "Failed! <br>" . $e->getMessage();
        }
    }

    
    public function orders( Request $request){

        if ($request->getMethod() === 'post'){
            $getname ='';
            $getemail ='';
            if (isset($_GET['or'])){
                $run = $this->getOrders();
                return json_encode($run);
            }
            if (isset($_GET['pt'])){
                
                $id = $_GET['pt'];
                $ssds = $this->getSingleOrder($id);
                return json_encode($ssds);
                
            }
            if (isset($_GET['vd'])){
                $id = $_GET['vd'];
                $ssds = $this->getVendor($id);
                return json_encode($ssds);
            }

            if (isset($_GET['statsid'])){
                $id = $_GET['statsid'];
                $val = $_GET['statsval'];
                $ssds = $this->changeStats($val,$id);
                return json_encode($ssds);
            }
            if (isset($_GET['ba'])){
                $id = $_GET['ba'];
                
                $ssds = $this->getBuyerAdd($id);
                return json_encode($ssds);
            }
            if (isset($_GET['orderitems'])){
                $id = $_GET['orderitems'];
                $ssds = $this->getSimilarOrder($id);
                return json_encode($ssds);
            }
            if(isset($_GET['singleproduct'])){
                $pid = $_GET['singleproduct'];
                $req = $this->getSingleProduct($pid);
                return json_encode($req);
            }
            if(isset($_GET['products'])){
                $req = $this->getProducts();
                return json_encode($req);
            }

            if(isset($_GET['name'])){
                
                $name  =    $_GET['name'];
                $email =    $_GET['email'];
                $phone =    $_GET['phone'];
                $password = $_GET['password'];
                $role = $_GET['role'];
                $phone = ltrim($phone, '0');
                $phone = '234'.$phone;
                $verified  = 1;
                $isdelete  = 0;
                $getname = $name;
                $getemail = $email;
                $data = $this->createUser($name, $email, $phone, $password, $role, $verified, $isdelete);

                if ($data){
                    return json_encode(array("statusCode" => 200,"data"=>$data));
                }else{
                    return json_encode(array("statusCode" => 404,"data"=>$data));
                }
                // return json_encode($data);

            }
            if (isset($_GET['buyer_address'])){
                $address  =     $_GET['buyer_address'];
                $city     =     $_GET['city'];
                $state    =     $_GET['state'];
                $country  =     $_GET['country'];
                $postal   =     $_GET['postal_code'];
                $id       =     $_GET['id'];
                $data = $this->addBuyerAddress($id,$address,$city,$country,$postal,$state);
                return json_encode(array("statusCode" => 200,"res"=>$data));
            }

            if(isset($_GET['orderID'])){
                $userId =           $_GET['userId'];
                $product_id =       $_GET['product_id'];
                $product_name =     $_GET['product_name'];
                $quantity =         $_GET['quantity'];
                $product_size =     $_GET['product_size'];
                $orderstatus =      $_GET['orderstatus'];
                $orderID =          $_GET['orderID'];
                $rate =             $_GET['rate'];
                $shipper =          $_GET['shipper'];
                $delivery_type    = $_GET['delivery_type'];
                $delivery_address = $_GET['delivery_address'];
                $name  =            $_GET['Oname'];
                $email =            $_GET['Oemail'];
                $product_info     = $this->getSingleProduct($product_id);
                $product_img      = $product_info['productImageDir'].'/'.$product_info['productImages'];
                $product_price    = $product_info['productPrice'];
                $product_label = '';
                $product_trackno = '';
                $product_trackurl = '';
         
                // $product = $this->getSingleProduct();

                $data = $this->addOrders($userId,$product_img,$product_id,$quantity,$product_size,$product_price,$orderstatus,$orderID,$rate,$shipper,$delivery_type,$delivery_address,$product_label,$product_trackno,$product_trackurl,$name,$email );
                return json_encode(array("statusCode" => 200, "res" => $data));
                // return json_encode(array($name,$email,$data));
            }
        }


        $this->setLayout('main');
        return $this->render('orders', []);
    }


}