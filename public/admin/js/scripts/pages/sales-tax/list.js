$(document).ready( function () {
    
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });


    $('.active-salestax').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });
});