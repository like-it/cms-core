{require($controller.dir.view + 'User/Token/Delete.Cookie.tpl')}
{require($controller.dir.view + 'User/Token/Delete.Refresh.Cookie.tpl')}
{if(content.type() == 'application/json')}
    {priya.redirect('/')}
{else}
    {redirect('/')}
{/if}