$(document).ready( function () {
    generateDatatable($('#roles-datatable'));
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-role').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});