$(document).ready( function () {
    generateDatatable($('#email_templates-datatable'));
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-role').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});