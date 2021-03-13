function valida_acceso(){    
    user=document.getElementById("usuario").value;
    pass=document.getElementById("contrasenia").value;           
        
    if(user!="" && pass!="")
    { 
            if(pass.length>10)
            {            
                $.ajax({
                    url: "../control/valida_acceso.php",
                    type: "POST",
                    data: "usuario="+user+"&password="+pass,
                    success: function(resp){                        
                        console.log(resp);
                        if(resp=="ok"){                                        
                            location.href = 'index.php';
                        }else{
                            $('#modal_datos').text(resp);
                            $('#MensajesModal').modal('show');                            
                        }
                    }        
                });
            }
            else{
                $('#modal_datos').text("La contraseña debe tener más de 10 caracteres");
                $('#MensajesModal').modal('show');
            }
    }else
    {
        $('#modal_datos').text("Tiene que ingresar los campos: usuario y contraseña");
        $('#MensajesModal').modal('show');
    }
}

// categorias=[];
////// ACCIONES PARA REGISTRO

function CargarCatalogos(_catalogo){    
    $.ajax({
        url: "../datos/catalogos.php",
        type: "POST",
        data: "catalogo="+_catalogo,
        success: function(res){                
            _json=JSON.parse(res);         
            let cat = _json.catalogo;
            cat.map((dato) => {                              
                $("#"+_catalogo).append('<option value="' + dato.id + '">' + dato.nombre + '</option>'); 
            })                                       
        }        
    });        
}

function valida_campo_vacio(_id){
    if(document.getElementById(_id).value.length>0){
        foco_validacion(_id,"green");
        return "ok";
    }
    else{
        foco_validacion(_id,"red");  
        return "no";
    }
}

function valida_registro()
{            
    var band=true;
    if(valida_campo_vacio("nombre")!="ok"){band=false};
    if(valida_campo_vacio("descripcion")!="ok"){band=false;};
    if(valida_campo_vacio("categoria")!="ok"){band=false;};
    if(valida_campo_vacio("sucursal")!="ok"){band=false;};
    if(valida_campo_vacio("precio")!="ok"){band=false;};    
    if(fecha_isvalid("fecha_compra")){document.getElementById("fecha_compra").style.borderColor = "green";}
        else{ foco_validacion("fecha_compra","red"); band=false; }        

    if(!band)
        return false;
        
    var producto={        
        nombre:document.getElementById("nombre").value,
        descripcion:document.getElementById("descripcion").value,
        categoria :document.getElementById("categoria").value,
        sucursal :document.getElementById("sucursal").value,
        precio :document.getElementById("precio").value,
        fecha_compra :document.getElementById("fecha_compra").value,
        estado :1
    };
        
    var  json_datos= JSON.stringify(producto);

    $.ajax({
        url: '../datos/registrar_producto.php',
        type: 'POST',
        data: {producto: json_datos},
        success: function(response)
        {
            //console.log(response);
            if(response=="ok"){                
                $('#modal_datos').text("El registo ha sido dado de alta exitosamente");
                document.getElementById("formulario_registro").reset();
            }
                else
                $('#modal_datos').text("Error al dar de alta el producto");                

            $('#MensajesModal').modal('show');
        }
    });

}



//////////////////////  BANDEJA
function obtener_datos_tabla(){    
    var datos;
        $.ajax({
            url: "../datos/datos_bandeja.php",
            type: "POST",
            data: "accion=consulta",
            async: false,
            success: function(respuesta){                     
                //console.log(respuesta);
                _json=JSON.parse(respuesta);                
                datos=_json.data;
                return datos;
            }        
        });     
        return datos;
}

function obtener_datos_producto(_id){
    $.ajax({
        url: "../datos/datos_bandeja.php",
        type: "POST",
        data: {accion:"consulta_producto",id:_id},
        success: function(respuesta){                     
            // console.log(respuesta);
            _json=JSON.parse(respuesta);                
            json=_json.data[0];        
            i=0;    
            var elemento;
            var _edo=0;
            for (var clave in json){               
                if (json.hasOwnProperty(clave)) 
                {     
                   if(i>0 && i<=6){
                       elemento="campo_"+i;
                        document.getElementById(elemento).value=json[clave];
                   }
                   if(i==7){                       
                       if(json[clave]=="Abierto")                    
                          _edo=1
                        if(json[clave]=="Cerrado")                    
                          _edo=2

                        document.getElementById("estado").value= _edo;//json[clave];
                   }

                    if(i==8)                
                        document.getElementById("campo_8").value=json[clave];
                   
                  //console.log(clave + " - "+i +" - " +json[clave]);
                  i++;
                }
              }
                    
        }        
    });  
};

function edita_producto(id){            
    // console.log("editar"+id);       
    location.href="edita_registro.php?id="+id;
}

function elimina_producto(id_producto){        
    $.ajax({
        url: "../datos/datos_bandeja.php",
        type: "POST",
        data: { accion: "eliminar", id : id_producto},
        success: function(respuesta)
        {                     
            if(respuesta="ok")
            {
                // console.log("Producto Eliminado");                              
                location.href = 'bandeja.php';                
            }                
        }        
    });     
}

function guardar_estado(_id){            
    var band=true;
    if(valida_campo_vacio("estado")!="ok"){band=false};
    if(valida_campo_vacio("campo_8")!="ok"){band=false};
    
    if(!band)
    return false;

    _estado=document.getElementById("estado").value;
    _comentarios=document.getElementById("campo_8").value;

    $.ajax({
        url: "../datos/datos_bandeja.php",
        type: "POST",
        data: { accion: "edita_estado"
                ,id : _id
                ,estado : _estado
                ,comentarios : _comentarios
            },
        success: function(respuesta)
        {                                 
            if(respuesta=="ok")
            {
              //  console.log("Cambio de estado");
                location.href = 'bandeja.php';         
            }                
        }        
    });     
}


////// REPORTES

function obtener_datos_reporte(){    
    var datos;
        $.ajax({
            url: "../datos/operacionesReporte.php",
            type: "POST",
            data: "accion=consulta",
            async: false,
            success: function(respuesta){                     
                //console.log(respuesta);
                _json=JSON.parse(respuesta);                
                datos=_json.data;
                return datos;
            }        
        });     
        return datos;
}