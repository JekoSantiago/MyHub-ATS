$(function () {

    $('.dashboard-flatpickr').flatpickr({
        mode: 'range',
        dateFormat: 'Y-m-d'
    });

    var tblHRUsage = $('#tbl_hr_usage').DataTable({
        autoWidth: true,
        serverSide: true,
        bInfo: false,
        bFilter: false,
        scrollX: true,
        ordering: false,
        lengthChange: false,
        pageLength: 5,
        ajax: {
            url: WebURL + '/get-usage',
            method: 'POST',
            datatype: 'json',
            data: function (data) {
                var search  = $('#filter_usage_emp').val();
                var daterange = $('#filter_usage_date').val();

                data.search    = search;
                data.daterange = daterange;
            },
            beforeSend: function () {
                $('#tbl_hr_usage > tbody').html(
                    '<tr class="odd">' +
                    '<td valign="top" colspan="7" class="dataTables_empty"><div class="text-center"><div class="spinner spinner-border"></div></div></td>' +
                    '</tr>'
                );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Processing data failed. Please report to the System Adminstator.");
            },

        },
        language: {
            emptyTable: 'No data available.',
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    return '<div class="d-flex"><img src="' + WebURL + '/assets/images/app_thumbnail.jpg" alt="contact-img" title="contact-img" class="mr-3 rounded-circle avatar-sm">'+
                           '<div><h5 class="m-0 font-weight-normal">' + row.Fullname + '</h5>' +
                           '<p class="mb-0 text-muted"><small>'  + row.EmployeeNo + '</small></p></div></div>';
                },
            },
            { data: 'Date' },
            { data: 'Total',
              className: 'text-right', },
        ],
        drawCallback: function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }

    });

    /* Filter usage button */
    $('body').on('click', '#btn_filter_usage', function () {
        
        tblHRUsage.draw();
        // tblHRUsage.ajax.reload();
    }); 

    var c3Data = $.ajax({
        url: WebURL + '/count-hiresource' ,
        type: 'GET',
        cache: false,
        beforeSend: function () {
            $("#app_source_pie").html('<div class="text-center"><div class="spinner-border avatar-lg text-primary m-2"></div></div>');
        },
        success: function (data) {

            var dataObj = JSON.parse(data);
            var count = {};
            var source = [];

            dataObj.forEach(function(e) {
                source.push(e.HireSource);
                count[e.HireSource] = e.Count;
            })

            var colors = [ 
                "#a32858", 
                "#fcef8d", 
                "#0c2e44", 
                "#47998e", 
                "#6871d1", 
                "#963dbf", 
                "#cc425e", 
                "#bdf767", 
                "#6ab2b7", 
                "#5c46bf", 
                "#b441cc", 
                "#f9cd8e", 
                "#1e6f50", 
                "#6d9cf9", 
                "#7d2da0", 
                "#5ac54f"];
        
            c3.generate({
                bindto: '#app_source_pie',
                data: {
                    json: [ count ],
                    keys: { value: source },
                    type: 'pie'
                },
                color: {
                    pattern: colors
                },
                pie: {
                    label: {
                        show: false
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    format: {
                      value: function (value, ratio, id, index) { return value; }
                    }
                  }
            });
        },
        error: function () {
            console.log('error');
        }
    });

})