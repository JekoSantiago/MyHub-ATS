$(function () {


    var tblApplicants = $('#tbl_applicants').DataTable({
        autoWidth: true,
        serverSide: true,
        bFilter: false,
        scrollX: true,
        ordering: false,
        lengthChange: false,
        ajax: {
            url: WebURL + '/get-applicants',
            method: 'POST',
            datatype: 'json',
            data: function (data) {
                var firstName  = $('#filter_fname').val();
                var middleName = $('#filter_mname').val();
                var lastName   = $('#filter_lname').val();
                var position   = $('#filter_position').val();
                var address    = $('#filter_address').val();
                var applyDate  = $('#filter_apply_date').val();
                var encodeDate = $('#filter_encode_date').val();

                data.firstName  = firstName;
                data.middleName = middleName;
                data.lastName   = lastName;
                data.position   = position;
                data.address    = address;
                data.applyDate  = applyDate;
                data.encodeDate = encodeDate;
            },
            beforeSend: function () {
                $('#tbl_applicants > tbody').html(
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

                    return  ' <a href="' + WebURL + '/applicants/' + row.Applicant_ID + '" class="action-icon text-primary"><i class="mdi mdi-eye"></i></a> ';
                },
                className: 'text-center',
            },
            { data: 'AppName' },
            { data: 'DateApply' },
            {
                render: function (data, type, row, meta) {
                    var color = '';
                    if (row.HireStatus_ID == 1) {
                        color = 'badge badge-soft-success';
                    }
                    if (row.HireStatus_ID == 2) {
                        color = 'badge badge-soft-danger';
                    }
                    if (row.HireStatus_ID == 3) {
                        color = 'badge badge-soft-warning';
                    }
                    return '<span class="' + color + '">' + row.HireStatus + '</span>';
                }
            },
            { data: 'Position' },
            { data: 'Department' },
            { data: 'Division' },
        ],
        drawCallback: function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        },
        createdRow: function (row, data, index){
            if(data.isDeployed == 1) {
                $(row).addClass('table-success');
            }
        },

    });

    /* Filter applicants modal apply button */
    $('body').on('click', '#btn_filter_applicants', function () {

        $('#modal_filter_applicants').modal('hide');
        tblApplicants.draw();
        // tblApplicants.ajax.reload();
    });

    /* Reset filter inputs in filter applicants modal button */
    $('body').on('click', '#btn_filter_app_reset', function () {

        $('#filter_fname').val('');
        $('#filter_mname').val('');
        $('#filter_lname').val('');
        $('#filter_position').val('');
        $('#filter_address').val('');
        $('.filter-flatpickr').flatpickr({
            mode: 'range',
            dateFormat: 'Y-m-d',
            allowInput: true,

        }).clear();

    });

    /* Filter applicants modal */
    $('#modal_filter_applicants').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/filter-applicant/show';
        var formdata = $('#form_filter_applicants').serialize();

        $("#modal_filter_applicants").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_filter_applicants').find('.modal-body').load(remoteLink, formdata, function () {

            $('.filter-flatpickr').flatpickr({
                mode: 'range',
                dateFormat: 'Y-m-d'
            });
        });
    });

    /* New applicant modal */
    $('#modal_new_applicant').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-applicant/show';

        $("#modal_new_applicant").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_new_applicant').find('.modal-body').load(remoteLink, function () {

            $('#new_tin').mask('00-0000000');
            $('#new_sss').mask('00-0000000-0');
            $('#new_hdmf').mask('0000-0000-0000');
            $('#new_philhealth').mask('0000-0000-0000');
            $('#new_height').mask("0'00");
            $('#new_emergency_contact').mask('0000-000-0000');

            var currentDate = new Date();
            var maxDate = new Date(currentDate);
                maxDate.setDate(currentDate.getDate() - 1);

            $('.flatpickr').flatpickr({
                dateFormat: 'Y-m-d',
                allowInput: true,
                maxDate: maxDate

            });

            $('.select2').select2();

            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });
        });
    });

    /* New Application Status On change */
    $('body').on('change', "#new_app_status", function () {

        var val = $(this).val();

        if (val == 1) {
            $("#new_reason").attr('readonly', true);
            $("#new_reason").val('');
        }
        else if (val == 2) {
            $("#new_reason").attr('readonly', false);
        }
        else {
            $("#new_reason").attr('readonly', false);
        }
    });

    /* New Civilstatus On change */
    $('body').on('change', "#new_civil_status", function () {

        var civilstatus = $(this).val();
        var gender = $("#new_gender").val();

        if (civilstatus != 0) {
            if (civilstatus == 1) {
                $("#new_taxcode").val(1).change();
                $("#display_new_taxcode").val($("#new_taxcode :selected").text());
            }
            else if (civilstatus != 1 && gender != 0) {
                if (gender == 1) {
                    $("#new_taxcode").val(3).change();
                    $("#display_new_taxcode").val($("#new_taxcode :selected").text());
                }
                else {
                    $("#new_taxcode").val(2).change();
                    $("#display_new_taxcode").val($("#new_taxcode :selected").text());
                }
            }
            else {
                $("#new_taxcode").val('').change();
            }
        }
        else {
            $("#new_taxcode").val('').change();
        }

    });

    /* New Gender On change */
    $('body').on('change', "#new_gender", function () {

        var gender = $(this).val();
        var civilstatus = $("#new_civil_status").val();

        if (gender != 0 && civilstatus != 0) {
            if (civilstatus == 1) {
                $("#new_taxcode").val(1).change();
                $("#display_new_taxcode").val($("#new_taxcode :selected").text());
            }
            else if (gender == 1 && civilstatus != 1) {
                $("#new_taxcode").val(3).change();
                $("#display_new_taxcode").val($("#new_taxcode :selected").text());
            }
            else if (gender == 2 && civilstatus != 1) {
                $("#new_taxcode").val(2).change();
                $("#display_new_taxcode").val($("#new_taxcode :selected").text());
            }
            else {
                $("#new_taxcode").val('').change();
            }
        }
        else {
            $("#new_taxcode").val('').change();
        }

    });

    /* New Birth Province On change */
    $('body').on('change', '#new_bprov', function () {

        var bprov = $(this).val();

        if (bprov == 2000) {
            $('#new_bmun').parent().hide();
            $('#new_bothers').parent().removeClass('d-none');
            $('#new_bothers').val('');
        }
        else {
            $('#new_bmun').parent().show();
            $('#new_bothers').parent().addClass('d-none');
            $('#new_bothers').val('');

            $.ajax({
                url: WebURL + '/get-municipal/' + bprov,
                type: 'POST',
                cache: false,
                success: function (data) {
                    $('#new_bmun').html(data);
                },
                error: function () {
                    console.log('error');
                }
            })
        }

    });

    /* New Province On change */
    $('body').on('change', '#new_province', function () {

        var prov = $(this).val();

        $.ajax({
            url: WebURL + '/get-municipal/' + prov,
            type: 'POST',
            dataType: 'text',
            cache: false,
            success: function (data) {
                $('#new_municipal').html(data);
                $('#new_barangay').html('<option></option>');
            },
            error: function () {
                console.log('error');
            }
        })

    });

    /* New Municipal On change */
    $('body').on('change', '#new_municipal', function () {

        var prov = $(this).val();

        $.ajax({
            url: WebURL + '/get-barangay/' + prov,
            type: 'POST',
            cache: false,
            success: function (data) {
                $('#new_barangay').html(data);
            },
            error: function () {
                console.log('error');
            }
        })

    });

    /* New applicant save button */
    $('body').on('click', '#btn_add_applicant', function (e) {

        var error = false;
        var dateapplied = $('#new_app_date').val();
        var posapplied = $('#new_pos_app').val();
        var appstatus = $('#new_app_status').val();
        var hiresource = $('#new_hire_source').val();
        var reason = $('#new_reason').val();
        var firstname = $('#new_first_name').val();
        var lastname = $('#new_last_name').val();
        var gender = $('#new_gender').val();
        var civilstatus = $('#new_civil_status').val();
        var nationality = $('#new_nationality').val();
        var religion = $('#new_religion').val();
        var birthdate = $('#new_bdate').val();
        var birthprovince = $('#new_bprov').val();
        var birthmunicipal = $('#new_bmun').val();
        var birthothers = $('#new_bothers').val();
        var address = $('#new_address').val();
        var province = $('#new_province').val();
        var municipal = $('#new_municipal').val();
        var barangay = $('#new_barangay').val();
        var tin = $('#new_tin').val().replaceAll('-', '');
        var sss = $('#new_sss').val().replaceAll('-', '');
        var hdmf = $('#new_hdmf').val().replaceAll('-', '');
        var philhealth = $('#new_philhealth').val().replaceAll('-', '');
        var nickname = $('#new_nick_name').val();
        var maiden = $('#new_maiden_name').val();
        var blood = $('#new_blood').val();
        var weight = $('#new_weight').val();
        var height = $('#new_height').val();
        var expat = $('#new_expat').val();
        var emergencyname = $('#new_emergency_name').val();
        var emergencycontact = $('#new_emergency_contact').val();
        var relationship = $('#new_emergency_relationship').val();
        var bzip = $('#new_bzip').val();
        var zip = $('#new_zip').val();

        if (bzip.length <= 0)
        {
            var error = true;
            $('#new_bzip').addClass('error-input');
            $('#new_bzip_error').show();
        }
        else {
            $('#new_bzip').removeClass('error-input');
            $('#new_bzip_error').hide();
        }

        if (zip.length <= 0)
        {
            var error = true;
            $('#new_zip').addClass('error-input');
            $('#new_zip_error').show();
        }
        else {
            $('#new_zip').removeClass('error-input');
            $('#new_zip_error').hide();
        }

        if (relationship == '') {
            var error = true;
            $('#new_emergency_relationship').addClass('error-input');
            $('#new_emergency_relationship_error').show();
        }
        else {
            $('#new_emergency_relationship').removeClass('error-input');
            $('#new_emergency_relationship_error').hide();
        }

        if (emergencycontact.length < 11) {
            var error = true;
            $('#new_emergency_contact').addClass('error-input');
            $('#new_emergency_contact_error').show();
        }
        else {
            $('#new_emergency_contact').removeClass('error-input');
            $('#new_emergency_contact_error').hide();
        }


        if (emergencyname.length == 0) {
            var error = true;
            $('#new_emergency_name').addClass('error-input');
            $('#new_emergency_name_error').show();
        }
        else {
            $('#new_emergency_name').removeClass('error-input');
            $('#new_emergency_name_error').hide();
        }

        if (nickname.length == 0) {
            var error = true;
            $('#new_nick_name').addClass('error-input');
            $('#new_nick_name_error').show();
        }
        else {
            $('#new_nick_name').removeClass('error-input');
            $('#new_nick_name_error').hide();
        }

        if (maiden.length == 0) {
            var error = true;
            $('#new_maiden_name').addClass('error-input');
            $('#new_maiden_name_error').show();
        }
        else {
            $('#new_maiden_name').removeClass('error-input');
            $('#new_maiden_name_error').hide();
        }

        // if (blood <= 0) {
        //     var error = true;
        //     $('#new_blood').addClass('error-input');
        //     $('#new_blood_error').show();
        // }
        // else {
        //     $('#new_blood').removeClass('error-input');
        //     $('#new_blood_error').hide();
        // }

        // if (weight <= 0) {
        //     var error = true;
        //     $('#new_weight').addClass('error-input');
        //     $('#new_weight_error').show();
        // }
        // else {
        //     $('#new_weight').removeClass('error-input');
        //     $('#new_weight_error').hide();
        // }

        // if (height.length == 0) {
        //     var error = true;
        //     $('#new_height').addClass('error-input');
        //     $('#new_height_error').show();
        // }
        // else {
        //     $('#new_height').removeClass('error-input');
        //     $('#new_height_error').hide();
        // }

        if (expat.length ==0) {
            var error = true;
            $('#new_expat').addClass('error-input');
            $('#new_expat_error').show();
        }
        else {
            $('#new_expat').removeClass('error-input');
            $('#new_expat_error').hide();
        }

        if (dateapplied.length == 0) {
            var error = true;
            $('#new_app_date').addClass('error-input');
            $('#new_date_app_error').show();
        }
        else {
            $('#new_app_date').removeClass('error-input');
            $('#new_date_app_error').hide();
        }

        if (posapplied == 0) {
            var error = true;
            $('#new_pos_app').addClass('error-input');
            $('#new_pos_app_error').show();
        }
        else {
            $('#new_pos_app').removeClass('error-input');
            $('#new_pos_app_error').hide();
        }

        if (appstatus == 0) {
            var error = true;
            $('#new_app_status').addClass('error-input');
            $('#new_app_status_error').show();
        }
        else {
            $('#new_app_status').removeClass('error-input');
            $('#new_app_status_error').hide();
        }

        if (appstatus > 1) {
            if (reason.length == 0) {
                var error = true;
                $('#new_reason').addClass('error-input');
                $('#new_reason_error').show();
            }
            else {
                $('#new_reason').removeClass('error-input');
                $('#new_reason_error').hide();
            }
        }
        else {
            $('#new_reason').removeClass('error-input');
            $('#new_reason_error').hide();
        }

        if (hiresource == 0) {
            var error = true;
            $('#new_hire_source').addClass('error-input');
            $('#new_hire_source_error').show();
        }
        else {
            $('#new_hire_source').removeClass('error-input');
            $('#new_hire_source_error').hide();
        }

        if (firstname.length == 0) {
            var error = true;
            $('#new_first_name').addClass('error-input');
            $('#new_fname_error').show();
        }
        else {
            $('#new_first_name').removeClass('error-input');
            $('#new_fname_error').hide();
        }

        if (lastname.length == 0) {
            var error = true;
            $('#new_last_name').addClass('error-input');
            $('#new_lname_error').show();
        }
        else {
            $('#new_last_name').removeClass('error-input');
            $('#new_lname_error').hide();
        }

        if (gender == 0) {
            var error = true;
            $('#new_gender').addClass('error-input');
            $('#new_gender_error').show();
        }
        else {
            $('#new_gender').removeClass('error-input');
            $('#new_gender_error').hide();
        }

        if (civilstatus == 0) {
            var error = true;
            $('#new_civil_status').addClass('error-input');
            $('#new_civil_status_error').show();
        }
        else {
            $('#new_civil_status').removeClass('error-input');
            $('#new_civil_status_error').hide();
        }

        if (nationality.length == 0) {
            var error = true;
            $('#new_nationality').addClass('error-input');
            $('#new_nationality_error').show();
        }
        else {
            $('#new_nationality').removeClass('error-input');
            $('#new_nationality_error').hide();
        }

        if (religion == 0) {
            var error = true;
            $('#new_religion').addClass('error-input');
            $('#new_religion_error').show();
        }
        else {
            $('#new_religion').removeClass('error-input');
            $('#new_religion_error').hide();
        }

        if (birthdate.length == 0) {
            var error = true;
            $('#new_bdate').addClass('error-input');
            $('#new_bdate_error').show();
        }
        else {
            $('#new_bdate').removeClass('error-input');
            $('#new_bdate_error').hide();

            if (check18Years(birthdate) < 18) {
                var error = true;
                $('#new_bdate').addClass('error-input');
                $('#new_age_error').show();
            }
            else {
                $('#new_bdate').removeClass('error-input');
                $('#new_age_error').hide();
            }
        }

        if (birthprovince == 0) {
            var error = true;
            $('#new_bprov').addClass('error-input');
            $('#new_bprov_error').show();
        }
        else {
            $('#new_bprov').removeClass('error-input');
            $('#new_bprov_error').hide();
        }

        if (birthprovince == 2000) {
            if (birthothers.length == 0) {
                var error = true;
                $('#new_bothers').addClass('error-input');
                $('#new_birthoth_error').show();
                $('#new_bmun').addClass('error-input');
                $('#new_bmun_error').show();
            }
            else {
                $('#new_bothers').removeClass('error-input');
                $('#new_birthoth_error').hide();
                $('#new_bmun').removeClass('error-input');
                $('#new_bmun_error').hide();
            }
        }
        else {
            if (birthmunicipal == 0) {
                var error = true;
                $('#new_bmun').addClass('error-input');
                $('#new_bmun_error').show();
                $('#new_bothers').addClass('error-input');
                $('#new_birthoth_error').show();
            }
            else {
                $('#new_bmun').removeClass('error-input');
                $('#new_bmun_error').hide();
                $('#new_bothers').removeClass('error-input');
                $('#new_birthoth_error').hide();
            }
        }

        if (address.length == 0) {
            var error = true;
            $('#new_address').addClass('error-input');
            $('#new_add_error').show();
        }
        else {
            $('#new_address').removeClass('error-input');
            $('#new_add_error').hide();
        }

        if (province == 0) {
            var error = true;
            $('#new_province').addClass('error-input');
            $('#new_prov_error').show();
        }
        else {
            $('#new_province').removeClass('error-input');
            $('#new_prov_error').hide();
        }

        if (municipal == 0) {
            var error = true;
            $('#new_municipal').addClass('error-input');
            $('#new_mun_error').show();
        }
        else {
            $('#new_municipal').removeClass('error-input');
            $('#new_mun_error').hide();
        }

        if (barangay == 0) {
            var error = true;
            $('#new_barangay').addClass('error-input');
            $('#new_brgy_error').show();
        }
        else {
            $('#new_barangay').removeClass('error-input');
            $('#new_brgy_error').hide();
        }

        if (tin.length < 9 && tin.length > 0) {
            var error = true;
            $('#new_tin').addClass('error-input');
            $('#new_tin_length_error').show();
        }
        else {
            $('#new_tin').removeClass('error-input');
            $('#new_tin_length_error').hide();
        }

        if (sss.length < 10 && sss.length > 0) {
            var error = true;
            $('#new_sss').addClass('error-input');
            $('#new_sss_length_error').show();
        }
        else {
            $('#new_sss').removeClass('error-input');
            $('#new_sss_length_error').hide();
        }

        if (hdmf.length < 12 && hdmf.length > 0) {
            var error = true;
            $('#new_hdmf').addClass('error-input');
            $('#new_hdmf_length_error').show();
        }
        else {
            $('#new_hdmf').removeClass('error-input');
            $('#new_hdmf_length_error').hide();
        }

        if (philhealth.length < 12 && philhealth.length > 0) {
            var error = true;
            $('#new_philhealth').addClass('error-input');
            $('#new_philhlength_error').show();
        }
        else {
            $('#new_philhealth').removeClass('error-input');
            $('#new_philhlength_error').hide();
        }



        if (error == false) {
            $('#new_taxcode').removeAttr('disabled');
            var formdata = $('#form_new_app').serialize();

            $.post(WebURL + '/applicant/save', formdata, function (data) {
                if (data.num > 0) {
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = WebURL + '/applicants/' + btoa(data.num);
                        }
                    });
                }
                else {
                    swal.fire({
                        title: "Warning!",
                        text: data.msg,
                        icon: "warning",
                        confirmButtonText: "Ok",
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    });
                }
            }, 'JSON');
        }
        else {
            $('.error-input').filter(":first").focus();
        }
    });

});
