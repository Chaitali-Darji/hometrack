$(document).ready( function () {
    
    generateDatatable($('#states-datatable'));

    generateDatatable($('#archive-list-datatable'));
    

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-role').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});