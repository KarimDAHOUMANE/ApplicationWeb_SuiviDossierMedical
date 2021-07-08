$(document).ready(function(){
    var result=true;
 $('form').submit(function(){
                    
          

                                if ($('#nom').val()=="") {

                                    $('#nom').css('border-color','#ff0000');
                                    $('#nom').next('.error').fadeIn('fast').text('champs obligatoire');
                                    result=false;    }

                                    return result;



                        });

                    });

$.setDjValidatorStyle('display: -webkit-inline-box;color:#d80313;  ');
                    
                    $(document).ready(function()
                    {
                        $('#validate').click(function()
                        {
                            return($('#form').djValidator('validate'));
                        });
                    });
          