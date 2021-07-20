$(document).ready( function () {
    getData(BASE_URL + '/admin/clients?page=1');
    generateDatatable($('#archive-list-datatable'));
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });
    $(document).on('click', '.delete-confirm', function (e) {
        event.preventDefault();
        datatableDelete($(this));
    });
});

function getData(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            $("#home").html(data);
        }
    });
}