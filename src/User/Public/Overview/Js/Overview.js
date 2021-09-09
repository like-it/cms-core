_('user.overview').main = (id) => {
    if(typeof _('task.bar').add === 'function'){
        _('task.bar').add('user.overview', id);
    }
    _('user.overview').bind(id);
    _('user.overview').list(id);
}

_('user.overview').bind = (id) => {
    const section = _('user.overview').getSection(id);
    if(!section){
        return;
    }
    const close = section.select('.close');
    if(close){
        close.on('click', (event) => {
            if(typeof _('task.bar').delete === 'function'){
                _('task.bar').delete(section.attribute('id'));
            }
            section.remove();
        });
    }
    const menu = section.select('.menu');
    if(!menu) {
        return;
    }
    const list = menu.select('li');
    if(!list) {
        return;
    }
    let index;
    for(index=0; index < list.length; index++){
        let item = list[index];
        item.on('click', (event) => {
            _('user.overview').hide(id, '.body');
            _('user.overview').hide(id, '.container');
            _('user.overview').hide(id, '.footer');
            _('user.overview').show(id, '.body.loading');
            _('user.overview').show(id, '.footer.loading');
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
                _('user.overview').hide(id, '.body');
                _('user.overview').hide(id, '.footer');
                _('user.overview').show(id, item.data('body'));
                _('user.overview').show(id, item.data('footer'));
                } else {
                    item.request();
                }
            }
        });
    }
}

_('user.overview').role_detail_open = (id) => {
    _('user.overview').hide(id, '.body');
    _('user.overview').hide(id, '.container');
    _('user.overview').hide(id, '.footer');
    _('user.overview').show(id, '.container.user-role-detail');
    _('user.overview').show(id, '.container.user-role-detail .body');
    _('user.overview').show(id, '.container.user-role-detail .footer');
    const section = _('user.overview').getSection(id);
    if(!section){
        return;
    }
    const cancel = section.select('.button-cancel');
    if(cancel){
        cancel.on('click', (event) => {
            const menu = section.select('.menu');
            if(!menu){
                return;
            }
            const li = menu.select('.user-role-list');
            if(li){
                li.trigger('click');
            }
        });
    }
}

_('user.overview').role_list_open = (id) => {
    _('user.overview').hide(id, '.body');
    _('user.overview').hide(id, '.container');
    _('user.overview').hide(id, '.footer');
    _('user.overview').show(id, '.body.user-role-list');
    _('user.overview').show(id, '.footer.user-role-list');
    console.log('role-list-open ' + id);
}

_('user.overview').role_list = (id) => {
    const route = {
        backend: _('user.overview').collection('route.backend.role.list'),
        frontend: _('user.overview').collection('route.frontend.role.list')
    };
    const section = _('user.overview').getSection(id);
    if(!section){
        return;
    }
    const li = section.select('.menu .user-role-list');
    if (li) {
        const has_changed = li.select('.has-changed');
        if (has_changed) {
            has_changed.html('<i class="fas fa-spinner fa-spin"></i>');
        }
    }
    const token = _('user').collection('user.token');
    if(
        route &&
        token
    ){
        header("Authorization", 'Bearer ' + token);
        request(route.backend, null, (url, data) => {
            if(
                !is.empty(data) &&
                !is.empty(data.class) &&
                data.class === 'R3m\\Io\\Exception\\ErrorException'
            ){
                exception.authorization(route.backend, route.frontend);
            }
            data.section = {
                id : id
            };
            request(route.frontend, data);
            const section = _('user.overview').getSection(id);
            if(!section){
                return;
            }
            const li = section.select('.menu .user-role-list');
            if(li) {
                const has_changed = li.select('.has-changed');
                if (has_changed) {
                    has_changed.html('');
                }
            }
        });
    }
}

_('user.overview').list_open = (id) => {
    _('user.overview').hide(id, '.body');
    _('user.overview').hide(id, '.container');
    _('user.overview').hide(id, '.footer');
    _('user.overview').show(id, '.body.user-user-list');
    _('user.overview').show(id, '.footer.user-user-list');
}

_('user.overview').list = (id) => {
    const route = {
        backend: _('user.overview').collection('route.backend.user.list'),
        frontend: _('user.overview').collection('route.frontend.user.list')
    };
    const section = _('user.overview').getSection(id);
    if(!section){
        return;
    }
    const li = section.select('.menu .user-user-list');
    if (li) {
        const has_changed = li.select('.has-changed');
        if (has_changed) {
            has_changed.html('<i class="fas fa-spinner fa-spin"></i>');
        }
    }
    const token = _('user').collection('user.token');
    if(
        route &&
        token
    ){
        header("Authorization", 'Bearer ' + token);
        request(route.backend, null, (url, data) => {
            data.section = {
                id : id
            };
            request(route.frontend, data);
            const section = _('user.overview').getSection(id);
            if(!section){
                return;
            }
            const li = section.select('.menu .user-user-list');
            if(li) {
                const has_changed = li.select('.has-changed');
                if (has_changed) {
                    has_changed.html('');
                }
            }
        });
    }
}

_('user.overview').element = (type, id) => {
    let name;
    let section;
    let menu;
    switch(type){
        case 'section' :
            name = _('user.overview').collection('section.name');
            console.log(name);
            section = select('section[name="' + name + '"]');
            if (section) {
                return section;
            }
            break;
        case 'menu' :
            section = _('user.overview').getSection(id);
            if(!section){
                return;
            }
            menu = section.select('.menu');
            if(menu){
                return menu;
            }
            break;
        default :
            console.warn('user.overview element (' + type + ') undefined...');
    }
}

_('user.overview').select = (nodeList, id) => {
    let index;
    for(index=0; index < nodeList.length; index++){
        let node = nodeList[index];
        if(typeof node.attribute === 'function'){
            if(node.attribute('id') === id){
                return node;
            }
        }
    }
}


_('user.overview').getSection = (id) => {
    let section = _('user.overview').element('section');
    if(!section){
        return;
    }
    if(is.nodeList(section)) {
        if (id) {
            section = _('user.overview').select(section, id);
            if (!section) {
                return;
            }
        }
    }
    return section;
}

_('user.overview').hide = (id, element) => {
    const section = _('user.overview').getSection(id);
    if (!section) {
        return;
    }
    const node = section.select(element);
    if(node){
        node.addClass('display-none');
    }
}

_('user.overview').show = (id, element) => {
    const section = _('user.overview').getSection(id);
    if (!section) {
        return;
    }
    const node = section.select(element);
    if(node){
        node.removeClass('display-none');
    }
}

_('user').exist = (id, element) => {
    const section = _('user.overview').getSection(id);
    if (!section) {
        return;
    }
    const node = section.select(element);
    if(node){
        return true;
    }
    return false;
}