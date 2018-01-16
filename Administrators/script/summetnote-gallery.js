(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory(require('jquery'));
    } else {
        factory(window.jQuery);
    }
}(function ($) {
    $.extend(true, $.summernote.lang, {
        'en-US': {
            gallery: {
                label: 'Gallery'
            }
        }
    });
    $.extend($.summernote.plugins, {
        'gallery': function (context) {
            var self = this;
            var ui = $.summernote.ui;
            var $editor = context.layoutInfo.editor;
            var options = context.options;
            var lang = options.langInfo;
            // add print button
            context.memo('button.gallery', function () {
                // create button
                var button = ui.button({
                    contents: '<i class="fa fa-file-image-o" aria-hidden="true"></i> ' + lang.gallery.label,
                    tooltip: lang.gallery.label,
                    click: function () {
                        $("#moadl-gallery-list").modal({backdrop: 'static', keyboard: false});
                        if ($(".summernote").length === 2) {
                            $(".btn-insert").attr('data-role', $editor[0].previousSibling.id);
                        }else{
                            $(".btn-insert").attr('data-role', '');
                        }
                    }
                });
                // create jQuery object from button instance.
                var $gallery = button.render();
                return $gallery;
            });
            this.initialize = function () {
                var $container = options.dialogsInBody ? $(document.body) : $editor;

            };
            this.destroy = function () {
                // this.$printframe.remove();
                //this.$printframe = null;
            };
        }
    });
}));

