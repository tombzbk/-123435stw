var uploadFileImage = function() {
    var summerUpload = $("#summerUpload");
}
uploadFileImage.prototype = {
    sendFile: function(file, editor, welEditable) {
        var self = this;
        var data = new FormData();
        data.append("files", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "php/uploadFileImage.php",
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res) {
                    var obj = JSON.parse(res);
                    if (obj.status) {
                        editor.insertImage(welEditable, obj.url);
                    } else {
                        alert("Can't insert image to page");
                    }
                }
            }
        });
    }
}

var jsUploadFileImage = new uploadFileImage();
