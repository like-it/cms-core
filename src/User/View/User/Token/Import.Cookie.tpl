{script('module')}
    import {$ldelim} user {$rdelim} from "/Module/User/Js/User.js";
    user.data('user.token', "{cookie('user.token')}");
{/script}
{import('Token.js', 'User')}