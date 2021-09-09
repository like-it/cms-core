 ready(() => {
    const refresh_token = _('user').collection('user.refresh.token');
    const title = _('user').collection('start.title');
    /*
    const route = {
        "login" : _('user').collection('route.frontend.login'),
        "start" : _('user').collection('route.frontend.start'),
        "backend" : _('user').collection('route.backend.refresh.token'),
        "frontend" : _('user').collection('route.frontend.refresh.token'),
        "backend.url" : _('user').collection('route.backend.url'),
        "frontend.url" : _('user').collection('route.frontend.url')
    };
     */

     const route = {
         core : _('user').collection('route.core.refresh.token'),
         login : _('user').collection('route.cms.core.login')
     };


    //const user_request = _('user').collection('request') ? _('user').collection('request') : {};
    if(
        refresh_token &&
        title &&
        route.core &&
        route.login
    ){
        header("Authorization", 'Bearer ' + refresh_token);
        request(route.core, null, (url, data) => {
            console.log(data);
            /*
            if(is.empty(data)){
                redirect(route.login);
            }
            else if(data === '{}'){
                redirect(route.login);
            }
            else if(!is.empty(data.error)){
                if(
                    !is.empty(data.error.authentication) &&
                    !is.empty(route.login)
                ){
                    redirect(route.login);
                }
            } else {
                if(typeof data.user === 'object'){
                    _('user').collection('user', data.user);
                }
                window.history.pushState(route.start, title, route.start);
                request(route.frontend, data, (url, response) => {
                    if(!is.empty(route['backend.url']) && !is.empty(route['frontend.url'])){
                        request(route['backend.url'], null, (url, data) => {
                            request(route['frontend.url'], data);
                        });
                    }
                    else if(!is.empty(route['backend.url'])){
                        request(route['backend.url'], null);
                    }
                    else if(!is.empty(route['frontend.url'])){
                        request(route['frontend.url'], user_request);
                    }
                });
            }
             */
        });
    }
});