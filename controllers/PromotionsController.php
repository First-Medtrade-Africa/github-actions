<?php


namespace app\controllers;


namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class PromotionsController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['promotions']));
    }

    protected function getProducts()
    {
        $sql = "SELECT products.* ,vendors.storeName, vendors.`vendors_city`, products_details.* FROM products JOIN vendors JOIN products_details WHERE   `products`.`vendorId` = `vendors`.`id` AND `products`.`id` =`products_details`.`product_id`";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }
    protected function getCoupon()
    {
        $sql = "SELECT * FROM `coupon` ";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

    public function getCategories(){
        $get = "SELECT `id`, `cat_name` FROM `product_categories`";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        }else{
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }
    }
    public function getSubCategories($categoryId){
        $get = "SELECT `id`, `categoryId`, `subCategories` FROM `product_subCategories` WHERE categoryId = ?";
        $stmt = Application::$app->db->pdo->prepare($get);
        $stmt->execute([$categoryId]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function checkIfExist($coupon){
        $get = "SELECT `coupon` FROM `coupon` WHERE coupon = ?";
        $stmt = Application::$app->db->pdo->prepare($get);
        $stmt->execute([$coupon]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    public function insertCoupon($coupon,$typ,$discount,$use,$applied,$app_val,$expiry){
        $get = "INSERT INTO `coupon`( `coupon`, `type`,`discount_value`, `uses`, `applied_to`,`applied_value`,`created`, `expiry`) VALUES (?,?,?,?,?,?,current_timestamp(),?)";
        $stmt = Application::$app->db->pdo->prepare($get);
        $stmt->execute([$coupon,$typ,$discount,$use,$applied,$app_val,$expiry]);
        return $stmt;
    }
    public function promotions(Request $request)
    {

        if ($request->getMethod() === 'post') {
            if(isset($_GET['products'])){
                $products = $this->getProducts();
                return json_encode($products);
            }
            if(isset($_GET['Cat'])){
                $Cat = $this->getCategories();
                return json_encode($Cat);
            }
            if(isset($_GET['subCat'])){
                $id = $_GET['subCat'];
                $subCat = $this->getSubCategories($id);
                return json_encode($subCat);
            }
            if(isset($_GET['coupon'])){
                $coupon = $_GET['coupon'];
                $type = $_GET['coupontype'];
                $discount = $_GET['discount'] ?? '';
                $use = $_GET['use'];
                $applied = $_GET['applies'];

                if ($applied === 'product') {
                    $fullpath = $_GET['product'];
                    $app_val = substr($fullpath, strpos($fullpath, '-') + 1);
                } else {
                    if ($applied === 'Category') {
                        $app_val = $_GET['categories'];
                    } else {
                        if ($applied === 'Sub-Category') {
                            $app_val = $_GET['subcat'];
                        }
                    }
                }
                $expiry = $_GET['expiry'];

                if ($this->checkIfExist($coupon)){
                    return 'The Coupon code '.$coupon.' already Exist!';
                }else {
                    $data = $this->insertCoupon($coupon, $type,$discount,$use, $applied, $app_val, $expiry);
                    return $data;
                }
            }
            if(isset($_GET['isvalid'])){
                $str = $_GET['isvalid'];
                $data = $this->checkIfExist($str);
                if ($data){
                    return true;
                }else{
                    return false;
                }
            }
            if(isset($_GET['getCoupon'])){
                $data = $this->getCoupon();
                return json_encode($data);
            }
        }

        $this->setLayout('main');
        return $this->render('promotions');
    }


}

