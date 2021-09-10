<?php
namespace LikeIt\Cms\Core\User\Controller;

use R3m\Io\App;
use R3m\Io\Module\Response;
use R3m\Io\Module\View;

use Exception;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class User extends View {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;

    public static function login(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            if(App::contentType($object) === App::CONTENT_TYPE_HTML){
                $url = User::locate($object, '/Index/Main');
                $object->data('template.name', $name);
                $object->data('template.dir', User::DIR);
                $view = User::response($object, $url);
                return $view;
            } else {
                $url = User::locate($object, $name);
                $view = User::response($object, $url);

                return new Response($view, Response::TYPE_OBJECT);
            }

        } catch (Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }

    public static function login_blocked(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            $url = User::locate($object, $name);
            return User::response($object, $url);
        } catch(Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }

    public static function password_forgot(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            $url = User::locate($object, $name);
            return User::response($object, $url);
        } catch(Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }

    public static function password_forgot_success(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            $url = User::locate($object, $name);
            return User::response($object, $url);
        } catch(Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }

    public static function logout(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            $url = User::locate($object, $name);
            return User::response($object, $url);
        } catch(Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }

    /*
    public static function start(App $object){
        $name = User::name(__FUNCTION__, __CLASS__, '/');
        try {
            if(App::contentType($object) === App::CONTENT_TYPE_HTML){
                $url = User::locate($object, 'Index/Main');
                $object->data('template.name', $name);
                $object->data('template.dir', Index::DIR);
                $view = User::response($object, $url);
            } else {
                $url = User::locate($object, $name);
                $view = User::response($object, $url);
            }
            return $view;
        } catch (Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }
    */
}
