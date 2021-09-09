<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class UserController extends Controller
{
    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(['users']));
    }

    
    public function getBuyer()
    {
        $sql = "SELECT * FROM `users` WHERE role = 'buyer'";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getSeller()
    {
        $sql = "SELECT `users`.*,`vendors`.`storeName`,`vendors`.`approved` FROM `users` JOIN `vendors` WHERE role='seller' AND users.isDeleted = 0 AND `vendors`.`user_id` = `users`.`id`";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getUnSeller()
    {
        $sql = "SELECT * FROM `users` WHERE `users`.`verified` = 0";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getSellerById($id)
    {
        $sql = "SELECT `users`.*,`vendors`.`address`,`vendors`.`storeName`,`vendors`.`postal_code`,`vendors`.`vendors_city`,`vendors`.`country`,`vendors`.`bank`,`vendors`.`acctNo`,`vendors`.`acctName`,`vendors`.`acctType`,`vendors`.`bvn` FROM `users` JOIN `vendors` WHERE `users`.`id` = ? AND `vendors`.`user_id` = `users`.`id`";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function deleteuser($id)
    {
        $sql = "UPDATE `users` SET `users`.`isDeleted`= 1 WHERE id=?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function updateSeller($name,$email,$phone,$sname,$address,$post,$city,$country,$bank,$bankNo,$bankname,$bankType,$whereid)
    {
        $sql = "UPDATE `users` JOIN `vendors` ON `vendors`.`user_id`= `users`.`id` SET
                                      `users`.`name`=?,
                                      `users`.`email`=?,
                                      `users`.`phone`=?,                         
                                      `vendors`.`storeName`=?,
                                      `vendors`.`address`=?,
                                      `vendors`.`postal_code`=?,    
                                      `vendors`.`vendors_city`=?,
                                      `vendors`.`country`=?,                                                   
                                      `vendors`.`bank`=?,                                                   
                                      `vendors`.`acctNo`=?,                                                   
                                      `vendors`.`acctName`=?,                                                   
                                      `vendors`.`acctType`=?                                                   
        WHERE `users`.`id`=?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$name,$email,$phone,$sname,$address,$post,$city,$country,$bank,$bankNo,$bankname,$bankType,$whereid]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    private function authSeller($id,$value)
    {
        $sql = "UPDATE `users` SET `users`.`auth_dist` = ? WHERE `users`.`id` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    private function approveSeller($id,$value)
    {
        $sql = "UPDATE `vendors` SET `vendors`.`approved` = ? WHERE `vendors`.`user_id` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    
    private function approveManu($id,$value)
    {
        $sql = "UPDATE `manufacturers` SET `manufacturers`.`approved` = ? WHERE `manufacturers`.`user_id` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    
       public function getManById($id)
    {
        $sql = "SELECT `users`.*,`manufacturers`.`manufacturer`,`manufacturers`.`postal_code`,`manufacturers`.`manufacturer_city`,`manufacturers`.`country`,`manufacturers`.`bank`,`manufacturers`.`acctNo`,`manufacturers`.`acctName`,`manufacturers`.`acctType`FROM `users` JOIN `manufacturers` WHERE `users`.`id` = ? AND `manufacturers`.`user_id` = `users`.`id`";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

   public function getManufacturers()
    {
        $sql = "SELECT `users`.*,`manufacturers`.`manufacturer`,`manufacturers`.`approved` FROM `users` JOIN `manufacturers` WHERE role='manufacturer' AND manufacturers.isDeleted = 0 AND `manufacturers`.`user_id`=`users`.`id`";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function users(Request $request){

        if ($request->getMethod() === 'post'){

            if (isset($_GET['buyer'])){
                $data = $this->getBuyer();
                return json_encode($data);
            }
            if (isset($_GET['seller'])){
                $data2 = $this->getSeller();
                return json_encode($data2);
            }
            if (isset($_GET['sellerid'])){
                $id = $_GET['sellerid'];
                $data = $this->getSellerById($id);
                return json_encode($data);
            }
            if (isset($_GET['deletesellerid'])){
                $id = $_GET['deletesellerid'];
                $data = $this->deleteuser($id);
                return json_encode($data);
            }
           if (isset($_GET['name'])){
                $id=$_GET['id'];
                $name=$_GET['name'];
                $storename=$_GET['storename'];
                $email=$_GET['email'];
                $phone=$_GET['phone'];
                $address=$_GET['address'];
                $country=$_GET['country'];
                $postal=$_GET['postal'];
                $city=$_GET['city'];
                $bankname =$_GET['bankname'];
                $accountNo =$_GET['acctNo'];
                $accountName =$_GET['acctName'];
                $accountType =$_GET['acctType'];
                $query = $this->updateSeller($name,$email,$phone,$storename,$address,$postal,$city,$country,$bankname,$accountNo,$accountName,$accountType,$id);
                if($query){
                    return true;
                }
            }
            if (isset($_GET['unseller'])){
                $data3 = $this->getUnSeller();
                return json_encode($data3);
            }
            if(isset($_GET['authorizeSeller'])){
                $id =$_GET['authorizeSeller'];
                $val = 1;
                $data = $this->authSeller($id,$val);
                return json_encode($data);
            }
            if(isset($_GET['approve'])){
                $id =$_GET['approve'];
                $val = 1;
                $data = $this->approveSeller($id,$val);
                return json_encode($data);
            }
                        if(isset($_GET['approveManu'])){
                $id =$_GET['approveManu'];
                $val = 1;
                $data = $this->approveManu($id,$val);
                return json_encode($data);
            }

            if (isset($_GET['manufacturers'])){
                $data = $this->getManufacturers();
                return json_encode($data);
            }

            if (isset($_GET['manufacturereid'])){
                $id = $_GET['manufacturereid'];
                $data = $this->getManById($id);
                return json_encode($data);
            }

        }
        $this->setLayout('main');
        return $this->render('users');
    }

}