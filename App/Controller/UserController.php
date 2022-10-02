<?php

namespace App\Controller;

use App\App;
use App\Auth\AuthUser;
use App\Model\Table\AuthTable;

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        $password = sha1('root');
        $username = 'root';
        $email = 'root@gmail.com';
        $user = new AuthTable();
        if (count($user->all()) == 0) {
            $user->Create([
                'mail' => $email,
                'username' => $username,
                'password' => $password
            ]);
        }

        $title = 'Connection';

        if (!empty($_POST)) {
            $auth = new AuthUser(App::getInstance()->getDb());
            if ($auth->login($_POST['email'], $_POST['password'])) {
                header('Location:?src=e2bdf092171e62ed1823a26b139c920be4aa8ad0');
            } else {
                header('Location:?src=home');
            }
        }


        $this->default2('pages.admin.pages.signIn', compact('title'));
    }

    public function LogOut()
    {
        $_SESSION['auth'];
        session_destroy();
        header('Location:?src=login');
    }
}
