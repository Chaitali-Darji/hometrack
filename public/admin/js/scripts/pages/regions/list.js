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

    $('.add-region').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $('.edit-region').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });
});

function getData(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            $("#inlineForm").html(data);
            $('#inlineForm').modal('show');
        }
    });
}
