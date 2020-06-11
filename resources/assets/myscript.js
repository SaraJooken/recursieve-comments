$(document).ready(function () {
    $('.thread, .less, .allClose').hide();
    $('.more, .less').click(function () {
        var dit = $(this).parent();
        $(dit).children().fadeToggle();
    })
    $('.all').click(function () {
        $('.more, .all').hide();
        $('.allClose, .thread, .less').show();
    })
    $('.allClose').click(function () {
        $('.more, .all').show();
        $('.allClose, .thread, .less').hide();
    })
})


/*$(document).ready(function(){
    $('.allClose').hide();

    $('.all').click(function () {
        /!*$("<div class=\"more\">@include('includes.replies',['comments'=>$comment->replies])</div>").replaceAll('.less');*!/
        $('.all, .allClose').fadeToggle();
    })
    $('.allClose').click(function () {
        /!*$("<div class=\"less\"></div>").replaceAll('.more');*!/
        $('.all, .allClose').fadeToggle();
    })
})*/
