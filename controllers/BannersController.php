<?php


namespace app\controllers;


namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;


class BannersController  extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['banners']));
    }

    protected function getProducts()
    {
        $sql = "";
        $statement = Application::$app->db->pdo->query($sql);

        if ($statement->rowCount() > 0){
            $res = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $res ;
    }

    public function banners(Request $request)
    {

        if ($request->getMethod() === 'post') {
            
        }

        $this->setLayout('main');
        return $this->render('banners');
    }


}

