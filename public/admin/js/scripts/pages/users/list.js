$(document).ready( function () {

    generateDatatable($('#users-list-datatable'));

    generateDatatable($('#archive-list-datatable'));
    

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-user').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
} );