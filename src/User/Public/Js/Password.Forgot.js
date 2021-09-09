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
                const route_success = priya.collection('route.frontend.password_forgot');
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