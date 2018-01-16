
$(document).ready(function () {
    var getLanguage = $('#set-language').val();
    $('#modal-success').modal('hide');
    $("#btn-tb-com").click(function () {
        window.location = 'about-page.php?tab_status=tb-com-pro&language=' + getLanguage;
    });
    $("#btn-tb-What-fishmeal").click(function () {
        window.location = 'about-page.php?tab_status=tb-What-fishmeal&language=' + getLanguage;
    });

    $("#btn-tb-team").click(function () {
        window.location = 'about-page.php?tab_status=tb-team&language=' + getLanguage;
    });

    $("#btn-tb-Organisation").click(function () {
        window.location = 'about-page.php?tab_status=tb-Organisation&language=' + getLanguage;
    });
    $('form.frm-content').on('submit', function (e) {
        e.preventDefault();
        $("#status-action").html("");
        $("#status-action").html("<b>Please wait...</b>");
        var dataFormtextEdit = $('.summernote').summernote('code').replace(/<p><\/p>/g, "");
        var action = $('#action').val();
        var language = $('#set-language').val();
        var editor = $(".summernote");
        var content_ID = editor.attr('data-content-id');
        var currentTab = editor.attr('data-current-tab');
        var current_page = editor.attr('data-current-page');
        var content_tab_id = editor.attr('data-conten-tab-id');
        $.ajax({
            url: 'php/acction.about.php',
            type: 'POST',
            datdType: 'JSON',
            data: {dataFormtextEdit: dataFormtextEdit,
                action: action, language: language,
                content_ID: content_ID, current_page: current_page, currentTab: currentTab, content_tab_id: content_tab_id
            },
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
    var tab_status = $('#about').attr('data-role');
    window.location = 'about-page.php?language=' + language + '&tab_status=' + tab_status;
}




