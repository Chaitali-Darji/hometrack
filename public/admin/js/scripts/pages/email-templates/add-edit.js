$(function () {
    unlayer.init({
      id: 'editor-container',
        displayMode: "web",
    });
    if ($('#email_template_body_json').val()) {

        unlayer.loadDesign(jQuery.parseJSON($('#email_template_body_json').val()));
    }
    unlayer.addEventListener('design:updated', function(data) {
      unlayer.exportHtml(function(data) {
        $('#email_template_body').val(data.html);
        $('#email_template_body_json').val(JSON.stringify(data.design));
      })
    })
});