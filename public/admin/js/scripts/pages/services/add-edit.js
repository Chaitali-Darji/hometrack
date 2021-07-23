$(document).ready( function () {
    $('.add-region').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $('.add-service-type').on('click',function (e){
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    $(document).on("click",'.modal-submit',function(e){
        e.preventDefault();
        var form = $(this).closest("form");
        var url = form.attr('action');
        var region_list_url = $(this).attr('region-url');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                getRegions(region_list_url);
                $('#inlineForm').modal('hide');
            }
        });
    });

    $(document).on("click",'.service-type-modal-submit',function(e){
        e.preventDefault();
        var form = $(this).closest("form");
        var url = form.attr('action');
        var service_list_url = $(this).attr('service-type-url');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                getServiceTypes(service_list_url);
                $('#inlineForm').modal('hide');
            }
        });
    });

    /*
      Define the adapter so that it's reusable
*/
    $.fn.select2.amd.define('select2/selectAllAdapter', [
        'select2/utils',
        'select2/dropdown',
        'select2/dropdown/attachBody'
    ], function (Utils, Dropdown, AttachBody) {

        function SelectAll() { }
        SelectAll.prototype.render = function (decorated) {
            var self = this,
                $rendered = decorated.call(this),
                $selectAll = $(
                    '<button class="btn btn-xs btn-hena" type="button" style="margin-left:6px;"><i class="fa fa-check-square-o"></i> Select All</button>'
                ),
                $unselectAll = $(
                    '<button class="btn btn-xs btn-dark" type="button" style="margin-left:6px;"><i class="fa fa-square-o"></i> Unselect All</button>'
                ),
                $btnContainer = $('<div style="margin-top:3px;">').append($selectAll).append($unselectAll);
            if (!this.$element.prop("multiple")) {
                return $rendered;
            }
            $rendered.find('.select2-dropdown').prepend($btnContainer);
            $selectAll.on('click', function (e) {
                var $results = $rendered.find('.select2-results__option[aria-selected=false]');

                $results.each(function () {
                    self.trigger('select', {
                        data: $(this).data('data')
                    });
                });
                self.trigger('close');
            });
            $unselectAll.on('click', function (e) {
                var $results = $rendered.find('.select2-results__option[aria-selected=true]');
                $results.each(function () {
                    self.trigger('unselect', {
                        data: $(this).data('data')
                    });
                });
                self.trigger('close');
            });
            return $rendered;
        };

        return Utils.Decorate(
            Utils.Decorate(
                Dropdown,
                AttachBody
            ),
            SelectAll
        );

    });

    $('#parent_filter_select2').select2({
        placeholder: 'Select Region',
        dropdownAdapter: $.fn.select2.amd.require('select2/selectAllAdapter')
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

function getRegions(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            $(".dynamic-regions").html(data);
            $('#parent_filter_select2').select2({
                placeholder: 'Select Region',
                dropdownAdapter: $.fn.select2.amd.require('select2/selectAllAdapter')
            });
        }
    });
}

function getServiceTypes(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            $(".dynamic-service-types").html(data);
        }
    });
}
