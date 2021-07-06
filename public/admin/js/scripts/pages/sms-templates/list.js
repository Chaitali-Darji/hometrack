$(document).ready( function () {
    
    generateDatatable($('#sms_templates-datatable'));
    
    $(".edit_review").click(function () {
        $("#review_id").val($(this).data('id'))
        $("#review_title").val($(this).data('body'))
        $("#review_type").html($(this).data('title'))
        $("#reviewModal").modal('show');
    });

    $("#reminder").click(function () {
        $("#reminderForm").toggle();
    });

    $(".send_sms").click(function () {
        $("#reviewSmsForm")[0].reset();
        $("#sms_review_id").val($(this).data('id'));
        $("#sendSmsModal").modal('show');
    });
});