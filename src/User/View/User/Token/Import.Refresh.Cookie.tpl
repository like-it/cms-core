{script('ready')}
    _('user').collection('user.refresh.token', "{cookie('user.refresh.token')}");
    _('user').collection('start.title', "Start");
    _('user').collection('route.core.refresh.token', "{server.url('core')}User/Refresh/Token/");
    _('user').collection('route.cms.core.login', "{route.get(route.prefix() + '-user-login')}");
{/script}
{import('Refresh.Token.js', 'User')}
