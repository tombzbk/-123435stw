$(document).ready(function() {
  $('#summernote1').summernote({
    toolbar: [
      ['style', ['style']], // no style button
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['gallery', 'link', 'video']], // no insert buttons 'picture'
      ['table', ['table']], // no table button
      ['view', ['codeview']],
      ['help', ['help']] //no help button
    ],
    height: 400,
    focus: true,
    enterHtml: '<p>&nbsp;</p>'
  });


  $('#summernote2').summernote({
    toolbar: [
      ['style', ['style']], // no style button
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['gallery', 'link', 'video']], // no insert buttons
      ['table', ['table']], // no table button
      ['view', ['codeview']],
      ['help', ['help']] //no help button
    ],
    height: 400,
    focus: true,
    enterHtml: '<p>&nbsp;</p>'
  });
});
