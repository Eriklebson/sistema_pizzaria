$('#cep').on('blur', function(){
    cep = $(this).val().replace('-', '');
    $.get('https://viacep.com.br/ws/'+cep+'/json/', function(data){
        $('#logradouro').val(data.logradouro).prop('readonly', true);
        $('#bairro').val(data.bairro).prop('readonly', true);
        $('#estado').val(data.localidade).prop('readonly', true);
    })
});