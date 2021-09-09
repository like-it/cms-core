{script('ready')}
//_('user').collection('route.cms.core.password_forgot', "{route.get(route.prefix() + '-user-password-forgot-success')}");
console.log(_('user').collection());
{/script}
{import(
	'Password.Forgot.js'
)}
{$request = request()}
<section name="user-password-forgot">
	<h1><i class="fas fa-sign-in-alt"></i> {__('user.password.forgot.title')}</h1>
	<div class="user-password-forgot">
    	<form name="user_password_forgot" data-url="{server.url('core')}User/Password/Forgot/">
			<p class="password-forgot-text">
				{__('user.password.forgot.text')}
			</p>
        	<label><i class="fas fa-user"></i></label>
			<input type="text" name="node.email" value="{$request.node.username|default:''}" placeholder="{__('user.e-mail')}"/><br>
        	<input type="submit" value="{__('user.send')}" />
        	<span class="user-password-forgot-error"></span>
    	</form>
		<p class="version">{__('user.version')}<small>{config('version')}</small></p>
	</div>
</section>