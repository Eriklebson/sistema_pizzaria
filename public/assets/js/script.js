$(document).ready(function(){
    $('#cep').mask('00000-000');
    $('#tel').mask('(00) 0 0000-0000');

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