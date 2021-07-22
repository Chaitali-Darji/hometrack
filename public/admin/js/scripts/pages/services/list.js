$(document).ready( function () {
    getData(BASE_URL + '/admin/services?page=1');
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
            dragula([document.getElementById("basic-list-group")]).on('drop', function(el, container ){
                var Lists = $(container).find('.list');
                var reOrder = [];
                $.each( Lists, function( key, value ) {
                    reOrder.push($(value).attr('service-id'));
                });
                updateOrder(reOrder);
            });
        }
    });
}

function updateOrder(reOrder){

    $.ajax({
        type: "POST",
        url: BASE_URL+'/admin/services/update-order',
        data: { service_order: reOrder },
        success: function(data)
        {
            toastr.success(data.message, toptions);
        }
    });
}

