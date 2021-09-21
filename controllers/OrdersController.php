<?php
namespace app\controllers;


use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class OrdersController extends Controller{

    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(['orders']));
    }
    public function addOrders($userId, $productImg, $productId, $qty, $product_size, $price, $status, $orderId, $rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl){

        $insert = "INSERT INTO `orders`(`userid`, `productid` ,`quantity`, `product_size`, `price`, `orderStatus`, `orderId`, `productImg`, `rate`, `shipper`,`delivery_type`, `delivery_address`, `label_url`, `tracking_no`, `tracking_url`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = Application::$app->db->pdo->prepare($insert);
        $stmt->execute([$userId,$productId,$qty,$product_size,$price,$status,$orderId,$productImg,$rate,$shipper,$delivery,$delivery_address,$labelurl,$trackno,$trackurl]);
        return $stmt;

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
    
    public function regEmail($name, $email,$password){
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'babajide234@gmail.com';
            $mail->Password = '08031973588';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('no-reply@firstmedtradeafrica.com','babajide tomoshegbo');
            $mail->addAddress($email);
            $mail->Subject = 'Registration Successful!';
            $message = '
            <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
            <table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse">
              <tbody>
                <tr>
                  <td valign="top" align="center" style="border-collapse:collapse;background-color:#ffffff" bgcolor="#ffffff">
                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                      <tbody>
                        <tr>
                          <td align="left" style="border-collapse:collapse;padding:5px 0 0 0">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                              <tbody>
                                <tr>
                                  <td style="border-collapse:collapse;background-color:#ffffff" align="center" bgcolor="#ffffff">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                      <tbody>
                                        <tr>
                                          <td style="border-collapse:collapse">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td style="border-collapse:collapse;padding:0px 0 35px 0px" align="left">
            
                                                    <a href="">
                                                      <img src="https://www.firstmedtrade.com/includes/assets/img/logo%202.png" width="147" height="31" style="outline:none;text-decoration:none;display:block;border:none" alt="logo" class="CToWUd">
                                                    </a>
            
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                              <tbody>
                                <tr>
                                  <td align="left" style="border-collapse:collapse;color:#001973;font-family:helvetica,arial,sans-serif;font-size:30px;font-weight:100;line-height:32px;padding:0 0 10px 0">Welcome To FirstMedTrade Africa</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;table-layout:fixed;word-wrap:break-word" width="600">
                              <tbody>
                                <tr>
                                  <td style="
                                    border-collapse:collapse;
                                    color:#333333;
                                    font-family:helvetica,arial,sans-serif;
                                    font-size:17px;
                                    line-height:24px;
                                    font-weight:100;
                                    padding:0 30px 38px 0" 
                                    align="left">
                                    Welcome '.$name.' this account was autogenerated to fufill your order offline, your login details bellow: <br> 
                                    <b style="
                                              background-color: #001973;     
                                              border: 1px solid #001973;
                                              border-radius: 4px;
                                              color: #ffffff;
                                              display: inline-block;
                                              font-family: Helvetica,Arial,sans-serif;
                                              font-size: 14px;
                                              font-weight: bold;
                                              line-height: 25px;
                                              text-align: center;
                                              text-decoration: none;
                                              padding: 0 10px;
                                              letter-spacing: .5px;
                                              min-width: 150px;
                                              margin-bottom: 10px;
                                              margin-right: 20px;
                                              margin-top: 20px;
                                      ">UserName :</b>'.$email.'<br>
                                      <b style="
                                                background-color: #001973;     
                                                border: 1px solid #001973;
                                                border-radius: 4px;
                                                color: #ffffff;
                                                display: inline-block;
                                                font-family: Helvetica,Arial,sans-serif;
                                                font-size: 14px;
                                                font-weight: bold;
                                                line-height: 25px;
                                                text-align: center;
                                                text-decoration: none;
                                                padding: 0 10px;  
                                                letter-spacing: .5px;
                                                min-width: 150px;
                                                margin-right: 20px;
                                      ">Password :</b>'.$password.'<br>
                                    <br>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                              <tbody>
                                <tr>
                                  <td style="border-collapse:collapse;padding:0 0 30px 0" align="left">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                      <tbody>
                                        <tr>
                                          <td align="left" style="border-collapse:collapse">
                                            <div>
                                              <a href="" style="
                                              background-color: #001973;     
                                              border: 1px solid #001973;
                                              border-radius: 4px;
                                              color: #ffffff;
                                              display: inline-block;
                                              font-family: Helvetica,Arial,sans-serif;
                                              font-size: 14px;
                                              font-weight: bold;
                                              line-height: 35px;
                                              text-align: center;
                                              text-decoration: none;
                                              padding: 0 25px 0 25px;
                                              letter-spacing: .5px;
                                              min-width: 150px; ">Login to Edit Your Profile</a>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse"></td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                              <tbody>
                                <tr>
                                  <td align="center" style="border-collapse:collapse">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;border-top:#e6e6e6 solid 1px;padding:10px 0 10px 0" width="100%" align="center">
                                      <tbody>
                                        <tr>
                                          <td align="center" style="border-collapse:collapse">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%" align="center">
                                              <tbody>
                                                <tr>
                                                  <td align="center" style="border-collapse:collapse">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                                      <tbody>
                                                        <tr>
                                                          <td align="center" style="border-collapse:collapse;padding:15px 5px 15px 5px;font-family:arial,sans-serif;font-size:12px;font-weight:400">
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Home</a>
                                                            <span style="padding:20px 15px;color:#848484">•</span>
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Blog</a>
                                                            <span style="padding:20px 15px;color:#848484">•</span>
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Support</a>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="100%" align="center" style="border-collapse:collapse;padding:10px;font-family:helvetica,arial,sans-serif;font-size:12px;line-height:16px;color:#a6a6a6"> This email has been sent to you by FirstMed Trade Africa <br>
                                    <!-- <a style="color:#a6a6a6" href="" target="_blank" data-saferedirecturl=""> Evernote Corporation, 305 Walnut Street, Redwood City, CA 94063, USA. </a> -->
                                  </td>
                                </tr>
                                <tr>
                                  <td height="1" style="border-collapse:collapse;min-width:576px;font-size:0px;line-height:0px">
                                    <img height="1" src="https://ci5.googleusercontent.com/proxy/nYc7GBTBg_vgkhSKTlw-j_4K-E90MMZQnUX_aTAm8YxewSVkHwotLpp7CxsJh5Y-Elnus6XR0JV35QDRE9TQ0NjMBdiHxD1_20m3XWWkePYKkAC8EkGBoYq4=s0-d-e1-ft#https://www.evernote.com/redesign/mail/puck/global/gmail_spacer_576.gif" style="outline:none;min-width:576px;text-decoration:none;border:none" class="CToWUd">
                                  </td>
                                </tr>
                                <tr>
                                  <td style="border-collapse:collapse">
                                    <div style="display:none;white-space:nowrap;font:15px courier;color:#ffffff">- - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="border-collapse:collapse">
                                    <img src="https://ci6.googleusercontent.com/proxy/DSrLnsDDEDAC9C_xfdAHj9X-FUmsfdJUrEGcdzBdhPH7b9ioHioH-dJcX10XJRsiCh-YeLdu5JEQl066xKGUCkoUymLbmkcQuEULWx_9C8R1_RZnAQ=s0-d-e1-ft#https://www.evernote.com/etpa/d992ce4b-4a06-4e60-8c17-db1277da1980" style="outline:none;text-decoration:none;border:none;height:1px;width:1px" width="1" height="1" class="CToWUd">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            
            </body>
            </html>
            ';
            $mail->isHTML(true);
            $mail->Body = $message;
            $mail->send();
        }
        catch (Exception $e)
        {
            /* PHPMailer exception. */
            return $e->errorMessage();
        }
        catch (\Exception $e)
        {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            return $e->getMessage();
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
            $this->regEmail($name, $email,$password);
            return $id;
        }else{
            return $stmt->errorCode();
        }

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

            if(isset($_POST['name'])){
                $name  =      $request->getBody()['name'];
                $email =     $request->getBody()['email'];
                $phone =     $request->getBody()['phone'];
                $phone = ltrim($phone, '0');
                $phone = '234'.$phone;
                $password = $request->getBody()['password'];
                $role = $request->getBody()['role'];
                $verified  = 1;
                $isdelete  = 0;

                $data = $this->createUser($name, $email, $phone, $password, $role, $verified, $isdelete);
//                return $data;
                if ($data){
                    return json_encode(array("statusCode" => 200,"data"=>$data));
                }else{
                    return json_encode(array("statusCode" => 200,"data"=>$data));
                }

            }
            if (isset($_POST['buyer_address'])){
                $address  =      $request->getBody()['buyer_address'];
                $city =     $request->getBody()['city'];
                $state =     $request->getBody()['state'];
                $country =     $request->getBody()['country'];
                $postal =     $request->getBody()['postal_code'];
                $id = $request->getBody()['id'];
                $data = $this->addBuyerAddress($id,$address,$city,$country,$postal,$state);
                return json_encode(array("statusCode" => 200,"res"=>$data));
            }
            if(isset($_POST['orderID'])){
                $userId = $request->getBody()['userId'];
                $product_id = $request->getBody()['product_id'];
                $product_name = $request->getBody()['product_name'];
                $quantity = $request->getBody()['quantity'];
                $product_size = $request->getBody()['product_size'];
                $orderstatus = $request->getBody()['orderstatus'];
                $orderID = $request->getBody()['orderID'];
                $rate = $request->getBody()['rate'];
                $shipper = $request->getBody()['shipper'];
                $delivery_type = $request->getBody()['delivery_type'];
                $delivery_address = $request->getBody()['delivery_address'];
                $product_info = $this->getSingleProduct($product_id);
                $product_img=$product_info['productImageDir'].'/'.$product_info['productImages'];
                $product_price = $product_info['productPrice'];
                $product_label = '';
                $product_trackno = '';
                $product_trackurl = '';
                $data = $this->addOrders($userId,$product_img,$product_id,$quantity,$product_size,$product_price,$orderstatus,$orderID,$rate,$shipper,$delivery_type,$delivery_address,$product_label,$product_trackno,$product_trackurl);
                return json_encode(array("statusCode" => 200, "res" => $data));

            }
        }


        $this->setLayout('main');
        return $this->render('orders', []);
    }



}