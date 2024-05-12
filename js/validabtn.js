function validar(btn) 
{
    // Aqui ya no pasa por la validación el boton cancelar
    if(btn!="Cancelar")
    {
        if(document.frm_usu.frm_name.value=="")
            {
                alert("Debe ingresar Nombre!");
                document.frm_usu.frm_name.focus();
                return false;
            }
    
        if(document.frm_usu.frm_fecha.value=="")
            {
                alert("Debe ingresar Fecha nacimiento del usuario!");
                document.frm_usu.frm_fecha.focus();
                return false;
            }
    
        if(document.frm_usu.frm_apellido.value=="")
            {
                alert("Debe ingresar el apellido del usuario!");
                document.frm_usu.frm_apellido.focus();
                return false;
            }
        if(document.frm_usu.frm_sexo.value=="")
            {
                alert("Debe ingresar sexo!");
                document.frm_usu.frm_sexo.focus();
                return false;
            }
        if(document.frm_usu.frm_rut.value=="")
            {
                alert("Debe ingresar RUT!");
                document.frm_usu.frm_rut.focus();
                return false;
            }else{
                if(Fn.validaRut(document.frm_usu.frm_rut.value))
                    {
                        // alert("RUT VALIDO");
                    }else{
                        alert("RUT INVALIDO");
                        document.frm_usu.frm_rut.value=="";
                        document.frm_usu.frm_rut.focus();
                        return false;
                    }
            }
        
        if(document.frm_usu.frm_email.value=="")
            {
                alert("Debe ingresar email!");
                document.frm_usu.frm_email.focus();
                return false;
            }else {
                if(!validaEmail()){
                    alert("EMAIL invalido, pruebe nuevamente!");
                    document.frm_usu.frm_email.focus();
                    return false;
                }        
            }
        if(btn=="Ingresar")
            {
            if(document.frm_usu.frm_clave.value=="")
                {
                    alert("Debe ingresar la contraseña!");
                    document.frm_usu.frm_clave.focus();
                    return false;
                }
            if(document.frm_usu.frm_re_clave.value=="")
                {
                    alert("Debe ingresar la contraseña nuevamente!");
                    document.frm_usu.frm_re_clave.focus();
                    return false;
                }
                if(document.frm_usu.frm_clave.value!=document.frm_usu.frm_re_clave.value)
                    {
                        alert("Contraseñas deben ser iguales");
                        document.frm_usu.frm_clave.value="";
                        document.frm_usu.frm_re_clave.value="";
                        document.frm_usu.frm_clave.focus();
                        return false;
                    }
                    // Si esta contraseña es distinta a ela otra contraseña
            }
        if(document.frm_usu.frm_estado.value==0)
            {
                alert("Debe ingresar el estado del usuario");
                document.frm_usu.frm_estado.focus();
                return false;
            }
        if(document.frm_usu.frm_id_tipo.value==0)
            {
                alert("Debe ingresar el id tipo!");
                document.frm_usu.frm_id_tipo.focus();
                return false;
            }


        }
    document.frm_usu.accion.value=btn;
    document.frm_usu.submit();
}

function validaEmail(){
                
	
	var emailField = document.getElementById('frm_email');
	// DEFINE EXPRESIÓN REGULAR
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
	if( validEmail.test(emailField.value) ){
		return true;
	}else{
		return false;
	}
} 

var Fn = {
	// Valida el rut con su cadena completa "XXXXXXXX-X"
	validaRut : function (rutCompleto) {
		if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
			return false;
		var tmp 	= rutCompleto.split('-');
		var digv	= tmp[1]; 
		var rut 	= tmp[0];
		if ( digv == 'K' ) digv = 'k' ;
		return (Fn.dv(rut) == digv );
	},
	dv : function(T){
		var M=0,S=1;
		for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;
		return S?S-1:'k';
	}
}
