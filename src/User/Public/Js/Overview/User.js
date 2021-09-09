ready(function(){
  _('user').define();
  _('user').bind();
});

_('user').define = () => {
  _('user').collection('controller', priya.collection('controller'));
  _('user').collection('route.user', priya.collection('route.user'));
}

_('user').hide = (element) => {
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const node = section.select(element);
      if(node){
        node.addClass('display-none');
      }
    }
  }
}

_('user').show = (element) => {
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const node = section.select(element);
      if(node){
        node.removeClass('display-none');
      }
    }
  }
}

_('user').exist = (element) => {
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const node = section.select(element);
      if(node){
        return true;
      }
    }
  }
  return false;
}

_('user').select = (element) => {
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const node = section.select(element);
      if(node){
        return node;
      }
    }
  }
  return false;
}

_('user').bind = () => {
  const controller = _('user').collection('controller');
  if(controller){
    const section = select('section[name="' + controller.name + '"]');
    if(section){
      const close = section.select('.close');
      if(close){
        close.on('click', (event) => {
          section.remove();
        });
      }
      const menu = section.select('.menu');
      if(menu){
        const list = menu.select('li');
        if(list){
          let index;
          for(index=0; index < list.length; index++){
            let item = list[index];
            item.on('click', (event) => {
              _('user').hide('.body');
              _('user').hide('.container');
              const list = menu.select('li');
              list.removeClass('active');
              item.addClass('active');
              const has_changed = item.select('.has-changed');
              if(has_changed){
                if(
                    has_changed.html() === '' &&
                    item.data('body')
                ){
                  //show body
                  _('user').show(item.data('body'));
                } else {
                  item.request();
                }
              }
            });
          }
        }
      }
    }
  }
}

_('user').role_list = () => {
  const route = {
    backend : _('user').collection('route.user.backend.role.list'),
    frontend : _('user').collection('route.user.frontend.role.list')
  };
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const li = section.select('.menu .user-role-list');
      if(li){
        const has_changed = li.select('.has-changed');
        if(has_changed){
          has_changed.html('<i class="fas fa-spinner fa-spin"></i>');
        }
      }
    }
  }
  const token = priya.collection('user.token');
  if(
      route &&
      token
  ){
    header("Authorization", 'Bearer ' + token);
    request(route.backend, null, (url, data) => {
      request(route.frontend, data);
      if(controller) {
        const section = select('section[name="' + controller.name + '"]');
        if (section) {
          const li = section.select('.menu .user-role-list');
          if(li) {
            const has_changed = li.select('.has-changed');
            if (has_changed) {
              has_changed.html('');
            }
          }
        }
      }
    });
  }
}

_('user').list = () => {
  const route = {
    backend : _('user').collection('route.user.backend.user.list'),
    frontend : _('user').collection('route.user.frontend.user.list')
  };
  const controller = _('user').collection('controller');
  if(controller) {
    const section = select('section[name="' + controller.name + '"]');
    if (section) {
      const li = section.select('.menu .user-user-list');
      if(li){
        const has_changed = li.select('.has-changed');
        if(has_changed){
          has_changed.html('<i class="fas fa-spinner fa-spin"></i>');
        }
      }
    }
  }
  const token = priya.collection('user.token');
  if(
      route &&
      token
  ){
    header("Authorization", 'Bearer ' + token);
    request(route.backend, null, (url, data) => {
      request(route.frontend, data);
      if(controller) {
        const section = select('section[name="' + controller.name + '"]');
        if (section) {
          const li = section.select('.menu .user-user-list');
          if(li) {
            const has_changed = li.select('.has-changed');
            if (has_changed) {
              has_changed.html('');
            }
          }
        }
      }
    });
  }
}

_('user').overview = () => {
  const route = {
    backend : _('user').collection('route.user.backend.user.list'),
    frontend : _('user').collection('route.user.frontend.overview')
  };
  const token = priya.collection('user.token');
  if(
      route &&
      token
  ){
    header("Authorization", 'Bearer ' + token);
    request(route.backend, null, (url, data) => {
      request(route.frontend, data);
    });
  }
}