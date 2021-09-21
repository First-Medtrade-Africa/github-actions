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
        $sql = "SELECT products.* ,vendors.storeName, vendors.`vendors_city`, products_details.* FROM products JOIN vendors JOIN products_details WHERE `products`.`isDeleted`= 0 AND `products`.`vendorId` = `vendors`.`id` AND `products`.`id` =`products_details`.`product_id`";
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
        public function updateProduct($productName, $productPriceCurr, $productCategory, $productSubCategory, $productDiscount, $productPrice, $markup, $minimumOrderQuantity, $productSize, $productColor, $productWeight, $productModelNumber, $productDescription, $intheBox, $productShipped, $productDimension, $productShippedAddress, $productShippedCity, $productShippedPostal, $productShippedCountry, $productShippedHSC, $productId,$productInStock,$productVideo,$productionCountry,$productBrand,$productUnit){
        try {
            $update =  "UPDATE `products`
                        SET `productName`=?,
                            `productPriceCurr`=?,
                            `productCategory`=?,
                            `productSubCategory`=?,
                            `productDiscount`=?,
                            `productPrice`=?,
                            `markUp`=?,
                            `minimumOrderQuantity`=?,
                            `quantitySize` = ?,
                            `quantityInStock`=?,
                            `productVideo`=?,
                            `productBrand`=?
                        WHERE `id`=?";
            $stmt = Application::$app->db->pdo->prepare($update);
            $stmt->execute([$productName, $productPriceCurr, $productCategory, $productSubCategory,  $productDiscount, $productPrice, $markup, $minimumOrderQuantity,$productUnit,$productInStock,$productVideo,$productBrand,$productId ]);
            if($stmt){
                $update = "UPDATE `products_details`
                SET `productSize`=?,
                    `productColor`=?,
                    `productWeight`=?,
                    `productModelNumber`=?,
                    `productDescription`=?,
                    `intheBox`=?,
                    `productShipped`=?,
                    `productDimension`=?,
                    `productShippedAddress`=?,
                    `productShippedCity`=?,
                    `productShippedPostal`=?,
                    `productShippedCountry`=?,
                    `productShippedHSC`=?,
                    `productionCountry`=?
                WHERE `product_id`=?";
                $stmt = Application::$app->db->pdo->prepare($update);
                $stmt->execute([$productSize,  $productColor, $productWeight, $productModelNumber, $productDescription, $intheBox,$productShipped, $productDimension, $productShippedAddress, $productShippedCity, $productShippedPostal, $productShippedCountry, $productShippedHSC,$productionCountry, $productId]);
            }
            return true;
        } catch(PDOException $e){
            echo "Failed! <br>" . $e->getMessage();
            return false;
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
    public function products(Request $request)
    {

        if ($request->getMethod() === 'post'){

            if(isset($_GET['txt'])){
                $subCat = $this->getSubCategories($_GET['txt']) ?? '';
                return json_encode($subCat);
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
            
            
            $productId              =         $request->getBody()['prodId'];
            $productName            =         $request->getBody()['prodName'];//
            $productBrand           =         $request->getBody()['prodbrand'];
            $productCatId           =         $request->getBody()['prodcategory'] ?? '';
            $intheBox               =         $request->getBody()['intheBox'];
            $productSubCatId        =         $request->getBody()['productSubCategory'] ?? '';
            $productColor           =         $request->getBody()['prodcolor'];
            $productDescription     =         $request->getBody()['proddes'];
            $productManufacture     =         $request->getBody()['productManufacture'] ?? '';
            $productRating          =         $request->getBody()['productRating'] ?? '';
            $productmodelNo         =         $request->getBody()['prodbatch'];
            $productWeight          =         $request->getBody()['prodweight'].' kg';
            $productShipped         =         $request->getBody()['prodshipped'];
            $productPrice           =         $request->getBody()['prodprice'];
            $productPriceCurr       =         $request->getBody()['curr'];
            $productionCountry      =         $request->getBody()['prodcountry'];
            $productOrderQuantity   =         $request->getBody()['prodmoq'];
            $productVideo           =         $request->getBody()['prodvid'];
            $productInStock         =         $request->getBody()['prodInStock'];
            $productUnit            =         $request->getBody()['qty'] ;
            $productSize            =         $request->getBody()['prodSizedcat'].'-'.$request->getBody()['prodsize'] ?? '';
            $prodDisc               =         $request->getBody()['priceDiscount'];

            if($productShipped == 'Yes'){
                $markup = 20;
                $productHeight = $request->getBody()['prodheight'];
                $productWidth = $request->getBody()['prodwidth'];
                $productLength = $request->getBody()['prodlenght'] ;

                $productDimension = $productLength.'x'.$productWidth.'x'.$productHeight;

                $productShippedAddress  = $request->getBody()['productShippedAddress'];
                $productShippedCity     = $request->getBody()['productShippedCity'];
                $productShippedPostal   = $request->getBody()['productShippedPostal'];
                $productShippedCountry  = $request->getBody()['productShippedCountry'];
                $productShippedHSC      = $request->getBody()['productShippedHSC'];

            }else{
                $markup = 10;
                $productHeight = '';
                $productWidth = '';
                $productLength = '' ;
                $productDimension = $productLength.'x'.$productWidth.'x'.$productHeight;
            }

            $stat = $this->updateProduct($productName,$productPriceCurr,$productCatId,$productSubCatId,$prodDisc,$productPrice,$markup,$productOrderQuantity,$productSize,$productColor,$productWeight,$productmodelNo,$productDescription,$intheBox,$productShipped,$productDimension, $productShippedAddress, $productShippedCity, $productShippedPostal, $productShippedCountry, $productShippedHSC, $productId,$productInStock,$productVideo,$productionCountry,$productBrand,$productUnit  );
            if($stat){
                Application::$app->response->redirect('/products');
            }
        }



        $product_id ='';
        if(count($request->getBody())>1) {
            $product_id = $request->getBody()['id'] ?? '';
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