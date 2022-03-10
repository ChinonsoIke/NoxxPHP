<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params= [
            'name'=>'Noxx',
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact= new ContactForm();

        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thanks for reaching out');
                $response->redirect('/contact');
                return;
            }
        }

        return $this->render('contact',[
            'model'=> $contact,
        ]);
    }
}