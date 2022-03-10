<?php

namespace App\Controllers;

use NoxxPHP\Core\Application;
use NoxxPHP\Core\Controller;
use NoxxPHP\Core\Middlewares\AuthMiddleware;
use NoxxPHP\Core\Request;
use NoxxPHP\Core\Response;
use App\Models\LoginModel;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function register(Request $request)
    {
        $user= new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('register', [
                'model'=>$user,
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model'=>$user,
        ]);
    }

    public function login(Request $request, Response $response)
    {
        $loginForm= new LoginModel();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }

        $this->setLayout('auth');
        return $this->render('login', [
            'model'=> $loginForm,
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}