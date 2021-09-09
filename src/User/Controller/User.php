<?php
namespace LikeIt\Cms\Core\User\Controller;

use R3m\Io\App;
use R3m\Io\Module\View;

use Exception;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class User extends View {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;    

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
}
