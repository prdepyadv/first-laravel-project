function validate_login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if(username.length < 3){
        alert("username length should be more than 3");
        return false
    }
    else if(password.length < 6){
        alert("Invalid password");
        return false
    }
    else{
        return true;
    }
}

function check_username(){
    var user = document.getElementById('username').value;
    if(user.length >= 3){
        document.getElementById('username').style.borderBottomColor="red";
    }
    else {
        document.getElementById('username').style.borderBottomColor = "black";
    }
}



function validate_username(){
    var user = document.getElementById('username').value;
    if (user.length >= 3) {
        $.ajax({
            type: 'POST',
            url: 'validate_username',
            async: false,
            data: {
                '_token': $('input[name=_token]').val(),
                'username': user},
            success: function (data){
              if(data == true){
                  document.getElementById('username').style.borderBottomColor = "red";
                  $('.add').prop('disabled', false);
                  $('.errorContent').show();
                  $('.errorContent').text('Available');

              }
              else{
                  document.getElementById('username').style.borderBottomColor = "black";
                  $('.add').prop('disabled', true);
                  $('.errorContent').show();
                  $('.errorContent').text('Already exists');
              }
            }
        });
    }
    else {
        $('.add').prop('disabled', true);
        $('.errorContent').text('');
        $('.errorContent').hide();
        return;
    }
}





