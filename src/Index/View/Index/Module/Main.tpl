{script('module')}
ready(() => {$ldelim}
    import {$ldelim} root {$rdelim} from "/Module/Web/Js/Web.js";
    import {$ldelim} search {$rdelim} from "/Module/Search/Js/Search.js";
    import {$ldelim} version {$rdelim} from "/Module/Priya/Js/Priya.js";
    require(
    [
    root() + 'Search/Css/Result.css?' + version(),
    ],
    function(){$ldelim}
    //language("{language()}");
    //translation.import({export.translation('json-line')});
    search.init();
    {$rdelim});
{$rdelim});
{/script}