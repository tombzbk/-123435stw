$('.add-gallery').on('click', function () {


    $('.box-gallery').show(300);


});


$('.close-gallery').on('click', function () {


    $('#gallery_name').val('');


    $('.box-gallery').hide(300);


});


function dosubmit_gal() {


    if ($('#gallery_name').val() == '') {


        $('#gallery_name').focus();


        return false;


    } else {


        return true;


    }


}


$('.btn-all').click(function () {


    var h_count = $('#h_count').val();


    check_all(h_count);


});


$('.del-gallery').on('click', function () {


    var jumarray = $('#h_count').val();


    implode_kategori(jumarray);


});


function check_all(jumarray) {


    var str = $("#Check-All").html().trim();





    if (str == '<i class="fa fa-check-square-o"></i> Check All') {


        for (var i = 0; i < jumarray; i++) {


            $('.check').iCheck('check');


        }


        $("#Check-All").html('<i class="fa fa-check-square-o"></i> Uncheck All');


    }


    else {


        for (var i = 0; i < jumarray; i++) {


            $('.check').iCheck('uncheck');


        }


        $("#Check-All").html('<i class="fa fa-check-square-o"></i> Check All');


    }


}


function implode_kategori(jumarray) {


    var array = [];


    var n = 0;


    if (jumarray != "") {


        for (var i = 1; i <= jumarray; ++i) {


            check_name = 'chk_' + i;


            if (document.getElementById(check_name).checked == true) {


                array[n] = document.getElementById(check_name).value;


                n = n + 1;


            }


        }


        var kat_join = array.join();


        del_gallery(kat_join);


    }


}


function del_gallery(gallery) {


    if (confirm("Confirm delete\r\n Are you sure?")) {


        $.ajax({


            url: 'php/del.gallery.class.php',


            type: 'POST',


            data: { id_gallery: gallery },


            success: function (res) {


                window.location = 'dashboard.php?gpage=gallery';


            }


        });


    }


}





function updataCaption(calleryID, sVal) {


    $.ajax({


        url: 'php/action.caption.gallery.php',


        type: 'POST',


        data: { id_gallery: calleryID, values: sVal },


        success: function (res) {





        }


    });


}








$(function () {


    $("ul.gallery").sortable({


        items: "li",


        cursor: 'move',


        opacity: 0.6,


        update: function () {


            sendOrderToServer();


        }


    });


});


function sendOrderToServer() {


    var sortOrder = [];


    var order = $("ul.gallery").sortable("serialize");


    $("ul.gallery").children('li').each(function () {


        sortOrder.push($(this)[0].id);


    });


    var sortid = sortOrder.join(',');


    console.log(sortid);


    var sendOrder = { action: "sort", sortid: sortid }


    $.ajax({


        type: "POST",


        dataType: "json",


        url: "php/acction.gallery.class.php",


        data: sendOrder,


        success: function (response) {





        }





    });


}