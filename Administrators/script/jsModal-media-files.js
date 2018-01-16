var modalMediafiles = function () {
    this.imgArray = [];


};
modalMediafiles.prototype = {
    insertImgToEditor: function (editorId) {
        var self = this;
        var editorElm = null;
        if (editorId === "") {
            editorElm = $('.summernote');
        } else {
            editorElm = $('#' + editorId);
        }

        for (var i = 0; i < self.imgArray.length; i++) {
            editorElm.summernote('editor.insertImage', self.imgArray[i]);
        }
        $("#moadl-gallery-list").modal('hide');
        $('.dz-image-preview').css({"background": ""});
        $(".chk").prop('checked', false);
    },
    generateUUID: function () {
        var d = new Date().getTime();
        var uuid = 'xxxx8xx4xxxy'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    }
};
var jsModalMediaFils = new modalMediafiles();
$(function () {
    Dropzone.autoDiscover = false;
    $("#dropzone").dropzone({
        url: "php/dropzone-upload.php",
        init: function () {
            var thisDropzone = this;
            $.getJSON("php/dropzone-upload.php").done(function (data) {
                if (data !== '') {
                    $.each(data, function (index, item) {
                        var mockFile = {
                            name: item.name,
                            size: item.size,
                            id: item.id
                        };
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("thumbnail", mockFile, item.path);
                    });
                    $(".dz-size").remove();
                    $(".dz-filename").remove();
                }
            });

            this.on('success', function (file, response) {
                var obj = JSON.parse(response);
                file.newName = obj.name;
                thisDropzone.removeFile(file);
                thisDropzone.createThumbnail(file);
                thisDropzone.emit("addedfile", file);
            });


            this.on("addedfile", function (file) {
                var id = null;
                if (file.id === '' || file.id === null) {
                    id = file.id;
                } else {
                    id = jsModalMediaFils.generateUUID();
                }
                var path = 'http://asthaiworks.com/file-uploads/' + (file.newName || file.name);
                var checkFile = Dropzone.createElement("<input type='checkbox' name='removefile' id='" + id + "' class='pull-left chk' data-role='div-" + id + "' value='" + path + "' >");
                file.previewElement.appendChild(checkFile);
            });
        }
    });

    $(document).on('click', '.dz-image-preview', function () {
        var chkBox = $(this).find("input");
        var id = chkBox[0].id;
        if ($("#" + id).prop('checked')) {
            $(this).css({"background": ""});
            $("#" + id).prop('checked', false);
        } else {
            $(this).css({"background": "#477cf5"});
            $("#" + id).prop('checked', true);
        }
    });

    $(document).on('click', '.chk', function () {
        var id = this.id;
        if ($("#" + id).prop('checked')) {
            $("#" + id).closest(".dz-image-preview").css({"background": "#477cf5"});
        } else {
            $("#" + id).closest(".dz-image-preview").css({"background": ""});
        }
    });
    $(document).on('click', '.btn-close', function () {
        $("#moadl-gallery-list").modal('hide');
        $('.dz-image-preview').css({"background": ""});
        $(".chk").prop('checked', false);
    });
    $(document).on('click', '.btn-insert', function () {
        jsModalMediaFils.imgArray = [];
        $(".chk:checked").each(function () {
            jsModalMediaFils.imgArray.push($(this).val());
        });

        if (jsModalMediaFils.imgArray.length > 0) {
            jsModalMediaFils.insertImgToEditor($(this).attr('data-role'));
        } else {
            alert('Please select picture for insert');
        }
    });
});