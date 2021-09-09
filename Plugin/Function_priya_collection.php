<?php

use R3m\Io\Module\Parse;
use R3m\Io\Module\Data;
use R3m\Io\Module\Core;

function function_priya_collection(Parse $parse, Data $data, $attribute=null, $value=null){
    $script = $data->get('script');
    if(empty($script)){
        $script = [];
    }
    if(is_array($attribute)){
        $content = [];
        foreach($attribute as $key => $val) {
            if (is_string($val)) {
                $val = '\'' . $val . '\'';
            } elseif (is_array($val) || is_object($val)) {
                $val = Core::OBJECT($val, Core::OBJECT_JSON);
            }
            $key = '\'' . $key . '\'';
            $content[] = 'priya.collection(' . $key . ', ' . $val . ');';
        }
        $script[] = '<script type="text/javascript">
ready(function(){
' . implode("\n", $content) . '                 
});
        </script>';
        $data->set('script', $script);
    }
    if(is_string($attribute)) {
        if(is_string($value)){
            $value = '\'' . $value . '\'';
        }
        elseif(is_array($value) || is_object($value)){
            $value = Core::OBJECT($value, Core::OBJECT_JSON);
        }
        $attribute = '\'' .  $attribute . '\'';
        $script[] = '<script type="text/javascript">
ready(function(){            
    priya.collection(' . $attribute . ', ' . $value . ');    
});
        </script>';
        $data->set('script', $script);
    }
}
