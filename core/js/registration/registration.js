$(document).ready(function () {
    $('#registrationForm').submit(function () {
        var userLogin = $("#userLogin").val();
        $(".registrationField").each(function () {
            if ($(this).val() === '') {
                var currentField = $(this).prop('name');
                var emptyField = currentField.replace("user", "");
                alert(emptyField + ' field is empty!');
                return false;
            }
        });
        checkUserExist();
        return false;
    });
});


function backToPreviousPage() {
    window.history.back();
}

function checkUserExist() {
    var userLogin = $("#userLogin").val();
    $.ajax({
            url: '/checkUserExist/'+userLogin,
            type: 'POST',
            success: function (data) {
                    console.log(data);
                    if (data === 'true'){
                            alert('YES YES')
                    } else {
                            alert('nonono')
                    }
            },
            cache: false,
            // contentType: false,
            // processData: false
    });
}
