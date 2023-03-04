//

/*
        Авторизация
 */

$('.login-button').click(function (event){
    event.preventDefault();

    $(`input`).removeClass('error');
    $(`.msg`).addClass('none');


    let login =$('input[name="login"]').val(),
        password =$('input[name="password"]').val();

    $.ajax({
        url: 'inc/signIn.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data){

            if (data.status){
                document.location.href = '/profil.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field, i, array){

                        let inputField = array[0]
                        let messField = array[1]

                        for (index = 0; index < inputField.length; ++index){
                            $(`input[name="${inputField[index]}"]`).addClass('error');
                            $(`.msg[name="${inputField[index]}"]`).removeClass('none').text(messField[index]);

                        }


                    })
                }

            }

        }
    });

})



/*
        Регистрация
 */
$('.registr-button').click(function (event){
    event.preventDefault();

    $(`input`).removeClass('error');
    $(`.msg`).addClass('none');


    let full_name =$('input[name="full_name"]').val(),
        email =$('input[name="email"]').val(),
        login =$('input[name="login"]').val(),
        password =$('input[name="password"]').val(),
        confirm_password =$('input[name="confirm_password"]').val()


    $.ajax({
        url: 'inc/singUp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            full_name: full_name,
            email: email,
            login: login,
            password: password,
            confirm_password: confirm_password
        },
        success: function (data){

            if (data.status){
                document.location.href = '/index.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field,i, array){

                        let inputField = array[0]
                        let messField = array[1]

                        for (index = 0; index < inputField.length; ++index){
                            $(`input[name="${inputField[index]}"]`).addClass('error');
                            $(`.msg[name="${inputField[index]}"]`).removeClass('none').text(messField[index]);

                        }

                    })

                }

            }

        }
    });


})