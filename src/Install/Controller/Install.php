<?php
namespace LikeIt\Cms\Core\Install\Controller;

use R3m\Io\App;
use R3m\Io\Module\View;

use Exception;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class Install extends View {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;    

    public static function start(App $object){
        $name = Install::name(__FUNCTION__, __CLASS__, '/');
        try {
            if(App::contentType($object) === App::CONTENT_TYPE_HTML){
                $url = Install::locate($object, 'Index/Main');
                $object->data('template.name', $name);
                $object->data('template.dir', Install::DIR);
                $view = Install::response($object, $url);
            } else {
                $url = Install::locate($object, $name);
                $view = Install::response($object, $url);
            }
            return $view;
        } catch (Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception;
        }
    }
}
