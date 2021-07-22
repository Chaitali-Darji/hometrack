$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".dtable").DataTable({
        "pageLength": DATA_LIMIT,
        responsive: !0,
        language: {
            paginate: {
                next: '›',
                previous: '‹'
            }
        },
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            modifier: {
                                columns: ":visible"
                            },
                            columns: "thead th:not(th:last-child)"
                        }
                    },
                    {
                        extend: "copyHtml5",
                        exportOptions:
                            {
                                columns: "thead th:not(th:last-child)"
                            }
                    },
                    {
                        extend: "pdfHtml5",
                        exportOptions:
                            {
                                columns: "thead th:not(th:last-child)"
                            }
                    },
                    {
                        text: "JSON",
                        action: function (a, o, t, r) {
                            var e = o.buttons.exportData();
                            $.fn.dataTable.fileSave(new Blob([JSON.stringify(e)]), "Export.json")
                        },
                        exportOptions:
                            {
                                columns: "thead th:not(th:last-child)"
                            }
                    },
                    {
                        extend: "print",
                        exportOptions:
                            {
                                columns: "thead th:not(th:last-child)"
                            }
                    }
                ]
            }
        ]
    });
    $.validator.addMethod("noSpace", function (value, element) {
        return value == '' || value.trim().length != 0;
    }, "Only space is not allowed");

    $(document).on("click",'button[type="submit"]',function(e){
        $("#validate-form").validate({
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parent());
            }
        });
    });


    var toptions = toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    /* $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
         $($.fn.dataTable.tables( true ) ).css('width', '100%');
         $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
         $($.fn.dataTable.tables( true ) ).ajax.reload();
     } );*/

    $('.restore').on('click', function (event) {
        event.preventDefault();
        restoreData($(this));
    });
});

function datatableDelete($this) {
    const url = $this.attr('href');
    const userid = $this.attr('userid');
    const td = $this.parent().parent();
    swal({
        title: 'Are you sure?',
        text: 'This record will be archived! You can still restore it!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#39da8a',
    }).then(function (value) {
        if (value) {
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "id": userid
                },
                success: function (data) {
                    if (data.status == 'success') {
                        td.remove();
                        toastr.success(data.message, toptions);
                        setTimeout(function () {
                            location.reload()
                        }, 800)
                    } else {
                        toastr.error(data.message, toptions);
                    }
                },
                error: function (data) {
                    toastr.error(data, toptions);
                }
            });
        }
    });
}

function statusChange($this) {

    const userurl = $this.attr('data-url');
    const userID = $this.attr('data-userid');
    const checked = $this.is(":checked");
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be ' + ((checked) ? 'enabled' : 'disabled'),
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#39da8a',
    }).then(function (value) {
        if (value) {
            $.ajax({
                url: userurl,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "id": userID
                },
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success(data.message, toptions);
                    } else {
                        toastr.error(data.message, toptions);
                    }
                },
                error: function (data) {
                    toastr.error(data, toptions);
                }
            });
        }
        else {
            $this.prop('checked', !checked);
            return false;
        }
    });
}


function restoreData($this) {

    const userurl = $this.attr('href');
    const userID = $this.attr('data-archiveid');
    const modelName = $this.attr('data-model');
    const td = $this.parent().parent();

    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be restored!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#39da8a',
    }).then(function (value) {
        if (value) {
            $.ajax({
                url: userurl,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "id": userID,
                    "model": modelName
                },
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success(data.message, toptions);
                        setTimeout(function () {
                            location.reload()
                        }, 800)
                    } else {
                        toastr.error(data.message, toptions);
                    }
                },
                error: function (data) {
                    toastr.error(data.message, toptions);
                }
            });
        }
        else {
            return false;
        }
    });
}


function generateDatatable() {


}
