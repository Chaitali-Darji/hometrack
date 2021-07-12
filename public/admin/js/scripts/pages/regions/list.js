$(document).ready( function () {
    
    generateDatatable($('#regions-datatable'));

    generateDatatable($('#archive-list-datatable'));
    
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });

    $('.active-region').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});