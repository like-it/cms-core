ready(function(){
    _('password.forgot').bind();
});

_('password.forgot').bind = () => {
    const form = select('form[name="user_password_forgot"]');
    if(form){
        form.on('submit', function(event){
            event.preventDefault();
            const data = this.data('serialize');
            this.request(data, null, (url, data) => {
                const route_success = _('user').collection('route.cms.core.password_forgot');
                console.log(route_success);
                if(
                  route_success &&
                  !is.empty(data.isSend)
                ){
                    request(route_success, data);
                }
            });
        });
    }
    const email = select('input[name="email"]');
    if(email){
        email.focus();
    }
}