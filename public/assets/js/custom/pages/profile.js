$(function () {

    $('#first_job').on('change',function(){
        console.log($(this).data('appid'))
        var ApplicantID = $(this).data('appid')
        var FirstJob = $(this).val()
        $.ajax({
            url:WebURL+'/update-firstjob',
                type:'POST',
                dataType: 'json',
                data: {ApplicantID:ApplicantID,FirstJob:FirstJob},
                cache: false,
                success: function(res)
                {
                    window.location.reload()
                },
                error: function(err) {
                    console.log(err);
                }
        })
    })

    $('.main-profile-tab a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.main-profile-tab.nav-pills a[href="' + activeTab + '"]').tab('show');
    }

    var appID = $('#hidden_AppID').val();
    var hireID = $('#hidden_HireID').val();
    var parentID = $('#hidden_ParentProgID').val();

    $('#edit_tin').mask('00-0000000');
    $('#edit_sss').mask('00-0000000-0');
    $('#edit_hdmf').mask('0000-0000-0000');
    $('#edit_philhealth').mask('0000-0000-0000');
    $('#edit_emp_empno').mask('00000000-0');
    $('#edit_height').mask("0'00");





    $('.interview-flatpickr').flatpickr({
        dateFormat: 'Y-m-d'
    });

    $('.interview-select2').select2();

    $('.employment-flatpickr').flatpickr({
        dateFormat: 'Y-m-d',

    });

    $('.employment-select2').select2();

    $('.employment-select2-no-search').select2({
        minimumResultsForSearch: -1
    });

    $('.flatpickr').flatpickr({
        dateFormat: 'Y-m-d',
        allowInput: true,

    });

    $('.edit-app-select2').select2();

    $('.edit-app-select2-no-search').select2({
        minimumResultsForSearch: -1
    });

    // var remoteLinkEditApp = WebURL + '/edit-applicant/' + appID;
    // var remoteLinkEditEmp = WebURL + '/edit-app-employment/' + appID;

    /* Edit applicant tab body */
    // $("#basicinfo").find('.card-box').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
    // $('#basicinfo').find('.card-box').load(remoteLinkEditApp, function () {
    //     console.log(1);
    //     $('#edit_tin').mask('00-0000000');
    //     $('#edit_sss').mask('00-0000000-0');
    //     $('#edit_hdmf').mask('0000-0000-0000');
    //     $('#edit_philhealth').mask('0000-0000-0000');

    //     $('.flatpickr').flatpickr({
    //         dateFormat: 'Y-m-d'
    //     });

    //     $('.edit-app-select2').select2();

    //     $('.edit-app-select2-no-search').select2({
    //         minimumResultsForSearch: -1
    //     });

    // });

    /* Edit applicant employment tab body */
    // $("#employment").find('.card-box').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
    // $('#employment').find('.card-box').load(remoteLinkEditEmp, function () {

    //     $('#edit_emp_empno').mask('00000000-0');

        // $('.employment-flatpickr').flatpickr({
        //     dateFormat: 'Y-m-d'
        // });

        // $('.employment-select2').select2();

        // $('.employment-select2-no-search').select2({
        //     minimumResultsForSearch: -1
        // });

    // });

    /* Edit Application Status On change */
    $('body').on('change', "#edit_app_status", function () {

        var val = $(this).val();

        if (val == 1) {
            $("#edit_reason").attr('disabled', true);
            $("#edit_reason").val('');
        }
        else if (val == 2) {
            $("#edit_reason").attr('disabled', false);
        }
        else {
            $("#edit_reason").attr('disabled', false);
        }
    });

    /* Edit Civilstatus On change */
    $('body').on('change', "#edit_civil_status", function () {

        var civilstatus = $(this).val();
        var gender = $("#edit_gender").val();

        if (civilstatus != 0) {
            if (civilstatus == 1) {
                $("#edit_taxcode").val(1).change();
                $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
            }
            else if (civilstatus != 1 && gender != 0) {
                if (gender == 1) {
                    $("#edit_taxcode").val(3).change();
                    $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
                }
                else {
                    $("#edit_taxcode").val(2).change();
                    $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
                }
            }
            else {
                $("#edit_taxcode").val('').change();
            }
        }
        else {
            $("#edit_taxcode").val('').change();
        }

    });

    /* Edit Gender On change */
    $('body').on('change', "#edit_gender", function () {

        var gender = $(this).val();
        var civilstatus = $("#edit_civil_status").val();

        if (gender != 0 && civilstatus != 0) {
            if (civilstatus == 1) {
                $("#edit_taxcode").val(1).change();
                $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
            }
            else if (gender == 1 && civilstatus != 1) {
                $("#edit_taxcode").val(3).change();
                $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
            }
            else if (gender == 2 && civilstatus != 1) {
                $("#edit_taxcode").val(2).change();
                $("#display_edit_taxcode").val($("#edit_taxcode :selected").text());
            }
            else {
                $("#edit_taxcode").val('').change();
            }
        }
        else {
            $("#edit_taxcode").val('').change();
        }

    });

    /* Edit Birth Province On change */
    $('body').on('change', '#edit_bprov', function () {

        var bprov = $(this).val();

        if (bprov == 2000) {
            $('#edit_bmun').parent().addClass('d-none');
            $('#edit_bothers').parent().removeClass('d-none');
            $('#edit_bmun').val(0).change();
            $('#edit_bothers').val('');
        }
        else {
            $('#edit_bmun').parent().removeClass('d-none');
            $('#edit_bothers').parent().addClass('d-none');
            $('#edit_bothers').val('');

            $.ajax({
                url: WebURL + '/get-municipal/' + bprov,
                type: 'POST',
                cache: false,
                success: function (data) {
                    $('#edit_bmun').html(data);
                },
                error: function () {
                    console.log('error');
                }
            })
        }

    });

    /* Edit Province On change */
    $('body').on('change', '#edit_province', function () {

        var prov = $(this).val();

        $.ajax({
            url: WebURL + '/get-municipal/' + prov,
            type: 'POST',
            dataType: 'text',
            cache: false,
            success: function (data) {
                $('#edit_municipal').html(data);
                $('#edit_barangay').html('<option></option>');
            },
            error: function () {
                console.log('error');
            }
        })

    });

    /* Edit Municipal On change */
    $('body').on('change', '#edit_municipal', function () {

        var prov = $(this).val();

        $.ajax({
            url: WebURL + '/get-barangay/' + prov,
            type: 'POST',
            cache: false,
            success: function (data) {
                $('#edit_barangay').html(data);
            },
            error: function () {
                console.log('error');
            }
        })

    });

    /* Edit applicant update button */
    $('body').on('click', '#btn_update_applicant', function (e) {

        var error = false;
        var dateapplied = $('#edit_app_date').val();
        var posapplied = $('#edit_pos_app').val();
        var appstatus = $('#edit_app_status').val();
        var hiresource = $('#edit_hire_source').val();
        var reason = $('#edit_reason').val();
        var firstname = $('#edit_first_name').val();
        var lastname = $('#edit_last_name').val();
        var gender = $('#edit_gender').val();
        var civilstatus = $('#edit_civil_status').val();
        var nationality = $('#edit_nationality').val();
        var religion = $('#edit_religion').val();
        var birthdate = $('#edit_bdate').val();
        var birthprovince = $('#edit_bprov').val();
        var birthmunicipal = $('#edit_bmun').val();
        var birthothers = $('#edit_bothers').val();
        var address = $('#edit_address').val();
        var province = $('#edit_province').val();
        var municipal = $('#edit_municipal').val();
        var barangay = $('#edit_barangay').val();
        var tin = $('#edit_tin').val().replaceAll('-', '');
        var sss = $('#edit_sss').val().replaceAll('-', '');
        var hdmf = $('#edit_hdmf').val().replaceAll('-', '');
        var philhealth = $('#edit_philhealth').val().replaceAll('-', '');
        var nickname = $('#edit_nick_name').val();
        var maiden = $('#edit_maiden_name').val();
        var blood = $('#edit_blood').val();
        var weight = $('#edit_weight').val();
        var height = $('#edit_height').val();
        var expat = $('#edit_expat').val();
        var emergencyname = $('#edit_emergency_name').val();
        var emergencycontact = $('#edit_emergency_contact').val();
        var relationship = $('#edit_emergency_relationship').val();
        var bzip = $('#edit_bzip').val();
        var zip = $('#edit_zip').val();

        if (bzip.length <= 0)
        {
            var error = true;
            $('#edit_bzip').addClass('error-input');
            $('#edit_bzip_error').show();
        }
        else {
            $('#edit_bzip').removeClass('error-input');
            $('#edit_bzip_error').hide();
        }

        if (zip.length <= 0)
        {
            var error = true;
            $('#edit_zip').addClass('error-input');
            $('#edit_zip_error').show();
        }
        else {
            $('#edit_zip').removeClass('error-input');
            $('#edit_zip_error').hide();
        }

        if (relationship == '') {
            var error = true;
            $('#edit_emergency_relationship').addClass('error-input');
            $('#edit_emergency_relationship_error').show();
        }
        else {
            $('#edit_emergency_relationship').removeClass('error-input');
            $('#edit_emergency_relationship_error').hide();
        }

        if (emergencycontact.length < 11) {
            var error = true;
            $('#edit_emergency_contact').addClass('error-input');
            $('#edit_emergency_contact_error').show();
        }
        else {
            $('#edit_emergency_contact').removeClass('error-input');
            $('#edit_emergency_contact_error').hide();
        }


        if (emergencyname.length == 0) {
            var error = true;
            $('#edit_emergency_name').addClass('error-input');
            $('#edit_emergency_name_error').show();
        }
        else {
            $('#edit_emergency_name').removeClass('error-input');
            $('#edit_emergency_name_error').hide();
        }


        if (nickname.length == 0) {
            var error = true;
            $('#edit_nick_name').addClass('error-input');
            $('#edit_nick_name_error').show();
        }
        else {
            $('#edit_nick_name').removeClass('error-input');
            $('#edit_nick_name_error').hide();
        }

        if (maiden.length == 0) {
            var error = true;
            $('#edit_maiden_name').addClass('error-input');
            $('#edit_maiden_name_error').show();
        }
        else {
            $('#edit_maiden_name').removeClass('error-input');
            $('#edit_maiden_name_error').hide();
        }

        // if (blood <= 0) {
        //     var error = true;
        //     $('#edit_blood').addClass('error-input');
        //     $('#edit_blood_error').show();
        // }
        // else {
        //     $('#edit_blood').removeClass('error-input');
        //     $('#edit_blood_error').hide();
        // }

        // if (weight <= 0) {
        //     var error = true;
        //     $('#edit_weight').addClass('error-input');
        //     $('#edit_weight_error').show();
        // }
        // else {
        //     $('#edit_weight').removeClass('error-input');
        //     $('#edit_weight_error').hide();
        // }

        // if (height.length == 0) {
        //     var error = true;
        //     $('#edit_height').addClass('error-input');
        //     $('#edit_height_error').show();
        // }
        // else {
        //     $('#edit_height').removeClass('error-input');
        //     $('#edit_height_error').hide();
        // }

        if (expat.length ==0) {
            var error = true;
            $('#edit_expat').addClass('error-input');
            $('#edit_expat_error').show();
        }
        else {
            $('#edit_expat').removeClass('error-input');
            $('#edit_expat_error').hide();
        }

        if (dateapplied.length == 0) {
            var error = true;
            $('#edit_app_date').addClass('error-input');
            $('#edit_date_app_error').show();
        }
        else {
            $('#edit_app_date').removeClass('error-input');
            $('#edit_date_app_error').hide();
        }

        if (posapplied == 0) {
            var error = true;
            $('#edit_pos_app').addClass('error-input');
            $('#edit_pos_app_error').show();
        }
        else {
            $('#edit_pos_app').removeClass('error-input');
            $('#edit_pos_app_error').hide();
        }

        if (appstatus == 0) {
            var error = true;
            $('#edit_app_status').addClass('error-input');
            $('#edit_app_status_error').show();
        }
        else {
            $('#edit_app_status').removeClass('error-input');
            $('#edit_app_status_error').hide();
        }

        if (appstatus > 1) {
            if (reason.length == 0) {
                var error = true;
                $('#edit_reason').addClass('error-input');
                $('#edit_reason_error').show();
            }
            else {
                $('#edit_reason').removeClass('error-input');
                $('#edit_reason_error').hide();
            }
        }
        else {
            $('#edit_reason').removeClass('error-input');
            $('#edit_reason_error').hide();
        }

        if (hiresource == 0) {
            var error = true;
            $('#edit_hire_source').addClass('error-input');
            $('#edit_hire_source_error').show();
        }
        else {
            $('#edit_hire_source').removeClass('error-input');
            $('#edit_hire_source_error').hide();
        }

        if (firstname.length == 0) {
            var error = true;
            $('#edit_first_name').addClass('error-input');
            $('#edit_fname_error').show();
        }
        else {
            $('#edit_first_name').removeClass('error-input');
            $('#edit_fname_error').hide();
        }

        if (lastname.length == 0) {
            var error = true;
            $('#edit_last_name').addClass('error-input');
            $('#edit_lname_error').show();
        }
        else {
            $('#edit_last_name').removeClass('error-input');
            $('#edit_lname_error').hide();
        }

        if (gender == 0) {
            var error = true;
            $('#edit_gender').addClass('error-input');
            $('#edit_gender_error').show();
        }
        else {
            $('#edit_gender').removeClass('error-input');
            $('#edit_gender_error').hide();
        }

        if (civilstatus == 0) {
            var error = true;
            $('#edit_civil_status').addClass('error-input');
            $('#edit_civil_status_error').show();
        }
        else {
            $('#edit_civil_status').removeClass('error-input');
            $('#edit_civil_status_error').hide();
        }

        if (nationality.length == 0) {
            var error = true;
            $('#edit_nationality').addClass('error-input');
            $('#edit_nationality_error').show();
        }
        else {
            $('#edit_nationality').removeClass('error-input');
            $('#edit_nationality_error').hide();
        }

        if (religion == 0) {
            var error = true;
            $('#edit_religion').addClass('error-input');
            $('#edit_religion_error').show();
        }
        else {
            $('#edit_religion').removeClass('error-input');
            $('#edit_religion_error').hide();
        }

        if (birthdate.length == 0) {
            var error = true;
            $('#edit_bdate').addClass('error-input');
            $('#edit_bdate_error').show();
        }
        else {
            $('#edit_bdate').removeClass('error-input');
            $('#edit_bdate_error').hide();

            if (check18Years(birthdate) < 18) {
                var error = true;
                $('#edit_bdate').addClass('error-input');
                $('#edit_age_error').show();
            }
            else {
                $('#edit_bdate').removeClass('error-input');
                $('#edit_age_error').hide();
            }
        }

        if (birthprovince == 0) {
            var error = true;
            $('#edit_bprov').addClass('error-input');
            $('#edit_bprov_error').show();
        }
        else {
            $('#edit_bprov').removeClass('error-input');
            $('#edit_bprov_error').hide();
        }

        if (birthprovince == 2000) {
            if (birthothers.length == 0) {
                var error = true;
                $('#edit_bothers').addClass('error-input');
                $('#edit_birthoth_error').show();
                $('#edit_bmun').addClass('error-input');
                $('#edit_bmun_error').show();
            }
            else {
                $('#edit_bothers').removeClass('error-input');
                $('#edit_birthoth_error').hide();
                $('#edit_bmun').removeClass('error-input');
                $('#edit_bmun_error').hide();
            }
        }
        else {
            if (birthmunicipal == 0) {
                var error = true;
                $('#edit_bmun').addClass('error-input');
                $('#edit_bmun_error').show();
                $('#edit_bothers').addClass('error-input');
                $('#edit_birthoth_error').show();
            }
            else {
                $('#edit_bmun').removeClass('error-input');
                $('#edit_bmun_error').hide();
                $('#edit_bothers').removeClass('error-input');
                $('#edit_birthoth_error').hide();
            }
        }

        if (address.length == 0) {
            var error = true;
            $('#edit_address').addClass('error-input');
            $('#edit_add_error').show();
        }
        else {
            $('#edit_address').removeClass('error-input');
            $('#edit_add_error').hide();
        }

        if (province == 0) {
            var error = true;
            $('#edit_province').addClass('error-input');
            $('#edit_prov_error').show();
        }
        else {
            $('#edit_province').removeClass('error-input');
            $('#edit_prov_error').hide();
        }

        if (municipal == 0) {
            var error = true;
            $('#edit_municipal').addClass('error-input');
            $('#edit_mun_error').show();
        }
        else {
            $('#edit_municipal').removeClass('error-input');
            $('#edit_mun_error').hide();
        }

        if (barangay == 0) {
            var error = true;
            $('#edit_barangay').addClass('error-input');
            $('#edit_brgy_error').show();
        }
        else {
            $('#edit_barangay').removeClass('error-input');
            $('#edit_brgy_error').hide();
        }

        if (tin.length < 9 && tin.length > 0) {
            var error = true;
            $('#edit_tin').addClass('error-input');
            $('#edit_tin_length_error').show();
        }
        else {
            $('#edit_tin').removeClass('error-input');
            $('#edit_tin_length_error').hide();
        }

        if (sss.length < 10 && sss.length > 0) {
            var error = true;
            $('#edit_sss').addClass('error-input');
            $('#edit_sss_length_error').show();
        }
        else {
            $('#edit_sss').removeClass('error-input');
            $('#edit_sss_length_error').hide();
        }

        if (hdmf.length < 12 && hdmf.length > 0) {
            var error = true;
            $('#edit_hdmf').addClass('error-input');
            $('#edit_hdmf_length_error').show();
        }
        else {
            $('#edit_hdmf').removeClass('error-input');
            $('#edit_hdmf_length_error').hide();
        }

        if (philhealth.length < 12 && philhealth.length > 0) {
            var error = true;
            $('#edit_philhealth').addClass('error-input');
            $('#edit_philhlength_error').show();
        }
        else {
            $('#edit_philhealth').removeClass('error-input');
            $('#edit_philhlength_error').hide();
        }

        if (error == false) {
            $('#edit_taxcode').removeAttr('disabled');
            var formdata = $('#form_edit_app').serialize();


            $.ajax({
                url: WebURL + '/applicant/update',
                type: 'POST',
                data: formdata,
                success: function (data) {

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
                                window.location.reload();
                            }
                        });

                    } else {
                        swal.fire({
                            title: "Warning!",
                            text: data.msg,
                            icon: "warning",
                            confirmButtonText: "Ok",
                            confirmButtonColor: '#6658dd',
                            allowOutsideClick: false,
                        });
                    }
                }
            })
        }
        else {
            $('.error-input').filter(":first").focus();
        }
    });

    /* New applicant family modal */
    $('#modal_new_family').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-app-family/show';

        $("#modal_new_family").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_new_family').find('.modal-body').load(remoteLink, function () {

            $(".fam-select2").select2({
                minimumResultsForSearch: -1
            });
            var currentDate = new Date();
            var maxDate = new Date(currentDate);
                maxDate.setDate(currentDate.getDate() - 1);

            $('.fam-flatpickr').flatpickr({
                dateFormat: 'Y-m-d',
                allowInput: true,
                maxDate: maxDate

            });
        });
    });

    /* New applicant family modal save button */
    $('body').on('click', '#btn_add_family', function () {

        var error = false;
        var rel = $('#new_fam_relationship').val();
        var firstname = $('#new_fam_first_name').val();
        var middlename = $('#new_fam_middle_name').val();
        var lastname = $('#new_fam_last_name').val();
        var nationality = $('#new_fam_nationality').val();
        var bdate = $('#new_fam_bdate').val();
        var deceased = $('#new_family_deceased').val();
        var dependent = $('#new_family_dependent').val();

        if (rel == '') {
            var error = true;
            $('#new_fam_relationship').addClass('error-input');
            $('#new_fam_relationship_error').show();
        }
        else {
            $('#new_fam_relationship').removeClass('error-input');
            $('#new_fam_relationship_error').hide();
        }

        if (firstname.length == 0) {
            var error = true;
            $('#new_fam_first_name').addClass('error-input');
            $('#new_fam_first_name_error').show();
        }
        else {
            $('#new_fam_first_name').removeClass('error-input');
            $('#new_fam_first_name_error').hide();
        }

        if (lastname.length == 0) {
            var error = true;
            $('#new_fam_last_name').addClass('error-input');
            $('#new_fam_last_name_error').show();
        }
        else {
            $('#new_fam_last_name').removeClass('error-input');
            $('#new_fam_last_name_error').hide();
        }

        if (nationality.length == 0) {
            var error = true;
            $('#new_fam_nationality').addClass('error-input');
            $('#new_fam_nationality_error').show();
        }
        else {
            $('#new_fam_nationality').removeClass('error-input');
            $('#new_fam_nationality_error').hide();
        }
        if (bdate.length == 0) {
            var error = true;
            $('#new_fam_bdate').addClass('error-input');
            $('#new_fam_bdate_error').show();
        }
        else {
            $('#new_fam_bdate').removeClass('error-input');
            $('#new_fam_bdate_error').hide();
        }

        if (deceased.length == 0) {
            var error = true;
            $('#new_family_deceased').addClass('error-input');
            $('#new_family_deceased_error').show();
        }
        else {
            $('#new_family_deceased').removeClass('error-input');
            $('#new_family_deceased_error').hide();
        }

        if (dependent.length == 0) {
            var error = true;
            $('#new_family_dependent').addClass('error-input');
            $('#new_family_dependent_error').show();
        }
        else {
            $('#new_family_dependent').removeClass('error-input');
            $('#new_family_dependent_error').hide();
        }

        if (error == false) {
            var formdata = $('#form_new_family').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-family/save', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_new_family').modal('hide');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            // loadFamilyBox();
                            window.location.reload();


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


    /* Edit applicant family modal */
    $('#modal_edit_family').on('show.bs.modal', function (e) {

        var acID = $(e.relatedTarget).data('cid');
        var remoteLink = WebURL + '/edit-app-family/show/' + acID;

        $("#modal_edit_family").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_edit_family').find('.modal-body').load(remoteLink, function () {
            var currentDate = new Date();
            var maxDate = new Date(currentDate);
                maxDate.setDate(currentDate.getDate() - 1);
            $(".fam-select2").select2({
                minimumResultsForSearch: -1
            });

            $('.fam-flatpickr').flatpickr({
                dateFormat: 'Y-m-d',
                allowInput: true,
                maxDate: maxDate

            });
        });
    });

    /* Edit applicant family modal update button */
    $('body').on('click', '#btn_update_family', function () {

        var error = false;
        var rel = $('#edit_fam_relationship').val();
        var firstname = $('#edit_fam_first_name').val();
        var middlename = $('#edit_fam_middle_name').val();
        var lastname = $('#edit_fam_last_name').val();
        var nationality = $('#edit_fam_nationality').val();
        var bdate = $('#edit_fam_bdate').val();
        var deceased = $('#edit_family_deceased').val();
        var dependent = $('#edit_family_dependent').val();

        if (rel == '') {
            var error = true;
            $('#edit_fam_relationship').addClass('error-input');
            $('#edit_fam_relationship_error').show();
        }
        else {
            $('#edit_fam_relationship').removeClass('error-input');
            $('#edit_fam_relationship_error').hide();
        }

        if (firstname.length == 0) {
            var error = true;
            $('#edit_fam_first_name').addClass('error-input');
            $('#edit_fam_first_name_error').show();
        }
        else {
            $('#edit_fam_first_name').removeClass('error-input');
            $('#edit_fam_first_name_error').hide();
        }

        if (lastname.length == 0) {
            var error = true;
            $('#edit_fam_last_name').addClass('error-input');
            $('#edit_fam_last_name_error').show();
        }
        else {
            $('#edit_fam_last_name').removeClass('error-input');
            $('#edit_fam_last_name_error').hide();
        }

        if (nationality.length == 0) {
            var error = true;
            $('#edit_fam_nationality').addClass('error-input');
            $('#edit_fam_nationality_error').show();
        }
        else {
            $('#edit_fam_nationality').removeClass('error-input');
            $('#edit_fam_nationality_error').hide();
        }
        if (bdate.length == 0) {
            var error = true;
            $('#edit_fam_bdate').addClass('error-input');
            $('#edit_fam_bdate_error').show();
        }
        else {
            $('#edit_fam_bdate').removeClass('error-input');
            $('#edit_fam_bdate_error').hide();
        }

        if (deceased.length == 0) {
            var error = true;
            $('#edit_family_deceased').addClass('error-input');
            $('#edit_family_deceased_error').show();
        }
        else {
            $('#edit_family_deceased').removeClass('error-input');
            $('#edit_family_deceased_error').hide();
        }

        if (dependent.length == 0) {
            var error = true;
            $('#edit_family_dependent').addClass('error-input');
            $('#edit_family_dependent_error').show();
        }
        else {
            $('#edit_family_dependent').removeClass('error-input');
            $('#edit_family_dependent_error').hide();
        }

        if (error == false) {
            var formdata = $('#form_edit_family').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-family/update', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_edit_family').modal('hide');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            loadFamilyBox();
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

    /* New applicant contact modal */
    $('#modal_new_contact').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-app-contact/show';

        $("#modal_new_contact").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_new_contact').find('.modal-body').load(remoteLink, function () {

            $(".contact-select2").select2({
                minimumResultsForSearch: -1
            });

            $('.contact-flatpickr').flatpickr({
                dateFormat: 'Y-m-d',
                allowInput: true,
                maxDate: currentDate,
            });
        });
    });


    /* New contact type On change */
    $('body').on('change', "#new_contact_type", function () {

        var val = $(this).val();

        if (val == 1) {
            $('#new_contact').mask('0000-0000');
        }
        else if (val == 2) {
            $('#new_contact').mask('0000-000-0000');
        }
        else {
            $('#new_contact').unmask();
            $('#new_contact').prop('type', 'email');
        }
    });

    /* New applicant contact modal save button */
    $('body').on('click', '#btn_add_contact', function () {

        var error = false;
        var contacttype = $('#new_contact_type').val();
        var contact = $('#new_contact').val();

        if (contacttype == '') {
            var error = true;
            $('#new_contact_type').addClass('error-input');
            $('#new_contact_type_error').show();
        }
        else {
            $('#new_contact_type').removeClass('error-input');
            $('#new_contact_type_error').hide();
        }

        if (contact.length == 0) {
            var error = true;
            $('#new_contact').addClass('error-input');
            $('#new_contact_error').show();
            $('#new_contact_error').text('Contact is required.');
        }
        else {
            $('#new_contact').removeClass('error-input');
            $('#new_contact_error').hide();
            if (contacttype == 3) {
                if (!contact.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)) {
                    var error = true;
                    $('#new_contact').addClass('error-input');
                    $('#new_contact_error').show();
                    $('#new_contact_error').text('Please enter a valid email.');
                }
                else {
                    $('#new_contact').removeClass('error-input');
                    $('#new_contact_error').hide();
                }
            }

            if (contacttype == 2) {
                if (contact.replaceAll('-', '').length != 11) {
                    var error = true;
                    $('#new_contact').addClass('error-input');
                    $('#new_contact_error').show();
                    $('#new_contact_error').text('Please enter a valid mobile number.');
                }
                else {
                    $('#new_contact').removeClass('error-input');
                    $('#new_contact_error').hide();
                }
            }

            if (contacttype == 1) {
                if (contact.replaceAll('-', '').length != 8) {
                    var error = true;
                    $('#new_contact').addClass('error-input');
                    $('#new_contact_error').show();
                    $('#new_contact_error').text('Please enter a valid landline number.');
                }
                else {
                    $('#new_contact').removeClass('error-input');
                    $('#new_contact_error').hide();
                }
            }
        }

        if (error == false) {
            var formdata = $('#form_new_contact').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-contact/save', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_new_contact').modal('hide');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            loadContactsBox();
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

    /* Edit applicant contact modal */
    $('#modal_edit_contact').on('show.bs.modal', function (e) {

        var acID = $(e.relatedTarget).data('cid');
        var remoteLink = WebURL + '/edit-app-contact/show/' + acID;

        $("#modal_edit_contact").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_edit_contact').find('.modal-body').load(remoteLink, function () {

            var type = $("#edit_contact_type").val();

            if (type == 1) {
                $('#edit_contact').mask('0000-0000');
            }
            else if (type == 2) {
                $('#edit_contact').mask('0000-000-0000');
            }
            else {
                $('#edit_contact').unmask();
                $('#edit_contact').prop('type', 'email');
            }

            $(".contact-select2").select2({
                minimumResultsForSearch: -1
            });
        });
    });

    /* Edit contact type On change */
    $('body').on('change', "#edit_contact_type", function () {

        var val = $(this).val();

        if (val == 1) {
            $('#edit_contact').mask('0000-0000');
        }
        else if (val == 2) {
            $('#edit_contact').mask('0000-000-0000');
        }
        else {
            $('#edit_contact').unmask();
            $('#edit_contact').prop('type', 'email');
        }
    });

    /* Edit applicant contact modal update button */
    $('body').on('click', '#btn_update_contact', function () {

        var error = false;
        var contacttype = $('#edit_contact_type').val();
        var contact = $('#edit_contact').val();

        if (contacttype == '') {
            var error = true;
            $('#edit_contact_type').addClass('error-input');
            $('#edit_contact_type_error').show();
        }
        else {
            $('#edit_contact_type').removeClass('error-input');
            $('#edit_contact_type_error').hide();
        }

        if (contact.length == 0) {
            var error = true;
            $('#edit_contact').addClass('error-input');
            $('#edit_contact_error').show();
            $('#edit_contact_error').text('Contact is required.');
        }
        else {
            $('#edit_contact').removeClass('error-input');
            $('#edit_contact_error').hide();
            if (contacttype == 3) {
                if (!contact.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)) {
                    var error = true;
                    $('#edit_contact').addClass('error-input');
                    $('#edit_contact_error').show();
                    $('#edit_contact_error').text('Please enter a valid email.');
                }
                else {
                    $('#edit_contact').removeClass('error-input');
                    $('#edit_contact_error').hide();
                }
            }

            if (contacttype == 2) {
                if (contact.replaceAll('-', '').length != 11) {
                    var error = true;
                    $('#edit_contact').addClass('error-input');
                    $('#edit_contact_error').show();
                    $('#edit_contact_error').text('Please enter a valid mobile number.');
                }
                else {
                    $('#edit_contact').removeClass('error-input');
                    $('#edit_contact_error').hide();
                }
            }

            if (contacttype == 1) {
                if (contact.replaceAll('-', '').length != 8) {
                    var error = true;
                    $('#edit_contact').addClass('error-input');
                    $('#edit_contact_error').show();
                    $('#edit_contact_error').text('Please enter a valid landline number.');
                }
                else {
                    $('#edit_contact').removeClass('error-input');
                    $('#edit_contact_error').hide();
                }
            }
        }

        if (error == false) {
            var formdata = $('#form_edit_contact').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-contact/update', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_edit_contact').modal('hide');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            // loadContactsBox();
                            window.location.reload();
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

    /* New applicant education modal */
    $('#modal_new_education').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-app-education/show';

        $("#modal_new_education").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_new_education').find('.modal-body').load(remoteLink, function () {

            $(".educ-select2").select2({
                minimumResultsForSearch: -1
            });

            $('.flatpickr').flatpickr({
                dateFormat: 'Y-m-d'
            });
        });
    });

    /* New school type on change */
    $('body').on('change', "#new_school_type", function () {

        var val = $(this).val();

        if (val == 1) {
            $('#new_course').parent().hide();
            $('#new_course').val('').change();
        }
        else {
            $('#new_course').parent().show();
        }
    });

    /* New applicant education modal save button */
    $('body').on('click', '#btn_add_education', function (e) {
        e.preventDefault();

        var error = false;
        var schooltype = $('#new_school_type').val();
        var school = $('#new_school').val();
        var course = $('#new_course').val();
        var yearfrom = $('#new_educ_year_from').val();
        var yearto = $('#new_educ_year_to').val();

        if (schooltype == '') {
            var error = true;
            $('#new_school_type').addClass('error-input');
            $('#new_school_type_error').show();

            if (course.length == 0) {
                var error = true;
                $('#new_course').addClass('error-input');
                $('#new_course_error').show();
            }
            else {
                $('#new_course').removeClass('error-input');
                $('#new_course_error').hide();
            }
        }
        else {
            $('#new_school_type').removeClass('error-input');
            $('#new_school_type_error').hide();

            if (schooltype != 1) {
                if (course.length == 0) {
                    var error = true;
                    $('#new_course').addClass('error-input');
                    $('#new_course_error').show();
                }
                else {
                    $('#new_course').removeClass('error-input');
                    $('#new_course_error').hide();
                }
            }
            else {
                $('#new_course').removeClass('error-input');
                $('#new_course_error').hide();
            }
        }

        if (school.length == 0) {
            var error = true;
            $('#new_school').addClass('error-input');
            $('#new_school_error').show();
        }
        else {
            $('#new_school').removeClass('error-input');
            $('#new_school_error').hide();
        }

        if (yearfrom != '' && yearto != '') {
            $('#new_educ_year_from').removeClass('error-input');
            $('#new_educ_year_to').removeClass('error-input');
            $('#new_educ_year_error').hide();

            if (parseInt(yearfrom) > parseInt(yearto)) {
                var error = true;
                $('#new_educ_year_from').addClass('error-input');
                $('#new_educ_year_to').addClass('error-input');
                $('#new_educ_year_error').text('Please input a valid year range.');
                $('#new_educ_year_error').show();
            }
            else {
                $('#new_educ_year_from').removeClass('error-input');
                $('#new_educ_year_to').removeClass('error-input');
                $('#new_educ_year_error').hide();
            }
        }
        else {
            var error = true;
            $('#new_educ_year_from').addClass('error-input');
            $('#new_educ_year_to').addClass('error-input');
            $('#new_educ_year_error').text('Year is required.');
            $('#new_educ_year_error').show();
        }

        if (error == false) {
            var formdata = $('#form_new_education').serialize() + '&appID=' + appID;;

            $.post(WebURL + '/app-education/save', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_new_education').modal('toggle');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            loadEducationExperienceTab();
                            window.location.reload()
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

    /* Edit applicant education modal */
    $('#modal_edit_education').on('show.bs.modal', function (e) {

        var educID = $(e.relatedTarget).data('eid');
        var remoteLink = WebURL + '/edit-app-education/show/' + educID;

        $("#modal_edit_education").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_edit_education').find('.modal-body').load(remoteLink, function () {

            $(".educ-select2").select2({
                minimumResultsForSearch: -1
            });
            $('.flatpickr').flatpickr({
                dateFormat: 'Y-m-d'
            });


        });
    });

    /* Edit school type on change */
    $('body').on('change', "#edit_school_type", function () {

        var val = $(this).val();

        if (val == 1) {
            $('#edit_course').parent().hide();
            $('#edit_course').val('').change();
        }
        else {
            $('#edit_course').parent().show();
        }
    });

    /* Edit applicant education modal update button */
    $('body').on('click', '#btn_update_education', function (e) {
        e.preventDefault();

        var error = false;
        var schooltype = $('#edit_school_type').val();
        var school = $('#edit_school').val();
        var course = $('#edit_course').val();
        var yearfrom = $('#edit_educ_year_from').val();
        var yearto = $('#edit_educ_year_to').val();

        if (schooltype == '') {
            var error = true;
            $('#edit_school_type').addClass('error-input');
            $('#edit_school_type_error').show();

            if (course.length == 0) {
                var error = true;
                $('#edit_course').addClass('error-input');
                $('#edit_course_error').show();
            }
            else {
                $('#edit_course').removeClass('error-input');
                $('#edit_course_error').hide();
            }
        }
        else {
            $('#edit_school_type').removeClass('error-input');
            $('#edit_school_type_error').hide();

            if (schooltype != 1) {
                if (course.length == 0) {
                    var error = true;
                    $('#edit_course').addClass('error-input');
                    $('#edit_course_error').show();
                }
                else {
                    $('#edit_course').removeClass('error-input');
                    $('#edit_course_error').hide();
                }
            }
            else {
                $('#edit_course').removeClass('error-input');
                $('#edit_course_error').hide();
            }
        }

        if (school.length == 0) {
            var error = true;
            $('#edit_school').addClass('error-input');
            $('#edit_school_error').show();
        }
        else {
            $('#edit_school').removeClass('error-input');
            $('#edit_school_error').hide();
        }

        if (yearfrom != '' && yearto != '') {
            $('#edit_educ_year_from').removeClass('error-input');
            $('#edit_educ_year_to').removeClass('error-input');
            $('#edit_educ_year_error').hide();

            if (parseInt(yearfrom) > parseInt(yearto)) {
                var error = true;
                $('#edit_educ_year_from').addClass('error-input');
                $('#edit_educ_year_to').addClass('error-input');
                $('#edit_educ_year_error').text('Please input a valid year range.');
                $('#edit_educ_year_error').show();
            }
            else {
                $('#edit_educ_year_from').removeClass('error-input');
                $('#edit_educ_year_to').removeClass('error-input');
                $('#edit_educ_year_error').hide();
            }
        }
        else {
            var error = true;
            $('#edit_educ_year_from').addClass('error-input');
            $('#edit_educ_year_to').addClass('error-input');
            $('#edit_educ_year_error').text('Year is required.');
            $('#edit_educ_year_error').show();
        }

        if (error == false) {
            var formdata = $('#form_edit_education').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-education/update', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_edit_education').modal('toggle');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            loadEducationExperienceTab();
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

    /* New applicant experience modal */
    $('#modal_new_experience').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-app-experience/show';

        $("#modal_new_experience").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_new_experience').find('.modal-body').load(remoteLink, function () {

            $(".exp-select2").select2({
                minimumResultsForSearch: -1
            });
            $('.flatpickr').flatpickr({
                dateFormat: 'Y-m-d'
            });
        });
    });

    /* New applicant experience modal save button */
    $('body').on('click', '#btn_add_experience', function (e) {
        e.preventDefault();

        var error = false;
        var employer = $('#new_employer').val();
        var emptype = $('#new_emptype').val();
        var address = $('#new_address').val();
        var position = $('#new_position').val();
        var monthfrom = $('#new_exp_month_from').val();
        var yearfrom = $('#new_exp_year_from').val();
        var monthto = $('#new_exp_month_to').val();
        var yearto = $('#new_exp_year_to').val();
        console.log(monthfrom + '-' + yearfrom + '-' + monthto + '-' + yearto);

        if (employer.length == 0) {
            var error = true;
            $('#new_employer').addClass('error-input');
            $('#new_employer_error').show();
        }
        else {
            $('#new_employer').removeClass('error-input');
            $('#new_employer_error').hide();
        }

        if (emptype == '') {
            var error = true;
            $('#new_emptype').addClass('error-input');
            $('#new_emptype_error').show();
        }
        else {
            $('#new_emptype').removeClass('error-input');
            $('#new_emptype_error').hide();
        }

        if (address.length == 0) {
            var error = true;
            $('#new_address').addClass('error-input');
            $('#new_address_error').show();
        }
        else {
            $('#new_address').removeClass('error-input');
            $('#new_address_error').hide();
        }

        if (position.length == 0) {
            var error = true;
            $('#new_position').addClass('error-input');
            $('#new_position_error').show();
        }
        else {
            $('#new_position').removeClass('error-input');
            $('#new_position_error').hide();
        }

        if (monthfrom != '' && yearfrom != '' && monthto != '' && yearto != '') {
            $('#new_exp_month_from').removeClass('error-input');
            $('#new_exp_month_to').removeClass('error-input');
            $('#new_exp_year_from').removeClass('error-input');
            $('#new_exp_year_to').removeClass('error-input');
            $('#new_exp_date_error').hide();

            if (parseInt(yearfrom) > parseInt(yearto)) {
                var error = true;
                $('#new_exp_year_from').addClass('error-input');
                $('#new_exp_year_to').addClass('error-input');
                $('#new_exp_date_error').text('Starting year of experience is higher than the year end.');
                $('#new_exp_date_error').show();
            }
            else {

                if (parseInt(yearfrom) == parseInt(yearto) && parseInt(monthfrom) > parseInt(monthto)) {

                    var error = true;
                    $('#new_exp_month_from').addClass('error-input');
                    $('#new_exp_month_to').addClass('error-input');
                    $('#new_exp_date_error').text('Starting month of experience is higher than the month end.');
                    $('#new_exp_date_error').show();
                }
                else {
                    $('#new_exp_month_from').removeClass('error-input');
                    $('#new_exp_month_to').removeClass('error-input');
                    $('#new_exp_date_error').hide();
                }
            }
        }
        else {
            var error = true;
            $('#new_exp_month_from').addClass('error-input');
            $('#new_exp_month_to').addClass('error-input');
            $('#new_exp_year_from').addClass('error-input');
            $('#new_exp_year_to').addClass('error-input');
            $('#new_exp_date_error').text('Dates of experience are required.');
            $('#new_exp_date_error').show();
        }

        if (error == false) {
            var formdata = $('#form_new_experience').serialize() + '&appID=' + appID;

            $.post(WebURL + '/app-experience/save', formdata, function (data) {
                if (data.num > 0) {
                    $('#modal_new_experience').modal('toggle');
                    swal.fire({
                        title: 'Success!',
                        text: data.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#6658dd',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.value) {
                            loadEducationExperienceTab();
                            window.location.reload();
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

    /* Edit applicant experience modal */
    $('#modal_edit_experience').on('show.bs.modal', function (e) {

        var expID = $(e.relatedTarget).data('expid');
        var remoteLink = WebURL + '/edit-app-experience/show/' + expID;

        $("#modal_edit_experience").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_edit_experience').find('.modal-body').load(remoteLink, function () {

            $(".exp-select2").select2({
                minimumResultsForSearch: -1
            });
            $('.flatpickr').flatpickr({
                dateFormat: 'Y-m-d'
            });
        });
    });

    /* Edit applicant experience modal update button */
    $('body').on('click', '#btn_update_experience', function (e) {
    e.preventDefault();

    var error = false;
    var employer = $('#edit_employer').val();
    var emptype = $('#edit_emptype').val();
    var address = $('#edit_employer_address').val();
    var position = $('#edit_position').val();
    var monthfrom = $('#edit_exp_month_from').val();
    var yearfrom = $('#edit_exp_year_from').val();
    var monthto = $('#edit_exp_month_to').val();
    var yearto = $('#edit_exp_year_to').val();

    if (employer.length == 0) {
        var error = true;
        $('#edit_employer').addClass('error-input');
        $('#edit_employer_error').show();
    }
    else {
        $('#edit_employer').removeClass('error-input');
        $('#edit_employer_error').hide();
    }

    if (emptype == '') {
        var error = true;
        $('#edit_emptype').addClass('error-input');
        $('#edit_emptype_error').show();
    }
    else {
        $('#edit_emptype').removeClass('error-input');
        $('#edit_emptype_error').hide();
    }

    if (address.length == 0) {
        var error = true;
        $('#edit_employer_address').addClass('error-input');
        $('#edit_employer_address_error').show();
    }
    else {
        $('#edit_employer_address').removeClass('error-input');
        $('#edit_employer_address_error').hide();
    }

    if (position.length == 0) {
        var error = true;
        $('#edit_position').addClass('error-input');
        $('#edit_position_error').show();
    }
    else {
        $('#edit_position').removeClass('error-input');
        $('#edit_position_error').hide();
    }

    if (monthfrom != '' && yearfrom != '' && monthto != '' && yearto != '') {
        $('#edit_exp_month_from').removeClass('error-input');
        $('#edit_exp_month_to').removeClass('error-input');
        $('#edit_exp_year_from').removeClass('error-input');
        $('#edit_exp_year_to').removeClass('error-input');
        $('#edit_exp_date_error').hide();

        if (parseInt(yearfrom) > parseInt(yearto)) {
            var error = true;
            $('#edit_exp_year_from').addClass('error-input');
            $('#edit_exp_year_to').addClass('error-input');
            $('#edit_exp_date_error').text('Starting year of experience is higher than the year end.');
            $('#edit_exp_date_error').show();
        }
        else {

            if (parseInt(yearfrom) == parseInt(yearto) && parseInt(monthfrom) > parseInt(monthto)) {

                var error = true;
                $('#edit_exp_month_from').addClass('error-input');
                $('#edit_exp_month_to').addClass('error-input');
                $('#edit_exp_date_error').text('Starting month of experience is higher than the month end.');
                $('#edit_exp_date_error').show();
            }
            else {
                $('#edit_exp_month_from').removeClass('error-input');
                $('#edit_exp_month_to').removeClass('error-input');
                $('#edit_exp_date_error').hide();
            }
        }
    }
    else {
        var error = true;
        $('#edit_exp_month_from').addClass('error-input');
        $('#edit_exp_month_to').addClass('error-input');
        $('#edit_exp_year_from').addClass('error-input');
        $('#edit_exp_year_to').addClass('error-input');
        $('#edit_exp_date_error').text('Dates of experience are required.');
        $('#edit_exp_date_error').show();
    }

    if (error == false) {
        var formdata = $('#form_edit_experience').serialize() + '&appID=' + appID;
        console.log(formdata);
        $.post(WebURL + '/app-experience/update', formdata, function (data) {
            $('#modal_edit_experience').modal('toggle');
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
                        loadEducationExperienceTab();
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

    /* Applicant interview save/update button */
    $('body').on('click', '#btn_save_interview', function (e) {

        var error = false;
        var hasInt = $('#has_interview').val();
        var f_date = $('#first_int_date').val();
        var f_emp = $('#first_int_interviewee').val();
        var f_remarks = $('#first_int_remarks').val();
        var f_status = $('input[name=first_int_status]:checked', '#form_first_interview').val()
        var s_date = $('#second_int_date').val();
        var s_emp = $('#second_int_interviewee').val();
        var s_remarks = $('#second_int_remarks').val();
        var s_status = $('input[name=second_int_status]:checked', '#form_second_interview').val()
        var t_date = $('#third_int_date').val();
        var t_emp = $('#third_int_interviewee').val();
        var t_remarks = $('#third_int_remarks').val();
        var t_status = $('input[name=third_int_status]:checked', '#form_third_interview').val()

        if(hasInt == 0) {
            if(f_date.length == 0) {
                var error = true;
                $('.nav-pills.form-wizard-header a[href="#first"]').tab('show');
                $('#first_int_date').addClass('error-input');
                $('#first_int_date_error').show();
            }
            else {
                $('#first_int_date').removeClass('error-input');
                $('#first_int_date_error').hide();
            }

            if(f_emp == '') {
                var error = true;
                $('.nav-pills.form-wizard-header a[href="#first"]').tab('show');
                $('#first_int_interviewee').addClass('error-input');
                $('#first_int_interviewee_error').show();
            }
            else {
                $('#first_int_interviewee').removeClass('error-input');
                $('#first_int_interviewee_error').hide();
            }

            if(!f_status) {
                var error = true;
                $('.nav-pills.form-wizard-header a[href="#first"]').tab('show');
                $('#first_int_pass').addClass('error-input');
                $('#first_int_status_error').show();
            }
            else {
                $('#first_int_pass').removeClass('error-input');
                $('#first_int_status_error').hide();
            }
        }
        else {
            if(s_date.length != 0 || s_emp != '' || s_remarks.length != 0 || s_status) {
                if(s_date.length == 0) {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#second"]').tab('show');
                    $('#second_int_date').addClass('error-input');
                    $('#second_int_date_error').show();
                }
                else {
                    $('#second_int_date').removeClass('error-input');
                    $('#second_int_date_error').hide();
                }

                if(s_emp == '') {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#second"]').tab('show');
                    $('#second_int_interviewee').addClass('error-input');
                    $('#second_int_interviewee_error').show();
                }
                else {
                    $('#second_int_interviewee').removeClass('error-input');
                    $('#second_int_interviewee_error').hide();
                }

                if(!s_status) {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#second"]').tab('show');
                    $('#second_int_pass').addClass('error-input');
                    $('#second_int_status_error').show();
                }
                else {
                    $('#second_int_pass').removeClass('error-input');
                    $('#second_int_status_error').hide();
                }
            }
            else {
                $('#second_int_date').removeClass('error-input');
                $('#second_int_interviewee').removeClass('error-input');
                $('#second_int_pass').removeClass('error-input');
                $('#second_int_date_error').hide();
                $('#second_int_interviewee_error').hide();
                $('#second_int_status_error').hide();
            }

            if(t_date.length != 0 || t_emp != '' || t_remarks.length != 0 || t_status) {
                if(t_date.length == 0) {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#third"]').tab('show');
                    $('#third_int_date').addClass('error-input');
                    $('#third_int_date_error').show();
                }
                else {
                    $('#third_int_date').removeClass('error-input');
                    $('#third_int_date_error').hide();
                }

                if(t_emp == '') {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#third"]').tab('show');
                    $('#third_int_interviewee').addClass('error-input');
                    $('#third_int_interviewee_error').show();
                }
                else {
                    $('#third_int_interviewee').removeClass('error-input');
                    $('#third_int_interviewee_error').hide();
                }

                if(!t_status) {
                    var error = true;
                    $('.nav-pills.form-wizard-header a[href="#third"]').tab('show');
                    $('#third_int_pass').addClass('error-input');
                    $('#third_int_status_error').show();
                }
                else {
                    $('#third_int_pass').removeClass('error-input');
                    $('#third_int_status_error').hide();
                }
            }
            else {
                $('#third_int_date').removeClass('error-input');
                $('#third_int_interviewee').removeClass('error-input');
                $('#third_int_pass').removeClass('error-input');
                $('#third_int_date_error').hide();
                $('#third_int_interviewee_error').hide();
                $('#third_int_status_error').hide();
            }
        }

        if (error == false) {
            var firstformdata = $('#form_first_interview').serialize();
            var secondformdata = $('#form_second_interview').serialize();
            var thirdformdata = $('#form_third_interview').serialize();
            var mainformdata = firstformdata + '&' + secondformdata + '&' + thirdformdata + '&appID=' + appID;

            $.post(WebURL + '/app-interview/save', mainformdata, function (data) {
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
                            window.location.reload();
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

    /* New applicant training modal */
    $('#modal_new_training').on('show.bs.modal', function (e) {

        var remoteLink = WebURL + '/new-app-training/show/' + appID + '/' + parentID;

        $("#modal_new_training").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        setTimeout(function () {
            $('#modal_new_training').find('.modal-body').load(remoteLink, function () {

                $('#tbl_trainings').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12't>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    autoWidth: true,
                    scrollX: true,
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

    /* New applicant training modal save link */
    $('body').on('click', '.link-add-applicant', function (e) {
        e.stopPropagation();

        var id = $(this).data('progid');
        var formData = { app: appID, prog: id };

        swal.fire({
            title: 'Are you sure?',
            text: 'You are about to enroll this applicant to the program.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Enroll applicant',
            confirmButtonColor: '#6658dd',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function(resolve, reject) {
                    $.post(WebURL + '/app-training/save', formData, function (data) {
                        if (data.num > 0) {
                            $('#modal_new_training').modal('toggle');
                            swal.fire({
                                title: 'Success!',
                                text: data.msg,
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                confirmButtonColor: '#6658dd',
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.value) {
                                    window.location.reload();
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
                  });
            }
        })

    });

    /* Remove applicant from training/program link */
    $('body').on('click', '.link-remove-applicant', function (e) {
        e.stopPropagation();

        var id = $(this).data('progid');
        var formData = { app: appID, prog: id };

        swal.fire({
            title: 'Are you sure?',
            text: 'You are about to remove this applicant to the program.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Remove applicant',
            confirmButtonColor: '#6658dd',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function(resolve, reject) {
                    $.post(WebURL + '/app-training/delete', formData, function (data) {
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
                                    window.location.reload();
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
                  });
            }
        })

    });

    /* View enrolled applicant from training/program link */
    $('body').on('click', '.link-view-enrolled-app', function (e) {
        e.stopPropagation();

        var programID = $(this).data('progid');
        var remoteLink = WebURL + '/new-app-training-enrolled/show/' + programID;

        $("#modal_new_training").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
            setTimeout(function () {
                $('#modal_new_training').find('.modal-body').load(remoteLink, function () {

                    $('#tbl_enrolled_app').DataTable({
                        dom: "<'row'<'col-sm-12 col-md-6'>>" +
                            "<'row'<'col-sm-12't>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        autoWidth: true,
                        scrollX: true,
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

    /* Remove enrolled applicant from training/program link */
    $('body').on('click', '.link-enrolled-remove-app', function (e) {
        e.stopPropagation();

        var id = $(this).data('progid');
        var appID = $(this).data('appid');
        var formData = { app: appID, prog: id };

        swal.fire({
            title: 'Are you sure?',
            text: 'You are about to remove this applicant to the program.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Remove applicant',
            confirmButtonColor: '#6658dd',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function (resolve, reject) {
                    $.post(WebURL + '/app-training/delete', formData, function (data) {
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
                                    var remoteLink = WebURL + '/new-app-training-enrolled/show/' + id;

                                    $("#modal_new_training").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
                                    setTimeout(function () {
                                        $('#modal_new_training').find('.modal-body').load(remoteLink, function () {

                                            $('#tbl_enrolled_app').DataTable({
                                                dom: "<'row'<'col-sm-12 col-md-6'>>" +
                                                    "<'row'<'col-sm-12't>>" +
                                                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                                                autoWidth: true,
                                                scrollX: true,
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
                });
            }
        })

    });

    /* View enrolled applicant from training/program link */
    $('body').on('click', '#btn-back-to-programs', function (e) {
        e.stopPropagation();

        var remoteLink = WebURL + '/new-app-training/show/' + appID + '/' + parentID;

        $("#modal_new_training").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        setTimeout(function () {
            $('#modal_new_training').find('.modal-body').load(remoteLink, function () {

                $('#tbl_trainings').DataTable({
                    dom: "<'row'<'col-sm-12 btn col-md-6'f>>" +
                        "<'row'<'col-sm-12't>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    autoWidth: true,
                    scrollX: true,
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

     /* New applicant training modal */
     $('#modal_app_training_details').on('show.bs.modal', function (e) {

        var appID = $(e.relatedTarget).data('appid');
        var programID = $(e.relatedTarget).data('progid');
        var remoteLink = WebURL + '/app-training-details/show/' + appID + '/' + programID;

        $("#modal_app_training_details").find('.modal-body').html('<div class="text-center"><div class="spinner spinner-border"></div></div>');
        $('#modal_app_training_details').find('.modal-body').load(remoteLink, function () {

        });
    });

    /* Employment clinic On change */
    $('body').on('change', '#edit_emp_clinic', function () {

        var clinic = $(this).val();

        if (clinic == 0) {
            $('#edit_emp_othclinic').parent().removeClass('d-none');
            $('#edit_emp_othclinic').val('');
        }
        else {
            $('#edit_emp_othclinic').parent().addClass('d-none');
            $('#edit_emp_othclinic').val('');
            $('#edit_emp_othclinic').removeClass('error-input');
            $('#edit_emp_othclinic_error').hide();
        }

    });

    /* Employment medical result type On change */
    $('body').on('change', '#edit_emp_restype', function () {

        var result = $(this).val();

        if (result > 2) {
            $('#edit_emp_resremarks').parent().removeClass('d-none');
            $('#edit_emp_resremarks').val('');
        }
        else {
            $('#edit_emp_resremarks').parent().addClass('d-none');
            $('#edit_emp_resremarks').val('');
            $('#edit_emp_resremarks').removeClass('error-input');
            $('#edit_emp_resremarks_error').hide();
        }

    });

    /* Employment assignment category On change */
    $('body').on('change', '#edit_emp_ass_cat', function () {

        var assign_cat = $(this).val();
        var date_hire  = $('#edit_emp_datehire').val();

        if (assign_cat == 1) {
            $("#edit_emp_dateend").attr('disabled', true);
            $("#edit_emp_dateend").val('').change();
        }
        else {
            if(date_hire.length > 0) {

                $("#edit_emp_dateend").attr('disabled', false);
                $("#edit_emp_dateend").val('').change();

                $.ajax({
                    url: WebURL + '/get-seasonal-dates/' + date_hire,
                    type: 'POST',
                    cache: false,
                    success: function (data) {
                        $('#edit_emp_dateend').html(data);
                    },
                    error: function () {
                        console.log('error');
                    }
                })
            }
            else {
                $("#edit_emp_dateend").attr('disabled', false);
                $("#edit_emp_dateend").val('').change();
            }

        }

    });

    /* Employment date hired On change */
    $('body').on('change', '#edit_emp_datehire', function () {

        var date_hire = $(this).val();
        var assign_cat  = $('#edit_emp_ass_cat').val();

        if (assign_cat == 2) {

            $("#edit_emp_dateend").val('').change();

            $.ajax({
                url: WebURL + '/get-seasonal-dates/' + date_hire,
                type: 'POST',
                cache: false,
                success: function (data) {
                    $('#edit_emp_dateend').html(data);
                },
                error: function () {
                    console.log('error');
                }
            })
        }

    });

    /* Employment form save/update button */
    $('body').on('click', '#btn_save_employment', function (e) {

        var error = false;
        var assCat = $('#edit_emp_ass_cat').val();
        var empNo = $('#edit_emp_empno').val();
        var dateEnd = $('#edit_emp_dateend').val();
        var resultType = $('#edit_emp_restype').val();
        var resultRemarks = $('#edit_emp_resremarks').val();
        var clinic = $('#edit_emp_clinic').val();
        var clinicOthers = $('#edit_emp_othclinic').val();
        var bankNo = $('#edit_emp_accno').val();

        if (bankNo.length > 0) {
            if (bankNo.length < 12) {
                var error = true;
                $('#edit_emp_accno').addClass('error-input');
                $('#edit_emp_accno_error').show();
            }
            else {
                $('#edit_emp_accno').removeClass('error-input');
                $('#edit_emp_accno_error').hide();
            }
        }

        if (assCat == 2) {
            if (dateEnd.length == 0) {
                var error = true;
                $('#edit_emp_dateend').addClass('error-input');
                $('#edit_emp_dateend_error').show();
            }
            else {
                $('#edit_emp_dateend').removeClass('error-input');
                $('#edit_emp_dateend_error').hide();
            }
        }

        if (empNo.length > 0) {
            if (empNo.length < 9) {
                var error = true;
                $('#edit_emp_empno').addClass('error-input');
                $('#edit_emp_empno_error').show();
            }
            else {
                $('#edit_emp_empno').removeClass('error-input');
                $('#edit_emp_empno_error').hide();
            }
        }

        if (resultType > 2) {
            if (resultRemarks.length == 0) {
                var error = true;
                $('#edit_emp_resremarks').addClass('error-input');
                $('#edit_emp_resremarks_error').show();
            }
            else {
                $('#edit_emp_resremarks').removeClass('error-input');
                $('#edit_emp_resremarks_error').hide();
            }
        }

        if (clinic == 0) {
            if (clinicOthers.length == 0) {
                var error = true;
                $('#edit_emp_othclinic').addClass('error-input');
                $('#edit_emp_othclinic_error').show();
            }
            else {
                $('#edit_emp_othclinic').removeClass('error-input');
                $('#edit_emp_othclinic_error').hide();
            }
        }

        if (error == false) {
            $('#form_edit_employment :input').prop('disabled', false);
            var formdata = $('#form_edit_employment').serialize() + '&appID=' + appID;
            $('#form_edit_employment :input').prop('disabled', true);

            $.post(WebURL + '/app-employment/save', formdata, function (data) {
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
                            window.location.reload();
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

    /* Update applicant to tag as complete requirements button */
    $('body').on('click', '#btn_tag_complete_req', function (e) {
        var formdata = { hireID : hireID, withReq: 1 };

        $.post(WebURL + '/app-employment/update/req', formdata, function (data) {
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
                        window.location.reload();
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

    });


    /* Update applicant to tag as incomplete requirements button */
    $('body').on('click', '#btn_untag_complete_req', function (e) {
        var formdata = { hireID : hireID, withReq: 0 };

        $.post(WebURL + '/app-employment/update/req', formdata, function (data) {
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
                        window.location.reload();
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

    });

    /* Update applicant to tag as deployed button */
    $('body').on('click', '#btn_tag_deploy', function (e) {
        var formdata = { hireID : hireID };

        swal.fire({
            title: 'Are you sure?',
            text: 'You are about to tag this applicant as deployed.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            confirmButtonColor: '#6658dd',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function(resolve, reject) {
                    var name = $('#appFullname').text()
                    swal.fire({
                        title: 'Validation',
                        html:
                        '<h4>Kindly re-enter the employee number of ' + name + ' to proceed with deployment</h4>' +
                        '<input id="swal-input1" class="swal2-input" placeholder="xxxxxxxxx-x" maxlength="10">',
                        focusConfirm: false,
                        showCancelButton: true,
                        onOpen: function(el) {
                            var container = $(el);
                            container.find('#swal-input1').mask('00000000-0');
                            $(document).on("cut copy paste","#swal-input1",function(e) {
                                e.preventDefault();
                            });
                        },
                        preConfirm: () => {
                            var empNo = $('#edit_emp_empno').val()
                            var empNoC = $('#swal-input1').val()
                            if(empNo == empNoC)
                            {
                                return new Promise(function(resolve, reject) {
                                    $.post(WebURL + '/app-employment/update/deploy', formdata, function (data) {
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
                                                    window.location.reload();
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
                                  });
                            }
                            else
                            {
                                Swal.fire(
                                    'Error',
                                    'Employee number does not match',
                                    'error'
                                  )
                            }

                        }
                    })
                  });
            }
        })

    });

    $('#edit_emp_location').on('change',function(){

        var appID = $('#hidden_AppID').val()
        var loc = $('#edit_emp_location').val();

        $.ajax({
            url:WebURL+'/get-prf/'+appID+'/'+loc,
            type:'POST',
            dataType: 'text',
            cache: false,
            success: function (data) {
                $('#edit_emp_PRF').html(data);
            },
            error: function (e) {
                console.log(e);
            }
        })
    })



});

loadEducationExperienceTab = () => {
    $("#educexp").load(location.href + " #educexp_tab_body");
}

loadTrainingsInterviewTab = () => {
    $("#traininterview").load(location.href + " #traininterview_tab_body");
}

loadContactsBox = () => {
    $("#contact-card-body").load(location.href + " #table-contact");
}

loadFamilyBox = () => {
    $("#family-card-body").load(location.href + " #table-family");
}
