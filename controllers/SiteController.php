<?php

namespace app\controllers;



use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;



class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile','dashboard','home','register']));
    }



    public function home(){
        return $this->render('home', [
            'name' => 'Babajide Tomoshegbo'
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function dashboard(){
        $this->setLayout('main');

        return $this->render('dashboard',[
            'name'=>'Babajide Tomoshegbo',
            'monthlyEarnings'=>450000,
            'annualEarnings'=>20450000,
            'totalSales'=>4500,
            'totalProducts'=>2500,
            'totalNoSellers'=>560,
        ]);

    }

    public function profile(){
        return $this->render('profile');
    }

    public function users(){
        $this->setLayout('main');
        return $this->render('users');
    }

}