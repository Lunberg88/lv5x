;
function readMsg(val) {
    $.post('/admin/msg/read', {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'id': val.id
    })
        .done()
        .fail()
};