import $ from 'jquery';

$(document).ready(function (){
    $('#like').click(() => {
        $('#like').css('display', 'none');
        $('ion-icon[name = "heart"]').css('display', 'block');
        $('.numbers-liked').html(+1);
    });

    $('ion-icon[name = "heart"]').click(() => {
        $('#like').css('display', 'block');
        $('ion-icon[name = "heart"]').css('display', 'none');
        $('.numbers-liked').html(0);
    });
})


$(document).ready(function () {
    $(".fa-caret-down").click(() => {
        $('#btn-logout').css('display', 'block');
        $('.fa-caret-up').css('display', 'block');
        $('.fa-caret-down').css('display', 'none');
    });

    $(".fa-caret-up").click(() => {
        $('#btn-logout').css('display', 'none');
        $('.fa-caret-up').css('display', 'none');
        $('.fa-caret-down').css('display', 'block');
    })
})

$(document).ready(function () {
    $('#btn-register').submit(() => {
        $('#alert-denger').css('display', 'none');
    })
})
