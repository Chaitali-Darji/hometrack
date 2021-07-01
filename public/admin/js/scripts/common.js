$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     toastr.options = {
      "closeButton": true,
      "newestOnTop": true,
      "positionClass": "toast-top-right"
    };

    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $($.fn.dataTable.tables( true ) ).css('width', '100%');
        $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
        $($.fn.dataTable.tables( true ) ).ajax.reload();
    } ); 

    $('.restore').on('click', function (event) {
        event.preventDefault();
        restoreData($(this));
    });

    new Dropzone("div.dropzone", { url: "/file/post"});
});

function datatableDelete($this) {
    const url = $this.attr('href');
    const userid = $this.attr('userid');
    const td = $this.parent().parent();
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#39da8a',
    }).then(function(value) {
        if (value) {
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "id": userid
                },
                success: function (data) {
                    if (data['status'] == 'success') {
                         window.location.reload();
                    } else {
                        toastr.error(data['message']);
                    }
                },
                error: function (data) {
                    toastr.error(data);
                }
            });
        }
    });
}

function statusChange($this) {

    const userurl = $this.attr('data-url');
    const userID = $this.attr('data-userid');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be enabled/disabled!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#39da8a',
    }).then(function(value) {
        if (value) {
            $.ajax({
                url: userurl,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "id": userID
                },
                success: function (data) {
                    console.log(data);
                    if (data['status'] == 'success') {
                        toastr.success(data['message']);
                    } else {
                        toastr.error(data['message']);
                    }
                },
                error: function (data) {
                    toastr.error(data);
                }
            });
        }
        else{
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
    }).then(function(value) {
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
                    console.log(data);
                    if (data['status'] == 'success') {
                        window.location.reload();
                    } else {
                        toastr.error(data['message']);
                    }
                },
                error: function (data) {
                    toastr.error(data);
                }
            });
        }
        else{
            return false;
        }
    });
}


function generateDatatable($this){
    $this.DataTable({
        responsive: !0,
        columnDefs: [ {
            orderable: !1,
            targets: [ 3 ]
        } ]
    });
}