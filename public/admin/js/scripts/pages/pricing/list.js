$(document).ready( function () {

    getList(BASE_URL + '/admin/pricing?page=1');
    generateDatatable($('#archive-list-datatable'));

    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getList(url);
    });

    $(document).on('click', '.delete-confirm', function (e) {
        event.preventDefault();
        datatableDelete($(this));
    });

    $('.price').inputmask({
        alias: 'numeric',
        allowMinus: false,
        digits: 2,
        max: 99999.99
    });

    $('.brokerage').inputmask({
        alias: 'percentage',
        removeMaskOnSubmit: true
    });

    $(document).on('click', '.active-pricing', function (e) {
        event.preventDefault();
        statusChange($(this));
    });

    $(document).on('click', '.add-pricing', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $(document).on('click', '.edit-pricing', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $(document).on("click",'.pricing-modal-submit',function(e){
        e.preventDefault();

        $("#validate-form").validate({
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parent());
            }
        });

        if($('#validate-form').valid()) {
            var form = $(this).closest("form");
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (data) {
                    getList(BASE_URL + '/admin/pricing?page=1');
                    $('#inlineForm').modal('hide');
                }
            });
        }
    });
});

function getList(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            $("#home").html(data);
        }
    });
}


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
