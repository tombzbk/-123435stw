$(document).ready(function () {
    var getLanguage = $('#set-language').val();
    $('#modal-success').modal('hide');
    $("#btn-tb-energy").click(function () {
        window.location = 'r-energy_saving.php?tab_status=r-tb-energy&language=' + getLanguage;
    });
    $("#btn-tb-Whe").click(function () {
        window.location = 'r-energy_saving.php?tab_status=r-tb-Whe&language=' + getLanguage;
    });
    $('form.frm-content').on('submit', function (e) {
        e.preventDefault();
        $("#status-action").html("");
        $("#status-action").html("<b>Please wait...</b>");
        var dataFormtextEdit = $('.summernote').summernote('code');
        var action = $('#action').val();
        var language = $('#set-language').val();
        var content_ID = $(".summernote").attr('data-role');
        var currentTab = $(".summernote").attr('data-tab');
        var current_page = $(".summernote").attr('data-current');
        var content_tab_id = $(".summernote").attr('data-tab-id');
        var urlPdf = $("#rul-pdf").val();
        var frmData = new FormData($(".frm-content")[0]);
        var fileInput = document.getElementById('file-pdf');
        var file = fileInput.files[0];
        frmData.append("file-pdf", file);
        frmData.append("dataFormtextEdit", dataFormtextEdit);
        frmData.append("action", action);
        frmData.append("language", language);
        frmData.append("content_ID", content_ID);
        frmData.append("current_page", current_page);
        frmData.append("currentTab", currentTab);
        frmData.append("content_tab_id", content_tab_id);
        frmData.append("url-Pdf", urlPdf);

        $.ajax({
            url: 'php/acction.r-energy_saving.php',
            type: 'POST',
            processData: false,
            contentType: false,
            //datdType: 'JSON',
            data: frmData,
            success: function (res) {
                $('#modal-success').modal('show');
                if (res.success == true) {
                    setTimeout(function () {
                        $("#status-action").html("<b>Success...</b>");
                        $('#modal-success').modal('hide');
                    }, 1000);
                }
            }

        });
    });
});



function changeLanguage(language) {
    var tab_status = $("#eng").attr('data-tab');
    window.location = 'r-energy_saving.php?language=' + language + '&tab_status=' + tab_status;

}
