var frm = document.getElementById('frm'); // llama al formulario "frm"

var response = document.getElementById('response'); // Detecta el campo html del "div - response"


frm.addEventListener('submit', function(e){  // Detecta el botón de tipo "submit" del fomulario "frm"
    e.preventDefault();
    var datos = new FormData(frm);
    var fecha = datos.get('fecha');
    var placa = datos.get('placa');

if(placa != '' && fecha == ''){

 $.ajax({
        url: "algoritmo/ShowPlacs.php",
        type: "POST",
        dataType: 'json',
        data: "placa=" + placa
        }).done(function(r) { // La variable (r) contiene la información que viene del servidor (BackEnd).

            if(r === false){
                response.innerHTML = `
                    <div class="atencion" role="alert">
                    <article>
                    <h3><strong>¡Sólo puede introducir números y<br>únicamente un dígito!</strong></h3>
                    </article>
                   </div>
                `
                reload('./');
            }else{
                response.innerHTML = `
                    <div class="alert alert-primary" role="alert">
                    <h3>Consultando placa Nro: <b class="consult"><span class="parpadea text">`+placa+`</b></h3>
                    <h3>El <b class="clo">`+r[0]+`, `+r[1]+`</b> les corresponden<br> 
                    a las placas que terminan en: <b class="clo"><span class="parpadea text">`+r[2]+`</b></h3>
                    <button onclick="reloadPage('./');">REGRESAR</button>
                   </div>
                `
            }
        }).fail(function(r) {
            console.log(r);
        }).always(function() {
            console.log("complete");
        });

}else if(placa == '' && fecha != ''){

    $.ajax({
        url: "algoritmo/ShowDate.php",
        type: "POST",
        dataType: 'json',
        data: "fecha=" + fecha
        }).done(function(r) { // La variable (r) contiene la información que viene del servidor (BackEnd).

            if(r === false){
                response.innerHTML = `
                    <div class="atencion" role="alert">
                    <article>
                    <h3><strong>La fecha se introdujo de forma incorrecta, <br>debe utilizar el formato dd/mm/YYYY</strong></h3>
                    <article>
                   </div>
                `
                reload('./');
            }else{
                response.innerHTML = `
                    <h3>Consultando fecha: <b class="consult"><span class="parpadea text">`+fecha+`</b></h3>
                    <div class="alert alert-primary" role="alert">
                    <h3>El <b class="clo">`+r[0]+`, `+r[1]+`</b> les corresponden<br> 
                    a las placas que terminan en: <b class="clo"><span class="parpadea text">`+r[2]+`</b></h3>
                    <button onclick="reloadPage('./');">REGRESAR</button>
                   </div>
                `
            }

        }).fail(function(r) {
            console.log(r);
        }).always(function() {
            console.log("complete");
        });

}else if(placa == '' && fecha == ''){

    response.innerHTML = `
            <div class="atencion" role="alert">
                <article>
                <h3><strong>Debe ingresar algunos de los dos datos:<br>fecha o matrícula para su verificación.</strong></h3>
                <article>
            </div>
        `
    reload('./');

}else{

    response.innerHTML = `
            <div class="atencion" role="alert">
            <article>
                <h3><strong>¡Sólo puede verificar un dato a la vez!</strong></h3>
                <article>
            </div>
        `
    reload('./');
}

});

function reloadPage(url) {
    setTimeout(function() {
        window.location.href = url
    }, parseInt(url) * 1000);
}

function reload(url) {
    setTimeout(function() {
        window.location.href = url
    }, 4000);
}

function show() {
    $.ajax({
        url: "algoritmo/ShowNow.php",
        type: "POST",
        dataType: 'json',
        }).done(function(r) { // La variable (r) contiene la información que viene del servidor (BackEnd).

                response.innerHTML = `
                    <div class="alert alert-primary" role="alert">
                    <h3>Para hoy <b class="clo">`+r[0]+`, `+r[1]+`</b> les corresponden<br> 
                    a las placas que terminan en: <b class="clo"><span class="parpadea text">`+r[2]+`</b></h3>
                   </div>
                `
        }).fail(function(r) {
            console.log(r);
        }).always(function() {
            console.log("complete");
        });
}




