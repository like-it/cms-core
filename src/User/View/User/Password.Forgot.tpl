{require($controller.dir.view + $controller.title + '/Init.tpl')}
{if($request.node.email)}
    {require($controller.dir.view + $controller.title + '/Password/Section/Forgot.Success.tpl')}
{else}
    {require($controller.dir.view + $controller.title + '/Password/Section/Forgot.tpl')}
{/if}
