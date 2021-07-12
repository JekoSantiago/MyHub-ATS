$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

})

function check18Years(birthdate) {

    var bdate = new Date(birthdate);

    var yearNow = new Date().getFullYear();
    var monthNow = new Date().getMonth();
    var dayNow = new Date().getDate();

    var birthYear = bdate.getFullYear();
    var birthMonth = bdate.getMonth();
    var birthDate = bdate.getDate();


    var age = yearNow - birthYear;
    var ageMonth = monthNow - birthMonth

    if (ageMonth < 0 || (ageMonth === 0 && dayNow < birthDate)) {
        age = age - 1;
    }

    return age;
}
