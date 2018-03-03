; var url = 'http://ajax_lv/openings/addfav';

function addToFav(val) {

    $.post(url, {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'id': val.id
    }).done(function (data) {
        var selId = $('#' + val.id + ' > i');
        var text = $('#' + val.id + ' > small');
        selId.hasClass('fa-star') ? selId.removeClass('fa-star').addClass('fa-star-o') + toastr.error("Removed") : selId.removeClass('fa-star-o').addClass('fa-star') + toastr.success("Success");
    })
};

$('button#get_openings').click(function() {
    var url = '/openings/get_openings';
   $.post(url, {
       '_token': $('meta[name="csrf-token"]').attr('content'),
       'type': $('input[type=radio]').val()
   }).done(function(data) {
       console.log(data);
   })
});

$("#more-tags").on("hide.bs.collapse", function(){
    $("div.more-tags").html('<span class="fa fa-chevron-down"></span> More');
});
$("#more-tags").on("show.bs.collapse", function(){
    $("div.more-tags").html('<span class="fa fa-chevron-up"></span> Hide');
});