{require($controller.dir.view + $controller.title + '/Init.tpl')}
{if(content.type() == 'application/json')}
    {if(!is.empty($request.user))}
        {script('module')}
        import {$ldelim} user {$rdelim} from "/Module/User/Js/User.js";
        user.set({object($request.user, 'json-line')});
        {/script}
        {if(!is.empty($request.user.token))}
            {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Set.Cookie.tpl')}
            {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Import.Request.tpl')}
        {/if}
        {if(!is.empty($request.user.refresh.token))}
            {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Set.Refresh.Cookie.tpl')}
        {/if}
        {priya.redirect(route.get(route.prefix() + '-index'))}
    {/if}
{else}
    {if(cookie('user.token'))}
        {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Import.Cookie.tpl')}
        {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Import.User.tpl')}
        {import('Start.css')}
        {import('Debug.css', 'Debug')}
        {script('ready')}
        const token = _('user').collection('user.token');
        const data = {$ldelim}
        method : "append",
        target : "body"
        {$rdelim};
        header("Authorization", 'Bearer ' + token);
        request("{server.url('core')}Navigation/Get/", data);
        header("Authorization", 'Bearer ' + token);
        request("{server.url('core')}Home/Body/", data);
        {/script}
        /*
         // bug in parse array
        {require(dir.name($controller.dir.view, 2) + 'Navigation/View/Navigation/Get.tpl', [
            "controller" => [
                "dir" => [
                    "data" => dir.name($controller.dir.data, 2) + 'Navigation/Data/',
                    "view" => dir.name($controller.dir.view, 2) + 'Navigation/View'
                ],
                "title" => "navigation"
            ]
        ])}
        */
    {elseif(cookie('user.refresh.token'))}
        {require(dir.name($controller.dir.view, 2) + 'User/View/User/Token/Import.Refresh.Cookie.tpl')}
        {import('Start.css')}
        {import('Debug.css', 'Debug')}
        {script('ready')}
        const token = _('user').collection('user.token');
        const data = {$ldelim}
        method : "append",
        target : "body"
        {$rdelim};
        header("Authorization", 'Bearer ' + token);
        request("{server.url('core')}Navigation/Get/");
        header("Authorization", 'Bearer ' + token);
        request("{server.url('core')}Home/Body/", data);
        {/script}
        /*
        // bug in parse array
        {require(dir.name($controller.dir.view, 2) + 'Navigation/View/Navigation/Get.tpl', [
            "controller" => [
                "dir" => [
                    "data" => dir.name($controller.dir.data, 2) + 'Navigation/Data/',
                    "view" => dir.name($controller.dir.view, 2) + 'Navigation/View'
                ],
                "title" => "navigation"
            ]
        ])}
        */
    {else}
        {redirect(route.get(route.prefix() + '-user-login'))}
    {/if}
{/if}