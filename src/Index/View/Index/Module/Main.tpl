{script('module-ready')}
    import {$ldelim} root {$rdelim} from "/Module/Web/Js/Web.js";
    import {$ldelim} search {$rdelim} from "/Module/Search/Js/Search.js";
    import {$ldelim} version {$rdelim} from "/Module/Priya/Js/Priya.js";
    require(
        [
        root() + 'Module/Search/Css/Result.css?' + version(),
        ],
        () => {$ldelim}
        search.init();
        {$rdelim}
    );
{/script}