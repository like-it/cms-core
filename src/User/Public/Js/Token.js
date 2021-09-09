ready(() => {
    const token = _('user').collection('user.token');
    const title = _('user').collection('start.title');
    const route = {
      index : _('user').collection('route.cms.core.index')
    }

    //const route_backend = _('user').collection('route.backend.token');
    //const route_frontend = _('user').collection('route.frontend.token');
    //console.log(route_start);
    //console.log(route_backend);
    console.log(route);
    console.log(title);
    console.log(token);

    if(
        token &&
        title &&
        typeof route.index !== 'undefined'
    ){
        window.history.pushState(route.index, title, route.index);
        request(route.index);
        /*
        header("Authorization", 'Bearer ' + token);
        request(route_backend, null, function (url, data){
            if(typeof data.user  != 'undefined'){
                _('user').collection('user', data.user);
            }
            window.history.pushState(route_start, title, route_start);
            request(route_frontend, data);

        });
         */
    }
});