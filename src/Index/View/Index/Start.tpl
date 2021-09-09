{require($controller.dir.view + $controller.title + '/Init.tpl')}
{if(cookie('user.token'))}
    {require( $controller.dir.view + 'User/Token/Import.Cookie.tpl')}
    {import('Start.css')}
    {import('Debug.css', 'Debug')}
{elseif(cookie('user.refresh.token'))}
    /*
    {script('ready')}
    _('user').collection('route.backend.url', null);
    _('user').collection('route.frontend.url', "{route.get(route.prefix() + '-start')}");
    {/script}
    {require( $controller.dir.view + 'User/Token/Import.Refresh.Cookie.tpl')}
    {import('Start.css')}
    {import('Debug.css', 'Debug')}
    */
{else}
    {redirect(route.get(route.prefix() + '-user-login'))}
{/if}





/*
{require($controller.dir.view + $controller.title + '/Module/Main.tpl')}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{__('navbar.brand')}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{__('navbar.home')}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{__('navbar.settings')}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{__('navbar.translations')}</a>
                </li>
                /*
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                */
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="{__('navbar.search.type')}" placeholder="{__('navbar.search.placeholder')}" aria-label="{__('navbar.search.label')}" name="q">
                <button class="btn btn-outline-success" type="submit">{__('navbar.search')}</button>
            </form>
        </div>
    </div>
</nav>
*/