<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Database;


class HomeController extends Controller
{

    public function index(): void
    {
        $db = new Database();

        $query = $db->prepare("SELECT * FROM user");

        $query->execute();
        $users = $query->fetchAll();

        $this->render('home', [
            'title' => 'Page Home',
            'users' => $users,
        ]);
    }


    public function contact(): void
    {
        $method = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = new Database();
            $query = $db->prepare("INSERT INTO contact (email, subject, message) VALUES (:email, :subject, :message)");
            $query->execute([
                'email' => $_POST['email'],
                'message' => $_POST['message'],
                'subject' => $_POST['subject'],
            ]);

            $this->redirect('/contact');
        }

        $this->render('contact', [
            'title' => 'Page Contact'
        ]);
    }
}