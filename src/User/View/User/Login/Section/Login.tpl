/*
{script('module')}
import {$ldelim} root {$rdelim} from "/Module/Web/Js/Web.js";
import {$ldelim} user {$rdelim} from "/Module/User/Js/User.js";
//user.data('route.core.token', "{server.url('core')}User/");
user.data('route.core.refresh.token', "{server.url('core')}User/Refresh/Token");
user.data('route.cms.core.blocked', "{route.get(route.prefix() + '-user-login-blocked')}");
user.data('route.cms.core.login', "{route.get(route.prefix() + '-user-login-blocked')}");
user.data('route.cms.core.refresh.token', "{route.get(route.prefix() + '-user-login-blocked')}");
user.data('route.cms.core.start', "{route.get(route.prefix() + '-start')}");
console.log(user.data());
{/script}
{script('ready')}
_('user').collection('route.core.refresh.token', "{server.url('core')}User/Refresh/Token/");
_('user').collection('route.cms.core.blocked', "{route.get(route.prefix() + '-user-login-blocked')}");
_('user').collection('route.cms.core.login', "{route.get(route.prefix() + '-user-login')}");
_('user').collection('route.cms.core.refresh.token', "{route.get(route.prefix() + '-user-refresh-token')}");
_('user').collection('route.cms.core.start', "{route.get(route.prefix() + '-start')}");
//_('user').collection('route.frontend.token', "{route.get(route.prefix() + '-navigation')}");
_('user').collection('start.title', "{__('start.title')}");
{/script}
{import('Start.css', 'Index')}
{import('Debug.css', 'Debug')}
{import('Login.js')}
{import('Login.css')}
{import('Password.Forgot.css')}
<section name="user-login">
	<h1><i class="fas fa-sign-in-alt"></i> {__('user.login.title')}</h1>
	<div class="user-login">
		<form
			name="user_login"
			data-url="{server.url('core')}User/Login/"
			method="POST"
		>
		    <input type="hidden" name="method" value="replace-with">
		    <input type="hidden" name="target" value="section[name='user-login']">
			<label><i class="fas fa-user""></i></label>
			<input type="text" name="node.email" value="{$request.node.email|default:''}" placeholder="{__('user.e-mail')}"/><br>
			<label><i class="fas fa-key""></i></label>
			<input type="password" name="node.password" value="{$request.node.password|default:''}" placeholder="{__('user.password')}"/><br>
			<button
			    type="submit"
			>
			    {__('user.login')}
			</button>
			<button
				type="button"
				class="password-forgot"
				data-url="{route.get(route.prefix() + '-user-password-forgot')}"
				data-target="section[name='user-login']"
				data-method="replace-with"
			>
				{__('user.password.forgot')}
			</button><br>
			<span class="user-login-error"></span>
		</form>
		<p class="version">{__('user.version')}<small>{config('version')}</small></p>
	</div>
</section>