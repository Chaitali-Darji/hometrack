$(document).ready( function () {

    generateDatatable($('#clients-list-datatable'));

    generateDatatable($('#archive-list-datatable'));

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });
});