<?php
namespace R3m\Io\Module\Compile;

/**
 * @copyright                (c) Remco van der Velde 2019 - 2021
 * @version                  0.1.36
 * @license                  MIT
 * @note                     Auto generated file, do not modify!
 * @author                   R3m\Io\Module\Parse\Build
 * @author                   Remco van der Velde
 * @source                   /Application/vendor/like-it/cms-core/src/Index/View/Index/Start.tpl
 * @generation-date          2021-09-09 19:48:09
 * @generation-time          30.96 msec
 */

use Exception;
use stdClass;
use R3m\Io\App;
use R3m\Io\Config;
use R3m\Io\Module\Core;
use R3m\Io\Module\Data;
use R3m\Io\Module\Dir;
use R3m\Io\Module\File;
use R3m\Io\Module\Filter;
use R3m\Io\Module\Handler;
use R3m\Io\Module\Host;
use R3m\Io\Module\Parse;
use R3m\Io\Module\Route;
use R3m\Io\Module\Sort;
use R3m\Io\Module\Template\Main;
use R3m\Io\Exception\AuthenticationException;
use R3m\Io\Exception\AuthorizationException;
use R3m\Io\Exception\ErrorException;
use R3m\Io\Exception\FileAppendException;
use R3m\Io\Exception\FileMoveException;
use R3m\Io\Exception\FileWriteException;
use R3m\Io\Exception\LocateException;
use R3m\Io\Exception\ObjectException;
use R3m\Io\Exception\PluginNotFoundException;
use R3m\Io\Exception\UrlEmptyException;
use R3m\Io\Exception\UrlNotExistException;

class Template_Start_45e1dc5562ff03d807ab0b9eb30121cff8801224 extends Main {

