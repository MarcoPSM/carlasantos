<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $this->setLayout('home');

        $params = [
            'name' => "Marco's Framework"
        ];
        return $this->render('home', $params);

    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thank you for the contact.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model'=>$contact
        ]);

    }

    public function message(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thank you for the contact.');
            }
        }
    }

    public function carla()
    {
        return $this->render('carla', []);
    }

    public function testemunhos()
    {
        return $this->render('testemunhos', []);
    }
    public function vendido()
    {
        return $this->render('vendido', []);
    }
    public function vendedores()
    {
        return $this->render('vendedores', []);
    }
    public function compradores(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thank you for the contact.');
            }
        }

        return $this->render('compradores', []);
    }
}