<?php

use R3m\Io\Module\Parse;
use R3m\Io\Module\Data;


function function_priya_header(Parse $parse, Data $data, $attribute=null, $value=null){
    $script = $data->get('script');
    if(empty($script)){
        $script = [];
    }
    if($value === null){
        $script[] = '    
        <script type="text/javascript">
            ready(function(){            
                let header = priya.collection(\'request.header\');
                if(header === null){
                    header = [];
                }
                header.push(' . Core::Object($attribute, Core::OBJECT_JSON) . ');
                priya.collection(\'request.header\', header);                
            });
        </script>';
    } elseif(is_string($attribute)) {
        $script[] = '    
        <script type="text/javascript">
            ready(function(){            
                let header = priya.collection(\'request.header\');
                if(header === null){
                    header = [];
                }
                header.push({"' . $attribute . '" : "'. $value .'"});
                priya.collection(\'request.header\', header);                
            });
        </script>';
    }
    $data->set('script', $script);
}
