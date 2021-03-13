//// VALIDACIONES LOGIN

function valida_usuario(_input,_limite)
{
    user= _input.value;
    _input.value=user.replaceAll(/[^a-zA-Z]+/g,'');     
    if (_input.value.length > _limite )
    {                
        _input.value=_input.value.substr(0,_limite);        
        return false;
    }        
}

function valida_password()
{
  user= document.getElementById("contrasenia").value;           
  document.getElementById("contrasenia").value=user.replaceAll(/[^a-zA-Z0-9]+/g,'');
  if (user.length > 15 )
  {        
    //   $('#MensajesModal').modal('show');        
      document.getElementById("contrasenia").value=user.substr(0,15);
      return false;
  }
       
}

//// VALIDACIONES REGISTRO

function valida_caja_texto(_input,_limite)
{    
    cadena=_input.value;    
    _input.value=cadena.replaceAll(/[^a-zA-Z0-9\_\.\-\,]+/g,'');    
    if (_input.value.length > _limite ) 
    {                
        _input.value=_input.value.substr(0,_limite);                        
    }else{
        foco_validacion(_input.name,"green");
    }
}

function valida_solo_numeros(_input,_limite)
{    
    cadena=_input.value; 
    _input.value=cadena.replaceAll(/[^0-9]+/g,'');    
    if (_input.value.length > _limite ) 
    {                
        _input.value=_input.value.substr(0,_limite);        
        foco_validacion(_input.name,"green");        
    }            
}

function valida_select(_input){    
    if(_input.value)
        foco_validacion(_input.name,"green");
    else
        foco_validacion(_input.name,"red");

}


function valida_fecha(_input){                         
    try
    {               
        cadena=_input.value;    
        if(cadena.length>10)
            _input.value=_input.value.substr(0,10);        

        if (cadena.match(/\d{4}-\d{2}-\d{-}/) !== null) 
        {                            
            foco_validacion(_input.name,"green");                                        
        }            
        else
        {
            foco_validacion(_input.name,"red");        
        }
    }catch
    {
        foco_validacion(_input.name,"red");
    }
}

function fecha_isvalid(_name){
    try
    {                
        if($("#"+_name).val().length>0){            
            var fecha = $("#"+_name).val().split("-");        
            d=fecha[2];        
            m=fecha[1];
            a=fecha[0];                            
            var ok = true;
            if( (a < 1900) || (a > 2050) || (m < 1) || (m > 12) || (d < 1) || (d > 31) )
            ok = false;
            else
            {
            if((a%4 != 0) && (m == 2) && (d > 28))
                ok = false;
            else
            {
                if( (((m == 4) || (m == 6) || (m == 9) || (m==11)) && (d>30)) || ((m==2) && (d>29)) )
                    ok = false;
            }
            }        
        }else{
            ok=false;
        }
        return ok;
    }
    catch{
        return false;
    }
}

function foco_validacion(_elemento,_color)
{
    document.getElementById(_elemento).style.borderColor = _color;
    document.getElementById(_elemento).focus();
}


//////////////////////  BANDEJA

