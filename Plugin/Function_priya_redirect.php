<?php

use R3m\Io\Module\Parse;
use R3m\Io\Module\Data;


function function_priya_redirect(Parse $parse, Data $data, $url=null, $wait=0){
    $script = $data->get('script');
    if(empty($script)){
        $script = [];
    }
    if($wait == 0){
        $script[] = '    
            <script type="text/javascript">
                ready(function(){            
                    const redirect = "' . $url . '";
                    priya.redirect(redirect);            
                });
            </script>';
    } else {
        $script[] = '    
            <script type="text/javascript">
                ready(function(){            
                    const redirect = "' . $url . '";
                    setTimeout(() => {priya.redirect(redirect)},'. (int) $wait . ');                                
                });
            </script>';
    }
    $data->set('script', $script);
}
