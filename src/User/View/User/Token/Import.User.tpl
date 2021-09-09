{script('ready')}
     _('user').collection('route.core.current', "{server.url('core')}User/Current/");
    const token = _('user').collection('user.token');
    const url = _('user').collection('route.core.current');
    header("Authorization", 'Bearer ' + token);
    console.log(url);
    request(url, null, (url, data) => {$ldelim}
        console.log(data);
    {$rdelim});
{/script}
{import('Token.js', 'User')}