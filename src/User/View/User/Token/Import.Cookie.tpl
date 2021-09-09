{script('ready')}
    _('user').collection('user.token', "{cookie('user.token')}");
    _('user').collection('user.refresh.token', "{cookie('user.refresh.token')}");
{/script}
{import('Token.js', 'User')}