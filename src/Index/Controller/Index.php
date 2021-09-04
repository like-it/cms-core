<?php
namespace LikeIt\Cms\Core\Index\Controller;

use R3m\Io\App;
use R3m\Io\Module\View;

use Exception;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class Index extends View {
    const DIR = __DIR__ . DIRECTORY_SEPARATOR;    

    public static function main(App $object){
        $name = Index::name(__FUNCTION__, __CLASS__, '/');
        try {
            $url = Index::locate($object, $name);
            $view = Index::response($object, $url);
            return $view;
        } catch (Exception | LocateException | UrlEmptyException | UrlNotExistException $exception){
            return $exception->getMessage() . "\n";
        }
    }
}
