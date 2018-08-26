; const url = 'http://rii/openings/';

$("#more-openings").on("hide.bs.collapse", function(){
    $("button#more").html('<span class="fa fa-chevron-down"></span> show more');
});
$("#more-openings").on("show.bs.collapse", function(){
    $("button#more").html('<span class="fa fa-chevron-up"></span> hide list');
});

function applyNow(val) {
    $.post(url + 'apply_opening', {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'id': val.id
    })
    .done(function(data) {
        $('button[uid="op-'+ val.id +'"]').removeClass('btn-warning').addClass('btn-success').text('Applied') + (data.success ? toastr.success(data.success) : toastr.error(data.error));
    })
    .fail({

    })
};

function showRegisterForm() {
    window.location.href = '/login';
};
