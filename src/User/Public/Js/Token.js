ready(() => {
    const token = _('user').collection('user.token');
    const title = _('user').collection('start.title');
    const route_start = _('user').collection('route.frontend.start');
    const route_backend = _('user').collection('route.backend.token');
    const route_frontend = _('user').collection('route.frontend.token');
    console.log(route_start);
    console.log(route_backend);
    console.log(route_frontend);
    console.log(title);
    console.log(token);

    if(
        token &&
        title &&
        route_start &&
        route_backend &&
        route_frontend
    ){
        header("Authorization", 'Bearer ' + token);
        request(route_backend, null, function (url, data){
            if(typeof data.user  != 'undefined'){
                _('user').collection('user', data.user);
            }
            window.history.pushState(route_start, title, route_start);
            request(route_frontend, data);

        });
    }
});