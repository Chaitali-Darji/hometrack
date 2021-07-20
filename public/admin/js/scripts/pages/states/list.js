$(document).ready( function () {
    
    generateDatatable($('#states-datatable'));

    generateDatatable($('#archive-list-datatable'));
    

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-state').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});