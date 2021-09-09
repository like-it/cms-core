{script('ready')}
    _('user').collection('user.token', "{cookie('user.token')}");
{/script}
{import('Token.js', 'User')}