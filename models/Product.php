<?php


namespace app\core;
use app\core\Application;

class Product
{


    public function getProducts()
    {
        $sql = "SELECT products.*,vendors.* FROM products JOIN vendors WHERE `products`.`vendorId` = `vendors`.`id`";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

    public function getSingleProduct($p_id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute([$p_id]);
        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

}