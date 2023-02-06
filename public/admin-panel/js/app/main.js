function cancel(t, r, i, n) {
    t.preventDefault(),
    r.reset(),
    i.hide()
    n.resetForm()
    $(r).find('select').val(null).trigger('change');
}

function cancelShow(t, r, i, n) {
    t.preventDefault(),
    i.hide()
}

function clear(t, r, i, n) {
    t.preventDefault(),
    r.reset(),
    n.resetForm()
    $(r).find('select').val(null).trigger('change');
}

function someErrors() {
    ConstToast.fire({
        icon: 'error',
        title: app_some_errors
    })
}
