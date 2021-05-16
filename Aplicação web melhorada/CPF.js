function valida(){
      if(valida_cpf(document.getElementById('cpf').value))
  
      $("head").after("<script>$(document).ready(function ($) {  $('.col-7 .form-control').attr('class', 'form-control is-valid'), $('#botSM').removeAttr('disabled', '')});</script> ")  
  
     
      else
            $("head").after("<script>$(document).ready(function ($) {  $('.col-7 .form-control').attr('class', 'form-control is-invalid'), $('#botSM').attr('disabled', '')});</script>")                                                                                                                                       
              
      
      //$("head").after("<script>$(document).ready(function ($) {   $('#botSM').attr('disabled', '') });</script> ")
     
     // $('.col-7 .form-control').attr('class', 'form-control is-invalid'), $('#botSM').attr('disabled', '')                                                                                                                                      
  
  }
  
  
  
  function valida_cpf(cpf){
        var numeros, digitos, soma, i, resultado, digitos_iguais;
        digitos_iguais = 1;
  
       cpf = cpf.replace(".", "");
       cpf = cpf.replace(".", "");
       cpf = cpf.replace(".", "");
       cpf = cpf.replace("-", "");
       cpf = cpf.replace("-", "");
       cpf = cpf.replace("-", "");
  
  
     
             
  
        if (cpf.length < 11)
              return false;
        for (i = 0; i < cpf.length - 1; i++)
              if (cpf.charAt(i) != cpf.charAt(i + 1))
                    {
                    digitos_iguais = 0;
                    break;
                    }
        if (!digitos_iguais)
              {
              numeros = cpf.substring(0,9);
              digitos = cpf.substring(9);
              soma = 0;
              for (i = 10; i > 1; i--)
                    soma += numeros.charAt(10 - i) * i;
              resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
              if (resultado != digitos.charAt(0))
                    return false;
              numeros = cpf.substring(0,10);
              soma = 0;
              for (i = 11; i > 1; i--)
                    soma += numeros.charAt(11 - i) * i;
              resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
              if (resultado != digitos.charAt(1))
                    return false;
              return true;
              }
        else
              return false;
  }