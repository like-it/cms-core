{if(config('framework.environment') == 'development')}
    {cookie('user.token', null, [
    'expires' => 0,
    'path' => '/',
    'domain' => $host.subdomain + '.' + $host.domain + '.' + $host.extension,
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
    ])}
{elseif(config('framework.environment') == 'staging')}
    {cookie('user.token', null, [
    'expires' => 0,
    'path' => '/',
    'domain' => $host.subdomain + '.' + $host.domain + '.' + $host.extension,
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
    ])}
{else}
    {cookie('user.token', null, [
    'expires' => 0,
    'path' => '/',
    'domain' => $host.subdomain + '.' + $host.domain + '.' + $host.extension,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
    ])}
{/if}