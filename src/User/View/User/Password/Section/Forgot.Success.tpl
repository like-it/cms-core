{$request.target = '.user-password-forgot'}
{$request.method = 'replace'}
<div class="success">
    <p class="text">{parse.string(__('user.password.forgot.success'))}</p>
</div>
/*
{mail.prepare('user.password.forgot')}
*/
{priya.redirect(route.get(route.prefix() + '-start'), 5000)}
