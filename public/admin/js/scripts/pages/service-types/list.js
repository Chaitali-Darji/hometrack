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

    $('.add-service-type').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $('.edit-service-type').on('click',function (e){
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
