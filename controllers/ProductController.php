<?php

namespace app\controllers;


use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Product;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['product']));
    }

    protected function getProducts()
    {
        $sql = "SELECT `products`.* ,`vendors`.`storeName`, `vendors`.`vendors_city`, `products_details`.* FROM products JOIN vendors JOIN products_details WHERE `products`.`isDeleted`= 0 AND `products`.`vendor` = `vendors`.`storeName` AND `products`.`id` =`products_details`.`product_id`";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
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

    public function getCatProduct($id)
    {
        $sql = "SELECT productCategory,productSubCategory FROM `products` WHERE `products`.`id` = ?" ;
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute([$id]);
        if ($statement->rowCount() > 0){
            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function getCategories(){
        $get = "SELECT `id`, `cat_img`, `cat_name` FROM `product_categories`";
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
    
    public function updateProduct($productName, $productPriceCurr, $productCategory, $productSubCategory, $productDiscount, $productPrice, $minimumOrderQuantity, $productSize, $productColor, $productWeight, $productModelNumber, $productDescription, $intheBox, $productShipped, $productDimension, $productShippedAddress, $productShippedCity, $productShippedPostal, $productShippedCountry, $productShippedHSC, $productId,$productInStock,$productVideo,$productionCountry,$productBrand,$productUnit){
       
        $sql = "UPDATE `products` SET `products`.`productName`=?,    `products`.`productPrice`=? `products`.`productPriceCurr`=? `products`.`productDiscount`=? `products`.`minimumOrderQuantity`? `products`.`quantityInStock`? `products`.`quantitySize`=? `products`.`productCategory`=? `products`.`productSubCategory`=? `products`.`productBrand`=? WHERE `products`.`id`=?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([
            $productName, 
            $productPrice, 
            $productPriceCurr, 
            $productDiscount, 
            $minimumOrderQuantity,
            $productInStock,
            $productUnit,
            $productCategory, 
            $productSubCategory,  
            $productBrand,
            $productId 
        ]);
        if($stmt){
            // $update = "UPDATE `products_details` SET 
            //                     `productDescription`= ?,
            //                     `intheBox`= ?,
            //                     `productSize`= ?,
            //                     `productWeight`= ,?
            //                     `productColor`= ?,
            //                     `productModelNumber`= ?,
            //                     `productionCountry`= ?,
            //                     `productShipped`=?,
            //                     `productDimension`= ?,
            //                     `productShippedAddress`=?,
            //                     `productShippedCity`= ?,
            //                     `productShippedPostal`=?,
            //                     `productShippedCountry`= ?,
            //                     `productShippedHSC`=  ?,
            //                     `productManufacture`= ?,
            //                      WHERE `product_id`= ?,";
            // $stmt2 = Application::$app->db->pdo->prepare($update);
            // $stmt2->execute([
            //     $productDescription, 
            //     $intheBox,
            //     $productSize,  
            //     $productWeight, 
            //     $productColor, 
            //     $productModelNumber, 
            //     $productionCountry, 
            //     $productShipped, 
            //     $productDimension, 
            //     $productShippedAddress, 
            //     $productShippedCity, 
            //     $productShippedPostal, 
            //     $productShippedCountry, 
            //     $productShippedHSC,
            //     $productManufacture,
            //     $productId
            // ]);
            return $stmt ;
        }else{
            return $stmt ;
        }
       
    }

    public function getCountries($txt){
        $get = "SELECT `id`, `name`, `iso2` FROM `countries` WHERE `name` LIKE ? ";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$txt]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }
    }
    public function getCities($t){
        $get = "SELECT * FROM `cities` WHERE  `country_id`=?";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$t]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function getHsc($t){
        $get = "SELECT * FROM `hsc` WHERE CAST(TSN AS CHAR) LIKE ? ";
        $stmt =  Application::$app->db->pdo->prepare($get);
        $stmt->execute([$t]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function pro(Request $request){
        $this->setLayout('main');
        return $this->render('pro');
    }

    public function deleteProduct($id){
        $sql = "UPDATE `products` SET `isDeleted` = '1' WHERE `products`.`id` = ?" ;
        $statement = Application::$app->db->pdo->prepare($sql);

        $statement->execute([$id]);
        if ($statement->rowCount() > 0){
            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }

    private function approveProduct($id,$value)
    {
        $sql = "UPDATE `products` SET `products`.`product_approved` = ? WHERE `products`.`id` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$value,$id]);
        if($stmt->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }

    public function products(Request $request)
    {

        if ($request->getMethod() === 'post'){

            if(isset($_GET['txt'])){
                $subCat = $this->getSubCategories($_GET['txt']) ?? '';
                return json_encode($subCat);
            }
            
            if(isset($_GET['approveProduct'])){
                $id = $_GET['approveProduct'];
                $val = 1;
                $data = $this->approveProduct($id,$val);
                return json_encode($data);
            }

            if(isset($_GET['pid'])){
                
                $Catr = $this->getCatProduct($_GET['pid']) ?? '';
                return json_encode($Catr);
            }

            if(isset($_GET['country'])){
                $input ="%{$_GET['country']}%";
                $Catj = $this->getCountries($input) ?? '';
                return json_encode($Catj);
            }

            if(isset($_GET['cty'])){
                $dat = $this->getCities($_GET['cty']) ?? '';
                return json_encode($dat);
            }

            if(isset($_GET['hsc'])){
                $ppp = "%{$_GET['hsc']}%";
                $hsc = $this->getHsc($ppp) ?? '';
                return json_encode($hsc);
            }
            if(isset($_GET['delproductid'])){
                $pid = $_GET['delproductid'];
                $req = $this->deleteProduct($pid);
                return $req;
            }
            
            if( isset($_GET['prodId'])){
                $productId              =         $_GET['prodId'];
                $productName            =         $_GET['prodName'];
                $productBrand           =         $_GET['prodbrand'];
                $productCatId           =         $_GET['prodcategory'] ?? '';
                $intheBox               =         $_GET['intheBox'];
                $productSubCatId        =         $_GET['productSubCategory'] ?? '';
                $productColor           =         $_GET['prodcolor'];
                $productDescription     =         $_GET['proddes'];
                $productManufacture     =         $_GET['productManufacture'] ?? '';
                $productRating          =         $_GET['productRating'] ?? '';
                $productmodelNo         =         $_GET['prodbatch'];
                $productWeight          =         $_GET['prodweight'].' kg';
                $productShipped         =         $_GET['prodshipped'];
                $productPrice           =         $_GET['prodprice'];
                $productPriceCurr       =         $_GET['curr'];
                $productionCountry      =         $_GET['prodcountry'];
                $productOrderQuantity   =         $_GET['prodmoq'];
                $productVideo           =         $_GET['prodvid'];
                $productInStock         =         $_GET['prodInStock'];
                $productUnit            =         $_GET['qty'] ;
                $productSize            =         $_GET['prodSizedcat'] ?? ''.'-'.$_GET['prodsize'] ?? '';
                $prodDisc               =         $_GET['priceDiscount'];
                 if($productShipped == 'Yes'){
                    $markup = 20;
                    $productHeight =  $_GET['prodheight'];
                    $productWidth =  $_GET['prodwidth'];
                    $productLength =  $_GET['prodlenght'] ;
    
                    $productDimension = $productLength.'x'.$productWidth.'x'.$productHeight;
    
                    $productShippedAddress  =  $_GET['productShippedAddress'];
                    $productShippedCity     =  $_GET['productShippedCity'] ?? '';
                    $productShippedPostal   =  $_GET['productShippedPostal'];
                    $productShippedCountry  =  $_GET['productShippedCountry'];
                    $productShippedHSC      =  $_GET['productShippedHSC'];
    
                }else{
                    $markup = 10;
                    $productHeight = '';
                    $productWidth = '';
                    $productLength = '' ;
                    $productDimension = $productLength.'x'.$productWidth.'x'.$productHeight;
                }
                // $data =array([
                //     $productId            ,
                //     $productName          ,
                //     $productBrand         ,
                //     $productCatId         ,
                //     $intheBox             ,
                //     $productSubCatId      ,
                //     $productColor         ,
                //     $productDescription   ,
                //     $productManufacture   ,
                //     $productRating        ,
                //     $productmodelNo       ,
                //     $productWeight        ,
                //     $productShipped       ,
                //     $productPrice         ,
                //     $productPriceCurr     ,
                //     $productionCountry    ,
                //     $productOrderQuantity ,
                //     $productVideo         ,
                //     $productInStock       ,
                //     $productUnit          ,
                //     $productSize          ,
                //     $prodDisc             ,
                //     $productHeight ,
                //     $productWidth ,
                //     $productLength ,
                //     $productShippedAddress  ,
                //     $productShippedCity     ,
                //     $productShippedPostal   ,
                //     $productShippedCountry  ,
                //     $productShippedHSC      ,
                // ]);
                // return json_encode($data);
                $stat = $this->updateProduct(
                    $productName,
                    $productPriceCurr,
                    $productCatId,
                    $productSubCatId,
                    $prodDisc,
                    $productPrice,
                    $markup,
                    $productOrderQuantity,
                    $productSize,
                    $productColor,
                    $productWeight,
                    $productmodelNo,
                    $productDescription,
                    $intheBox,
                    $productShipped,
                    $productDimension, 
                    $productShippedAddress, 
                    $productShippedCity, 
                    $productShippedPostal, 
                    $productShippedCountry, 
                    $productShippedHSC, 
                    $productId,
                    $productInStock,
                    $productVideo,
                    $productionCountry,
                    $productBrand,
                    $productUnit  
                );
                return $stat;
            }
                
        }
        $product_id ='';
        if(isset($_GET['id'])) {
            $product_id = $request->getBody()['id'];
            $getProductDetails = $this->getSingleProduct($product_id);
        }
        $this->setLayout('main');
        
        return $this->render('product', [
            'name' => 'Babajide Tomoshegbo',
            'products'=>$this->getProducts(),
            'category'=>$this->getCategories(),
            'subCategory'=>$this->getSubCategories($this->getSingleProduct($product_id)['productCategory'] ?? '') ?? '',
            'data'=> $product_id ?? ' ',
            'singleData'=>$getProductDetails ?? '',
            'post'=>$postdata ?? ''
        ]);

    }



}