ready(() => {
    const form = select('form[name="user_login"]');
    if(form) {
        form.on('submit', (event) => {
            event.preventDefault();
            _('login').post(event);
        });
    }
    const forgot = select('button.password-forgot');
    if(forgot){
        forgot.on('click', function(event){
            forgot.request();
        });
    }
    const email = select('input[name="node. email"]');
    if(email){
        email.focus();
    }
    _('login').loader = (type) => {
        switch (type){
            case 'start' :
                const submit = select('button[type="submit"]');
                submit.html(submit.html() + '<i class="fas fa-spinner fa-spin"></i>');
            break;
            case 'end' :
                const load = select('button[type="submit"] i');
                load.remove();
            break;
        }
    }
    _('login').post = (event) => {
        const form = event.target.closest('form');
        const data = form.data('serialize');
        //loading
        _('login').loader('start');
        form.request(data, null, (url, data) => {
            //end loading
            _('login').loader('end');
            if(
                !is.empty(data.exception) &&
                !is.empty(data.exception.message)
            ){
                if(!is.empty(data.exception.code)){
                    const code = data.exception.code;
                    switch(code){
                    case 'user-blocked' :
                        const route_blocked = _('user').collection('route.cms.core.blocked');
                        if(route_blocked){
                            setTimeout(function(){
                                request(route_blocked);
                            }, 1000);
                        }
                        break;
                    }
                }
                const error = form.select('.user-login-error');
                if(error){
                    error.html(data.exception.message);
                }
            } else if(!is.empty(data.user)){
                const route_success = _('user').collection('route.cms.core.start');
                if(route_success){
                    request(route_success, data);
                }
            }
        });
    }
});