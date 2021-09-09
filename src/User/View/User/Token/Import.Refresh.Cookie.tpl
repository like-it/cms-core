{script('module')}
    import {$ldelim} user {$rdelim} from "/Module/User/Js/User.js";
    user.data('user.refresh.token', "{cookie('user.refresh.token')}");
{/script}
{import('Refresh.Token.js', 'User')}
