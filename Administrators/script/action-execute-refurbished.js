var host = $("body").data("host");
var refurbished = function () {

    var self = this;
    this.id = "";
    this.sort = $("#_sort");
    this.action = "add";
    this.txtHeader = $("#txt-header");
    this.cover = $("#cover-picture");
    this.img1 = $("#img-1");
    this.img2 = $("#img-2");
    this._type = $("#_type");
    this.coverView = $("#cover-view");
    this.imgView1 = $("#img-1-view");
    this.imgView2 = $("#img-2-view");
    this.guid = function () {
        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
        }
        return s4() + s4() + s4();
    };
    this.saveData = function () {
        $('#modal-success').modal('show');
        $("#status-action").html("");
        $("#status-action").html("<b>Please wait...</b>");
        var boxEditer = $("div.tab-content").find("div.active");
        var boxTabEditer = $(boxEditer[0]);
        var summerNote = boxTabEditer.find("textarea");
        var emlEdit = $(summerNote[0])[0].id;
        var box = $(summerNote[0])[0];
        var lang = $(box).attr("data-role");
        if (this.txtHeader.val() === "") {
            alert("Please input Header..");
            this.txtHeader.focus();
            return  false;
        }
        var fileCover = this.cover.prop('files')[0];
        var img1 = this.img1.prop('files')[0];
        var img2 = this.img2.prop('files')[0];
        if (self.action === "add") {
            if (!fileCover) {
                alert("Please select file for cover picture..");
                this.cover.focus();
                return  false;
            }
            if (!img1) {
                alert("Please select file for imgae 1..");
                this.img1.focus();
                return  false;
            }
            if (!img2) {
                alert("Please select file for image 2..");
                this.img2.focus();
                return  false;
            }

        }
        var fromData = new FormData();
        fromData.append('id', this.id);
        fromData.append('sort', this.sort.val());
        fromData.append('file-cover', fileCover);
        fromData.append('img-1', img1);
        fromData.append('img-2', img2);
        fromData.append('_type', this._type.val());
        fromData.append('lang', lang);
        fromData.append('detail', $("#" + emlEdit).summernote('code').replace(/<p><\/p>/g, ""));
        fromData.append('excerpt', $("#excerpt-" + lang).val());
        fromData.append('header', this.txtHeader.val());


        var Info = $(".input-info");
        for (var i = 0; i < Info.length; i++) {
            fromData.append('info[]', $(Info[i]).val());
        }

        $.ajax({
            url: 'php/action-execute-content.php',
            type: 'POST',
            datdType: 'JSON',
            data: fromData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    window.location = "/Administrators/r-refurbished.php?_type=" + self._type.val();
                }
            }

        });
    };
    this.ApiRequest = function (url, id, lang, callback) {
        $.post(url, {id: id, _type: this._type.val(), lang: lang}, function (res) {
            callback(res);
        });
    };
    this.getDataTotext = function (id, lang, sort) {
        var self = this;
        $(".note-editable").html("");
        $.post("php/action-get-content.php", {id: id, _type: this._type.val(), lang: lang}, function (res) {
            if (res) {
                self.coverView.html("");
                self.imgView1.html("");
                self.imgView2.html("");
                self.action = "edit";
                self.id = res.objMain.id;
                self.sort.val(sort);
                self.txtHeader.val(res.objMain.header);
                var coverVire = '<img src="http://' + host + '/images/upload-files-contents/' + res.objCover.url + '"  style="width:100px;">';
                self.coverView.html(coverVire);
                var img1 = '<img src="http://' + host + '/images/upload-files-contents/' + res.objImg1.url + '"  style="width:100px;">';
                self.imgView1.html(img1);
                var img2 = '<img src="http://' + host + '/images/upload-files-contents/' + res.objImg2.url + '"  style="width:100px;">';
                self.imgView2.html(img2);
                $("#excerpt-" + lang).val(res.objExcerpt.detail);
                $("#li-teb-EN a").click();
                if (res.info.length > 0) {
                    self.renderInfoTotext(res.info);
                } else {
                    $("#info1").val('');
                }
            }
        });
    };
    this.renderInfoTotext = function (obj) {
        var html = "";
        var BoxInfo = $(".box-lebel-info");
        BoxInfo.html("");
        var ii = 1;
        for (var i = 0; i < obj.length; i++) {
            if (ii === 1) {
                html += '' +
                        '<div class="col-md-12" style="margin-top: 1%;">' +
                        '    <div class="input-group input-group-sm">' +
                        '        <input type="text" class="form-control input-info" name="info[]" id="info' + ii + '" placeholder="lebel : text " value="' + obj[i].lebel + '">' +
                        '        <span class="input-group-btn">' +
                        '           <button type="button" class="btn btn-info btn-flat btn-add-more-info"><i class="fa fa-plus"></i></button>' +
                        '       </span>' +
                        '    </div>' +
                        '</div>';
            } else {
                html += '<div class="col-md-12" style="margin-top: 1%;">' +
                        '        <input type="text" class="form-control input-info" name="info[]" id="info' + ii + '" placeholder="lebel : text " value="' + obj[i].lebel + '">' +
                        '</div>';
            }
            ++ii;
        }
        BoxInfo.append(html);
    };
    this.loadAllContentLang = function (editorId, lang) {
        self.ApiRequest("php/action-get-content.php", self.id, lang, function (res) {
            if (res.objContent) {
                var html = "";
                if (res.objContent.detail) {
                    html = res.objContent.detail;
                } else {
                    html = "";
                }
                $('.note-editable').html("");
                $("#" + editorId).summernote("code", html);
                $("#excerpt-" + lang).val(res.objExcerpt.detail);
                replaceParagraph();
            }
        });
    };
    this.removeContent = function (id) {
        var result = confirm("Want to delete?");
        if (result) {
            self.ApiRequest("php/action-del-content.php", id, '', function (res) {

                if (res.success) {
                    window.location = "/Administrators/r-refurbished.php?_type=" + self._type.val();
                }
            });
        }
    };

    this.readURL = function (input, elmView) {
        console.log(input[0].files);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = '<img src="' + e.target.result + '" style="width:100px;">';
                $('#' + elmView).html(img);
            };
            reader.readAsDataURL(input[0].files[0]);
        }
    };
    this.sortData = function () {

    };

};
function replaceParagraph() {
    setTimeout(function () {
        $(".summernote").summernote('code').replace(/<p><\/p>/g, "");
    }, 300);

}
var jsRefurbished = new refurbished();
$(function () {
    $('#modal-success').modal('hide');
    $(".note-editable").html("");
    replaceParagraph();
    $("#list-content,#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false
    });
    $("#list-content_filter").addClass("pull-right");
    $("#list-content_paginate").css("text-align", "right");
    jsRefurbished.id = jsRefurbished.guid();
    jsRefurbished.action = "add";
    $(document).on("click", ".btn-save-content", function () {
        jsRefurbished.saveData();
    });
    $(document).on("click", ".btn-edit", function () {
        jsRefurbished.getDataTotext($(this).data("id"), 'EN', $(this).data("sort"));
    });
    $(document).on("change", ".upload-img", function () {
        jsRefurbished.readURL($(this), $(this).data("role"));
    });
    $(document).on("click", "ul.nav-tabs li a", function () {
        var boxeditId = $(this).attr("href");
        var textarea = $(boxeditId).find("textarea.summernote")[0];
        var textareaID = textarea.id
        var lang = $(textarea).attr("data-role")
        if (jsRefurbished.action === "edit") {
            jsRefurbished.loadAllContentLang(textareaID, lang);
        }
    });
    $(document).on("click", ".btn-del", function () {
        jsRefurbished.removeContent($(this).data("id"));
    });

    $(document).on("click", ".btn-add-more-info", function () {

        var inputInfo = $(".input-info");
        var html = "";
        html += '<div class="col-md-12" style="margin-top: 1%;">' +
                '        <input type="text" class="form-control input-info" name="info[]" id="info' + (++inputInfo.length) + '" placeholder="lebel : text ">' +
                '</div>';
        $(".box-lebel-info").append(html);
    });
});