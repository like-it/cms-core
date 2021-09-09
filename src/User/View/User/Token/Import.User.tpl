{script('ready')}
     _('user').collection('route.core.current', "{server.url('core')}User/Current/");
     _('user').collection('user.token', 'test');
    const token = _('user').collection('user.token');
    const refresh_token = _('user').collection('user.refresh.token');
    const url = _('user').collection('route.core.current');
    header("Authorization", 'Bearer ' + token);
    request(url, null, (url, data) => {$ldelim}
        if(!is.empty(data.user)){$ldelim}
          data.user.refresh = {$ldelim}{$rdelim};
          data.user.refresh.token = refresh_token;
          _('user').collection('user', data.user);
        {$rdelim} else {$ldelim}
        {$rdelim}
    {$rdelim});
{/script}