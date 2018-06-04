function Saludar()
{
    var nombre = $("#idNombre").val();
    var perfil = $("#idPerfil").val();

    $.ajax({
        type: "POST", //envia por post
        url:"http://localhost:8080/clase/index.php/credenciales", //envia al localhost como el postman
        data: `nombre=${nombre}&perfil=${perfil}`, //envia el valor de los campos de texto, nombre y perfil
        dataType:"text", //espera recibir texto
        async:true //lo hace de forma asincronica (porque es JSON)
    })
    .done(function(texto){

        $("#idDiv").html(texto); //si esta todo bien, escribe en la pagina la respuesta
    })

}