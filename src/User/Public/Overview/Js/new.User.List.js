_('user.list').main = (id) => {
    const section = _('user.overiew').getSection(id);
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
    const route = {
        backend: _('user.overview').collection('route.backend.user.list'),
        frontend: _('user.overview').collection('route.frontend.user.list')
    };
}