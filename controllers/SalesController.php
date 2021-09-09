<?php


namespace app\controllers;


namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class SalesController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['sales']));
    }

    public function getOrders()
    {
        $sql = "SELECT `orders`.*, `users`.name,`users`.email,`users`.phone , `products`.`productName`, `products`.`productPrice`,`products`.`minimumOrderQuantity`,`products`.`productPriceCurr`,`products`.`vendorId` FROM `orders` JOIN `users` , `products` WHERE orders.userid = users.id AND orders.productid = products.id";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getSalesToday()
    {
        $sql = "SELECT * FROM `orders` WHERE DAY(`orderDate`)  = CURDATE()";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return array([]);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getSalesMonth()
    {
        $sql = "SELECT * FROM `orders` WHERE MONTH(`orderDate`)  = MONTH(CURDATE())";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return $stmt;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getSalesYear()
    {
        $sql = "SELECT * FROM `orders` WHERE YEAR(`orderDate`)  = YEAR(CURDATE())";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return $stmt;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getMarkup($val){
        $sql = "SELECT * FROM markup WHERE `markup_type` = ?";
        $stmt = Application::$app->db->pdo->prepare($sql);
        $stmt->execute([$val]);
        if ($stmt->rowCount() == 0) {
            return $stmt;
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    public function useMarkup($value,$markup){
        $data = ($value * $markup) / 100;
        return $value+$data;
    }
    public function sales(Request $request)
    {
        if ($request->getMethod() === 'post') {

        }

        $orders = $this->getOrders();
        $markup = $this->getMarkup('product');
        $markup2 = $this->getMarkup('international');

        $totalNgnprice = 0;
        $totalUsdprice = 0;
        $domesticMarkup = 0;
        $internationalMarkup = 0;



        foreach ($markup as $key=>$value){
            $domesticMarkup = $value['markup_value'];
        }

        foreach ($markup2 as $key=>$value){
            $internationalMarkup = $value['markup_value'];
        }

        $totalDailyOrders = count($this->getSalesToday());
        $totalMonthOrders = count($this->getSalesMonth());
        $totalAnnualOrders = count($this->getSalesYear());


        $totalAnnualSales = 0;
        $totalAnnualSales2 = 0;

//        foreach ($this->getSalesYear() as $key=>$value){
//            if (is_numeric((int)$value['price'])) {
//                $totalAnnualSales += $this->useMarkup((int)$value['price'],10);
//                $totalAnnualSales2 += (int)$value['price'];
//            }
//
//        }

        foreach ($orders as $key=>$order){
            if($order['productPriceCurr'] == 'NGN'){
                $totalNgnprice += $this->useMarkup((int)$order['productPrice'],$domesticMarkup);
                $totalAnnualSales += $order['productPrice'];

            }else{
                $totalUsdprice += $this->useMarkup((int)$order['productPrice'],$internationalMarkup);
                $totalAnnualSales2 += $order['productPrice'];
            }
        }

        $totalPriceConverted = $totalNgnprice + ($totalUsdprice*500);
        $totalSales =  $totalAnnualSales + ($totalAnnualSales2*500);

        $this->setLayout('main',);

        return $this->render('sales',[
            'name'=>'Babajide Tomoshegbo',
            'orders'=>$this->getOrders(),
            'todaySales'=>$totalDailyOrders,
            'monthlySales'=>$totalMonthOrders,
            'annualEarnings'=>$totalAnnualOrders,
            'totalSalesYr'=>$totalPriceConverted,
            'totalProfit'=>$totalPriceConverted-$totalSales,
            'totalVendorprice'=>$totalPriceConverted ,
            'totalusd'=>$totalUsdprice,
            'totalngn'=>$totalNgnprice,
            'markup'=>$markup,
            'domesticMarkup' => $domesticMarkup,
            'internationalMarkup' => $internationalMarkup,
            'totalVendorPrice' => $totalSales
        ]);
    }


}
