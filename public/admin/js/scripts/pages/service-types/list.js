$(document).ready( function () {

    generateDatatable($('#service-types-datatable'));

    generateDatatable($('#archive-list-datatable'));


    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-service_type').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});
