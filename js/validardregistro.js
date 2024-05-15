const formregistro = document.querySelector('#formregistro')
const nombreusuario = document.querySelector('#nombreusuario');
const apellidousuario = document.querySelector('#apellidousuario');
const rut = document.querySelector('#rut');
const email = document.querySelector('#email');
const fnacimiento = document.querySelector('#fnacimiento');
const clave = document.querySelector('#clave');
const clave2 = document.querySelector('#clave2');
const sexo = document.querySelector('#sexo');
const telefono = document.querySelector('#telefono');
const valoroculto1 = document.querySelector('#valoroculto1');
const valoroculto2 = document.querySelector('#valoroculto2');

formregistro.addEventListener('submit',(e)=>{
    
    if(!validarformulario()){
        e.preventDefault();
    }
})

function validarformulario(){
    const usernameVal = nombreusuario.value.trim()
    const apellidoVal = apellidousuario.value.trim()
    const rutVal = rut.value.trim()
    const emailVal = email.value.trim();
    const fnacimientoVal = fnacimiento.value.trim();
    const passwordVal = clave.value.trim();
    const cpasswordVal = clave2.value.trim();
    const sexoVal = sexo.value.trim();
    const telefonoVal = telefono.value.trim();
    const estado = valoroculto1
    const tipousuario = valoroculto2
    let success = true;

    if(usernameVal===''){
        success=false;
        setError(nombreusuario,'El nombre es requerido')
    }
    else{
        setSuccess(nombreusuario)
    }

    if(apellidoVal===''){
        success=false;
        setError(apellidousuario,'El apellido es requerido')
    }
    else{
        setSuccess(apellidousuario)
    }

    if (rutVal === '') {
        success = false;
        setError(rut, 'El RUT es requerido');
    } else if (!validateRUTFormat(rutVal)) {
        success = false;
        setError(rut, 'Ingrese un RUT válido');
    } else {
        setSuccess(rut);
    }

    if(emailVal===''){
        success = false;
        setError(email,'El email es requerido.')
    }
    else if(!validateEmail(emailVal)){
        success = false;
        setError(email,'Ingrese un email valido.')
    }
    else{
        setSuccess(email)
    }

    if(fnacimientoVal===''){
        success = false;
        setError(fnacimiento,'La fecha de nacimiento es requerida.')
    }
    else if(!validarFNacimiento(fnacimientoVal)){
        success = false;
        setError(fnacimiento,'La fecha de nacimiento es invalida.')
        }
    else{
        setSuccess(fnacimiento)
    }

    if(passwordVal === ''){
        success= false;
        setError(clave,'La contraseña es requerida.')
    }
    else if(passwordVal.length<8){
        success = false;
        setError(clave,'La contraseña debe tener al menos 8 caracteres.')
    }
    else{
        setSuccess(clave)
    }

    if(cpasswordVal === ''){
        success = false;
        setError(clave2,'ingrese su contraseña nuevamente.')
    }
    else if(cpasswordVal!==passwordVal){
        success = false;
        setError(clave2,'Las contraseñas no coinciden.')
    }
    else{
        setSuccess(clave2)
    }
    if(sexoVal === '0'){
        success = false;
        setError(sexo,'Seleccione su sexo.')

    }
    else{
        setSuccess(sexo)
    }
    if(telefonoVal === ''){
        success = false;
        setError(telefono,'El telefono es requerido.')
    }
    else if(telefonoVal.length<9){
        success = false;
        setError(telefono,'El telefono debe tener al menos 9 digitos.')
    }
    else if(telefonoVal.length>10){
        success = false;
        setError(telefono,'El telefono no debe tener mas de 10 digitos.')
        return false;
    }
    else{
        setSuccess(telefono)
        return true;
    }
    
    return success;

}
function setError(element,message){
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error')

    errorElement.innerText = message;
    inputGroup.classList.add('error')
    inputGroup.classList.remove('success')
}

function setSuccess(element){
    const inputGroup = element.parentElement;
    const errorElement = inputGroup.querySelector('.error')

    errorElement.innerText = '';
    inputGroup.classList.add('success')
    inputGroup.classList.remove('error')
}

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };

function validateRUTFormat(rut) {
    const rutsinDv = rut.replace(/[.-]/g, '');
    const rutDigitos = rutsinDv.slice(0, -1);
    const rutDv = rutsinDv.slice(-1).toUpperCase();

    if (!/^\d+$/.test(rutDigitos)) {
        return false;
    }

    let sum = 0;
    let multiplier = 2;

    for (let i = rutDigitos.length - 1; i >= 0; i--) {
        sum += parseInt(rutDigitos.charAt(i)) * multiplier;
        multiplier = multiplier === 7 ? 2 : multiplier + 1;
    }

    const dvExpected = 11 - (sum % 11);
    const dv = dvExpected === 11 ? '0' : dvExpected === 10 ? 'K' : dvExpected.toString();

    return dv === rutDv;
}

function validarFNacimiento(date) {
    const currentDate = new Date();
    const inputDate = new Date(date);
    const maxAge = 120;
    const minAge = 18;
    
    if (isNaN(inputDate.getTime())) {
        return false; // formato de fecha invalido 
    }
    else if (inputDate > currentDate) {
        return false; // fecha de nacimiento es mayor a la fecha actual
        
    }
    else if (currentDate.getFullYear() - inputDate.getFullYear() > maxAge) {
        return false; // edad es mayor a 120 años    
    }
    else if (currentDate.getFullYear() - inputDate.getFullYear() < minAge) {
        return false; // edad es menor a 18 años    
    }
    else {
        return true;
        }
    
}



