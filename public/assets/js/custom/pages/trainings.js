$(function () {

    var filterTrainDateRange = $('.trainings-flatpickr').flatpickr({
        mode: 'range',
        dateFormat: 'Y-m-d',
    });

    var tblAllTrainings = $('#tbl_all_trainings').DataTable({
        autoWidth: true,
        serverSide: true,
        bInfo: false,
        bFilter: false,
        scrollX: true,
        ordering: false,
        lengthChange: false,
        ajax: {
            url: WebURL + '/get-all-trainings',
            method: 'POST',
            datatype: 'json',
            data: function (data) {
                var program = $('#filter_trainings_program').val();
                var daterange = $('#filter_trainings_date').val();

                data.program = program;
                data.daterange = daterange;
            },
            beforeSend: function () {
                $('#tbl_all_trainings > tbody').html(
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
                    return ' <a href="javascript: void(0);" data-progid="' + row.Program_ID + '" data-toggle="modal" data-target="#modal_enrolled_applicants" class="action-icon text-primary"><i class="mdi mdi-eye"></i></a> ';
                },
                className: 'text-center',
                width: '1%',
            },
            { data: 'Program' },
            { data: 'Location' },
            { data: 'DateRange' },
            { data: 'CreatedByName' },
        ],
        drawCallback: function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }

    });

    /* Filter trainings button */
    $('body').on('click', '#btn_filter_trainings', function () {

        tblAllTrainings.draw();
        // tblApplicants.ajax.reload();
    });

    /* Filter clear filter training date range button */
    $('body').on('click', '#clear_filter_trainings_date', function () {

        filterTrainDateRange.clear();
    });

    /* Enrolled applicants modal */
    $('#modal_enrolled_applicants').on('show.bs.modal', function (e) {

        var progID = $(e.relatedTarget).data('progid');
        var remoteLink = WebURL + '/enrolled-applicants/show/' + progID;

        $("#modal_enrolled_applicants").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');

        setTimeout(function () {
            $('#modal_enrolled_applicants').find('.modal-body').load(remoteLink, function () {
                $('#tbl_enrolled_app').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12't>>" +
                        "<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7'p>>",
                    processing: true,
                    scrollX: true,
                    autoWidth: false,
                    ordering: false,
                    lengthChange: false,
                    language: {
                        emptyTable: 'No data available.',
                        paginate: {
                            previous: "<i class='mdi mdi-chevron-left'>",
                            next: "<i class='mdi mdi-chevron-right'>"
                        }
                    },
                    drawCallback: function () {
                        $('.dataTables_filter').addClass('text-left');
                        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');

                    }
                });
            });
        }, 50);
    });
})
