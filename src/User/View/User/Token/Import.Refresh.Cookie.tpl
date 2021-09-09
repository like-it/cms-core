{script('ready')}
    _('user').collection('user.refresh.token', "{cookie('user.refresh.token')}");
{/script}
{import('Refresh.Token.js', 'User')}
