{script('module')}
import {$ldelim} search {$rdelim} from "/Search/Js/Search.js";
require(
[
root() + 'Search/Css/Result.css?' + version(),
],
function(){$ldelim}
language("{language()}");
translation.import({export.translation('json-line')});
{$rdelim});
{/script}