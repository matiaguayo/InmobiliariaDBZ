function validar() {
    
    if(document.form.email.value =="")
    {
        alert("Ingresa Usuario");
        document.form.email.focus();
        return false;
    }
    if(document.form.pwd.value =="")
    {
        alert("Ingresa Contraseña");
        document.form.pwd.focus();
        return false;
    }

    document.form.submit();
}
