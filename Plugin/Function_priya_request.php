<?php

use R3m\Io\Module\Parse;
use R3m\Io\Module\Data;


function function_priya_request(Parse $parse, Data $data, $url=null, $request=null, $function=null){
    $script = $data->get('script');
    if(empty($script)){
        $script = [];
    }
    if($function === null){
        $script[] = '    
        <script type="text/javascript">
            ready(function(){            
                const url = "' . $url . '";
                const data = ' . Core::object($request, Core::OBJECT_JSON) . ';
                delete data.request;
                request(url, data);                            
            });
        </script>';
    } else {
        $script[] = '    
        <script type="text/javascript">
            ready(function(){            
                const url = "' . $url . '";
                const data = ' . Core::object($request, Core::OBJECT_JSON) . ';
                delete data.request;
                request(url, data,' . $function .');                            
            });
        </script>';
    }
    $data->set('script', $script);
}
