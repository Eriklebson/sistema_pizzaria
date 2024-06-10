const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
$(document).ready(function(){
    $('#cep').mask('00000-000');
    $('#phone').mask('(00) 0 0000-0000');
    $('#price').mask("#.##0,00", {reverse: true});

    //verificação de dark mode
    if(Cookies.get('dark-mode') == 'true'){
        $('#theme').attr('data-bs-theme', 'dark');
        $('#theme').addClass('dark-mode');
        $("#check-darkm").prop('checked', true);
    }
});
$(document).scroll(function() {
    var y = $(this).scrollTop();
    if(y > 10){
        $('.menu-horizontal').css({
            'margin-top': '-100px'
        });
    }
    else{
        $('.menu-horizontal').css({
            'position': 'absolute',
            'margin-top': '0px'
        });
    }
    if (y > 400) {
        $('.menu-horizontal').css({
            'position': 'fixed',
            'margin-top': '0px'
        });
    }
});

//alterar tema
$("#check-darkm").click(function(){
    if($(this).prop("checked")){
        $('#theme').attr('data-bs-theme', 'dark');
        $('#theme').addClass('dark-mode');
        Cookies.set('dark-mode', true, { path: '/' });
    }
    else{
        $('#theme').attr('data-bs-theme', 'ligth');
        $('#theme').removeClass('dark-mode');
        Cookies.set('dark-mode', false, { path: '/' });
    }
    
});

//Gerador de senha
$("#getPassword").click(function(){
    var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ!@#$%^&*()+?><:{}[]";
    var passwordLength = 16;
    var password = "";
    for (var i = 0; i < passwordLength; i++) {
      var randomNumber = Math.floor(Math.random() * chars.length);
      password += chars.substring(randomNumber, randomNumber + 1);
    }
    document.getElementById('password').value = password
});
