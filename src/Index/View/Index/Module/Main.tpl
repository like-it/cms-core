{script('module')}
ready(() => {$ldelim}
    import {$ldelim} search {$rdelim} from "/Search/Js/Module/Search.js";
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