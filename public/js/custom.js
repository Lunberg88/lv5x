; const url = 'http://ajax-lv/openings/';

$('button#get_openings1').click(function() {
    var url = '/openings/get_openings';
   $.post(url, {
       '_token': $('meta[name="csrf-token"]').attr('content'),
       'type': $('input[type=radio]:checked').val()
   }).done(function() {})
   .fail(function(data) {
       console.log('Error message: ' + data.statusText);
   })
});

$("#more-tags").on("hide.bs.collapse", function(){
    $("div.more-tags").html('<span class="fa fa-chevron-down"></span> More');
});
$("#more-tags").on("show.bs.collapse", function(){
    $("div.more-tags").html('<span class="fa fa-chevron-up"></span> Hide');
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