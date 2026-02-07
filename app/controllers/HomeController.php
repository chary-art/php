<?php

namespace App\controllers;

use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyException;
use App\QueryBuilder;
use Delight\Auth\Auth;
use Exception;
use League\Plates\Engine;
use PDO;
use function Tamtamchik\SimpleFlash\flash;

class HomeController
{
    private $templates;
    private $auth;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
        $db = new PDO('mysql:host=localhost;dbname=app3;charset=utf8', 'root', '');
        $this->auth = new Auth($db);
    }

    public function index($vars)
    {
//        d($this->auth->isLoggedIn());
        d($this->auth->getUsername());
        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['posts' => $posts]);
    }

    public function about($vars)
    {

        try {
            $userId = $this->auth->register('myrat@gmail.com', '123', 'Myrat', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

        /*
        try{
            $this->withdraw($vars['amount']);
        }catch(NotEnoughMoneyException $exception)
        {
            flash()->error($exception->getMessage());
//    echo $exception->getMessage();
        }catch(AccountIsBlockedException $exception)
        {
            flash()->error($exception->getMessage());
        }
        */

        echo $this->templates->render('about', ['name' => 'Jonathan about page']);
    }

    /* public function withdraw($amount = 1)
    {
//        throw new AccountIsBlockedException("Your account is blocked");

        $total = 10;
        if($amount>$total)
        {
            //.. Exception
            throw new NotEnoughMoneyException('Your balance less than ' . $amount);
        }
    }
    */

    public function email_verification()
    {
        try {
//            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);
            $this->auth->confirmEmail('gNawz2kx-Hzf1HQX', "JP-IM3vDUUL4BZyT");

            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function login()
    {
        try {
//            $this->auth->login($_POST['email'], $_POST['password']);
            $this->auth->login('myrat@gmail.com', '123');

            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}
