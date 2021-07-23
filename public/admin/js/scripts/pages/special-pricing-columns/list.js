$(document).ready( function () {

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        datatableDelete($(this));
    });

    $('.active-special-pricing-column').on('change', function (event) {
        event.preventDefault();
        statusChange($(this));
    });

    $('.add-special-pricing-column').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $('.edit-special-pricing-column').on('click',function (e){
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