    public function run(){
        ob_start();
        $method = $this->function_require($this->parse(), $this->storage(), $this->value_plus($this->value_plus($this->storage()->data('controller.dir.view'), $this->storage()->data('controller.title')), '/Init.tpl'));
        if (is_object($method)){ return $method; }
        elseif (is_array($method)){ return $method; }
        else { echo $method; }
        echo '';
        if($this->value_equal($this->function_content_type($this->parse(), $this->storage()), 'application/json')) {
            echo '    ';
            if(!$this->function_is_empty($this->parse(), $this->storage(), $this->storage()->data('request.user'))) {
                echo '        ';
                $this->function_script($this->parse(), $this->storage(), $this->parse()->compile('module', [], $this->storage()), $this->parse()->compile('
        import {$ldelim} user {$rdelim} from "/Module/User/Js/User.js";
        user.set({object($request.user,\'json-line\')});
        ', [], $this->storage()));
                echo '        ';
                if(!$this->function_is_empty($this->parse(), $this->storage(), $this->storage()->data('request.user.token'))) {
                    echo '            ';
                    $method = $this->function_require($this->parse(), $this->storage(), $this->value_plus($this->function_dir_name($this->parse(), $this->storage(), $this->storage()->data('controller.dir.view'), 2), 'User/View/User/Token/Set.Cookie.tpl'));
                    if (is_object($method)){ return $method; }
                    elseif (is_array($method)){ return $method; }
                    else { echo $method; }
                    echo '            ';
                    $method = $this->function_require($this->parse(), $this->storage(), $this->value_plus($this->function_dir_name($this->parse(), $this->storage(), $this->storage()->data('controller.dir.view'), 2), 'User/View/User/Token/Import.Request.tpl'));
                    if (is_object($method)){ return $method; }
                    elseif (is_array($method)){ return $method; }
                    else { echo $method; }
                    echo '        ';
                }
                echo '        ';
                if(!$this->function_is_empty($this->parse(), $this->storage(), $this->storage()->data('request.user.refresh.token'))) {
                    echo '            ';
                    $method = $this->function_require($this->parse(), $this->storage(), $this->value_plus($this->function_dir_name($this->parse(), $this->storage(), $this->storage()->data('controller.dir.view'), 2), 'User/View/User/Token/Set.Refresh.Cookie.tpl'));
                    if (is_object($method)){ return $method; }
                    elseif (is_array($method)){ return $method; }
                    else { echo $method; }
                    echo '        ';
                }
                echo '        ';
                $method = $this->function_redirect($this->parse(), $this->storage(), $this->function_route_get($this->parse(), $this->storage(), $this->value_plus($this->function_route_prefix($this->parse(), $this->storage()), '-index')));
                if (is_object($method)){ return $method; }
                elseif (is_array($method)){ return $method; }
                else { echo $method; }
                echo '    ';
            }
            echo '';
        } else {
            echo '    ';
            if($this->function_cookie($this->parse(), $this->storage(), 'user.token')) {
                echo '        ';
                $method = $this->function_require($this->parse(), $this->storage(), $this->value_plus($this->function_dir_name($this->parse(), $this->storage(), $this->storage()->data('controller.dir.view'), 2), 'User/User/Token/Import.Cookie.tpl'));
                if (is_object($method)){ return $method; }
                elseif (is_array($method)){ return $method; }
                else { echo $method; }
                echo '        ';
                $method = $this->function_import($this->parse(), $this->storage(), 'Start.css');
                if (is_object($method)){ return $method; }
                elseif (is_array($method)){ return $method; }
                else { echo $method; }
                echo '        ';
                $method = $this->function_import($this->parse(), $this->storage(), 'Debug.css', 'Debug');
                if (is_object($method)){ return $method; }
                elseif (is_array($method)){ return $method; }
                else { echo $method; }
                echo '        ';
                echo '
        ';
                $method = $this->function_dd($this->parse(), $this->storage(), 'yes 2');
                if (is_object($method)){ return $method; }
                elseif (is_array($method)){ return $method; }
                else { echo $method; }
                echo '    ';
                if($this->function_cookie($this->parse(), $this->storage(), 'user.refresh.token')) {
                    echo '        ';
                    echo '
        ';
                    echo '
    ';
                } else {
                    echo '        ';
                    $method = $this->function_redirect($this->parse(), $this->storage(), $this->function_route_get($this->parse(), $this->storage(), $this->value_plus($this->function_route_prefix($this->parse(), $this->storage()), '-user-login')));
                    if (is_object($method)){ return $method; }
                    elseif (is_array($method)){ return $method; }
                    else { echo $method; }
                    echo '    ';
                }
                echo '';
            }
            echo '



';
            return ob_get_clean();
        }

        private function function_script(Parse $parse, Data $data, $name='script', $script=null){
            $object = $parse->object();
            if($name === 'ready'){
                $name = 'script';
                $value = [];
                $value[] = '<script type="text/javascript">';
                $value[] = 'ready(() => {';
                $value[] = $script;
                $value[] = '});';
                $value[] = "\t\t\t" . '</script>';
            }
            elseif($name === 'module-ready'){
                $name = 'script';
                $value = [];
                $value[] = '<script type="module">';
                $value[] = 'ready(() => {';
                $value[] = $script;
                $value[] = '});';
                $value[] = "\t\t\t" . '</script>';
            }
            elseif($name === 'module'){
                $name = 'script';
                $value = [];
                $value[] = '<script type="module">';
                $value[] = $script;
                $value[] = "\t\t\t" . '</script>';
            }
            else {
                $value = [];
                $value[] = '<script type="text/javascript">';
                $value[] = $script;
                $value[] = "\t\t\t" . '</script>';
            }
            $list = $data->data($name);
            if(empty($list)){
                $list = [];
            }
            $value = implode("\n", $value);
            $list[] = $value;
            $data->data($name, $list);
        }

        private function function_object(Parse $parse, Data $data, $input='', $output=null, $type=null){
            $result = Core::object($input, $output, $type);
            return $result;
        }

        private function function_require(Parse $parse, Data $data, $url='', $storage=[]){
            if(File::exist($url)){
                $read = File::read($url);
                $mtime = File::mtime($url);
                if(!empty($storage)){
                    $data_data = new Data();
                    $data_data->data($storage);
                    $data_data->data('r3m.io.parse.view.source.url', $url);
                    $data_data->data('ldelim', '{');
                    $data_data->data('rdelim', '}');
                    $parse->storage()->data('r3m.io.parse.view.source.mtime', $mtime);
                    $compile =  $parse->compile($read, [], $data_data);
                    $data_script = $data_data->data('script');
                    $script = $data->data('script');
                    if(!empty($data_script) && empty($script)){
                        $data->data('script', $data_script);
                    }
                    elseif(!empty($data_script && !empty($script))){
                        $data->data('script', array_merge($script, $data_script));
                    }
                    $data_link = $data_data->data('link');
                    $link = $data->data('link');
                    if(!empty($data_link) && empty($link)){
                        $data->data('link', $data_link);
                    }
                    elseif(!empty($data_link && !empty($link))){
                        $data->data('link', array_merge($link, $data_link));
                    }
                    return $compile;
                } else {
                    $data->data('r3m.io.parse.view.source.url', $url);
                    $parse->storage()->data('r3m.io.parse.view.source.mtime', $mtime);
                    return $parse->compile($read, [], $data);
                }
            } else {
                $text = 'Require: file not found: ' . $url . ' in template: ' . $data->data('r3m.io.parse.view.source.url');
                throw new Exception($text);
            }
        }

        private function function_import(Parse $parse, Data $data, $url=null, $controller=null, $collection=null, $locate=false){
            $object = $parse->object();
            if(is_array($controller)){
                $collection = $controller;
                $controller = null;
            }
            $extension = strtolower(File::extension($url));
            $name = '';
            $value = null;
            switch($extension){
                case 'js' :
                    if($controller !== null){
                        $location = [];
                        $location[] = $object->config('host.dir.root') .
                            $object->config('dictionary.public') .
                            $object->config('ds') .
                            ucfirst($controller) .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        $location[] = $object->config('host.dir.root') .
                            ucfirst($controller) .
                            $object->config('ds') .
                            $object->config('dictionary.public') .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        $location[] = $object->config('host.dir.root') .
                            ucfirst($controller) .
                            $object->config('ds') .
                            $object->config('dictionary.view') .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                    } else {
                        $location = [];
                        $location[] = $object->config('controller.dir.public') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        $location[] = $object->config('controller.dir.view') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        $location[] = $url;
                    }
                    $file = false;
                    foreach($location as $find){
                        if(File::exist($find)){
                            $file = $find;
                            break;
                        }
                    }
                    if($locate !== false){
                        d($location);
                    }
                    if($file === false){
                        return;
                    }
                    $name = 'script';
                    $value = [];
                    $value[] = '<script type="text/javascript">';
                    if(is_array($collection)){
                        $value[] = 'ready(function(){';
                        foreach($collection as $key => $val) {
                            if (is_string($val)) {
                                $val = '\'' . $val . '\'';
                            } elseif (is_array($val) || is_object($val)) {
                                $val = Core::OBJECT($val, Core::OBJECT_JSON);
                            }
                            $key = '\'' . $key . '\'';
                            $value[] = 'priya.collection(' . $key . ', ' . $val . ');';
                        }
                        $value[] = '});';
                    }
                    $value[] = File::read($file);
                    $value[] = "\t\t\t" . '</script>';
                    $value = implode("\n", $value);
                    break;
                case 'css' :
                    if($controller !== null){
                        $location = $object->config('host.dir.root') .
                            ucfirst($controller) .
                            $object->config('ds') .
                            $object->config('dictionary.public') .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        if(!File::exist($location)){
                            //return;
                        }
                        $href = $data->data('host.url') .
                            ucfirst($controller) .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                    } else {
                        $location = $object->config('controller.dir.public') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                        if(!File::exist($location)){
                            //return;
                        }
                        $href = $data->data('host.url') .
                            $object->config('controller.title') .
                            $object->config('ds') .
                            ucfirst($extension) .
                            $object->config('ds') .
                            $url;
                    }
                    $name = 'link';
                    $value =  '<link rel="stylesheet" href="' .  $href . '?version=' . $object->config('framework.version') . '">';
                    break;
            }
            $list = $data->data($name);
            //    dd($list);
            if(empty($list)){
                $list = [];
            }
            $list[] = $value;
            $data->data($name, $list);
        }

        private function function_dd(Parse $parse, Data $data, $debug=null){
            if(
            in_array(
                $debug,
                [
                    '$this',
                    '{$this}'
                ]
            )
            ){
                $debug= $data->data();
            }
            $trace = debug_backtrace(true);
            if(!defined('IS_CLI')){
                echo '<pre class="priya-debug">';
            }
            echo $trace[0]['file'] . ':' . $trace[0]['line'] . PHP_EOL;
            var_dump($debug);
            if(!defined('IS_CLI')){
                echo '</pre>';
            }
            exit;
        }

        private function function_redirect(Parse $parse, Data $data, $url=null){
            try {
                return Core::redirect($url);
            } catch(Exception | UrlEmptyException $exception){
                return $exception->getMessage();
            }

        }

        private function function_content_type(Parse $parse, Data $data){
            return $parse->object()->data(\R3m\Io\App::CONTENT_TYPE);
        }

        private function function_is_empty(Parse $parse, Data $data){
            $attribute = func_get_args();
            array_shift($attribute);
            array_shift($attribute);
            foreach($attribute as $is_empty){
                if(!empty($is_empty)){
                    return false;
                }
            }
            return true;
        }

        private function function_dir_name(Parse $parse, Data $data, $url='', $levels=null){
            try {
                return Dir::name($url, $levels);
            } catch (Exception $e){
                return false;
            }
        }

        private function function_cookie(Parse $parse, Data $data, $attribute=null, $value=null, $duration=null){
            $object = $parse->object();
            if(!empty($parse->is_assign())){
                $cookie = $object->cookie($attribute, $value, $duration);
                return Core::object($cookie);
            } else {
                return $object->cookie($attribute, $value, $duration);
            }
        }

        private function function_route_get(Parse $parse, Data $data, $name=null, $options=[]){
            $object = $parse->object();
            $url = $object->route()::find($object, $name, $options);
            return $url;
        }

        private function function_route_prefix(Parse $parse, Data $data, $prefix=null){
            $object = $parse->object();
            if($prefix !== null){
                $object->config(Config::DATA_ROUTE_PREFIX, $prefix);
            }
            return $object->config(Config::DATA_ROUTE_PREFIX);
        }

// R3M-IO-ac81a825-43e4-4659-97e9-90c565fc4cba
    }