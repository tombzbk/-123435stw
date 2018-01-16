var add_img = $('.add-img').click(function () {
    $('.frm-slider').show(300);
});
var close_img = $('.close-img').click(function () {
    $('#Caption').val('');
    $('#Image_name').val('');
    $('.frm-slider').hide(300);
});

function dosubmit_sl() {
    if (document.getElementById("Image_name").files.length === 0) {
        alert("Please selected file to upload");
        return false;
    } else {
        return true;
    }
}


function edit_slider(sliderID) {
    $("#box-image").html("");
    $('.frm-slider').show(300);
    $.ajax({
        url: 'php/slier-to-text.class.php',
        type: 'POST',
        data: {
            sliderID: sliderID,
            status_type: "F"
        },
        success: function (res) {
            if (res.data) {
                $(window).scrollTop(0);
                $("#action").val("edit");
                $('#h_id').val(res.data[0].AutoIid);
                $("#Caption_EN").val(res.data[0].Caption_EN);
                $("#Caption_TH").val(res.data[0].Caption_TH);
                $("#Caption_LA").val(res.data[0].Caption_LA);
                $("#Caption_MM").val(res.data[0].Caption_MM);
                $("#Caption_PK").val(res.data[0].Caption_PK);
                $("#Caption_SA").val(res.data[0].Caption_SA);
                $("#Caption_BD").val(res.data[0].Caption_BD);
                $("#Caption_IR").val(res.data[0].Caption_IR);
                $("#Caption_VN").val(res.data[0].Caption_VN);
                $("#Caption_ID").val(res.data[0].Caption_ID);
                var fileName = res.data[0].Image_name;
                var htmlImg = "<img src=\"../Slider/" + fileName + "\">";
                $("#box-image").html(htmlImg);
            }
        }
    });
}

function del_slider(idslider) {
    if (confirm("Confirm Delete \r\n Are you sure?")) {
        $.ajax({
            url: 'php/slier.del.class.php',
            type: 'POST',
            data: {
                idslider: idslider
            },
            success: function (res) {
                //window.location = "dashboard.php?gpage=slider";
            }
        });
    }
}
$(function () {
    $("#table-slider-f tbody").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function () {
            sendFSliderOrderToServer();
        }
    });
});

function sendFSliderOrderToServer() {
    var sortOrder = [];
    var order = $("#table-slider-f > tbody").sortable("serialize");
    $("#table-slider-f tbody").children('tr').each(function () {
        sortOrder.push($(this)[0].id);
    });
    var sortid = sortOrder.join(',');
    var sendOrder = {
        action: "sort",
        sortid: sortid
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/slider.class.php",
        data: sendOrder,
        success: function (response) {}
    });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var htnk = "<img src='" + e.target.result + "'>";
            $('#box-image').html(htnk);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $("#Image_name").change(function () {
        readURL(this);
    });
});