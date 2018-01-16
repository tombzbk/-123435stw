$(document).ready(function () {
    $('form.frm-content').on('submit', function (e) {
        e.preventDefault();
        $("#status-action").html("");
        $("#status-action").html("<b>Please wait...</b>");
        var dataFormtextEdit = $('.summernote').summernote('code').replace(/<p><\/p>/g, "");
        var action = $('#action').val();
        var language = $('#set-language').val();
        var content_ID = $(".summernote").attr('data-role');
        var currentPage = $(".summernote").attr('data-current');
        $.ajax({
            url: 'php/acction.contact.php',
            type: 'POST',
            datdType: 'JSON',
            data: {dataFormtextEdit: dataFormtextEdit,
                action: action, language: language,
                content_ID: content_ID, currentPage: currentPage
            },
            success: function (res) {
                $('#modal-success').modal('show');
                setTimeout(function () {
                    $("#status-action").html("<b>Success...</b>");
                    $('#modal-success').modal('hide');
                }, 1000);
            }

        });
    });
});
function changeLanguage(language) {
    window.location = 'contact-page.php?language=' + language;
}