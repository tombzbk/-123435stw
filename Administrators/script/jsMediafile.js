mediaFiles = function () {
    this.chkArray = [];
    this.idArray = [];
};
mediaFiles.prototype = {
    loadAllFiles: function () {
        $.get("php/read-mediafile.php", function (res) {
            $("#list-media").html(res);
        });
    },
    getArray: function () {
        var self = this;
        self.ajaxRemoves(self.chkArray, self.idArray);
    },
    ajaxRemoves: function (file, elmid) {
        var self = this;
        $.get("php/remove-mediafile.php", {filse: file, id: elmid}, function (res) {
            if (res) {
                var obj = JSON.parse(res);
                if (obj.status) {
                    if (obj.lemId !== "") {
                        $(".chk-media:checked").each(function () {
                            var li = $(this).attr("data-id");
                            $('#' + li).remove();
                        });
                    }
                    self.chkArray = [];
                    self.idArray = [];
                }
            }
        });
    }
};
var jsMediaFiles = new mediaFiles();
$(function () {
    jsMediaFiles.loadAllFiles();
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {
        url: "php/dropzone-upload.php",
        init: function () {
            var _this = this;
            this.on('complete', function (file) {
                setTimeout(function () {
                    _this.removeFile(file);
                    jsMediaFiles.loadAllFiles();
                }, 1000);
            });
        }
    });
    $(document).on("click", ".box-img", function (event) {
        var id = $(this).attr('data-id');
        if ($("#" + id).prop('checked')) {
            $(this).removeClass('active-media');
            $("#" + id).prop('checked', false);
        } else {
            $(this).addClass('active-media');
            $("#" + id).prop('checked', true);
        }
    });
    $(document).on("click", ".btn-remove", function () {
        jsMediaFiles.chkArray = [];
        jsMediaFiles.idArray = [];
        $(".chk-media:checked").each(function () {
            jsMediaFiles.chkArray.push($(this).val());
            jsMediaFiles.idArray.push($(this).attr('data-id'));
        });
        if (jsMediaFiles.chkArray.length > 0) {
            var result = confirm("Want to delete?");
            if (result) {
                jsMediaFiles.getArray();
            }
        }

    });
});


       