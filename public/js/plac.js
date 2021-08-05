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

            if(r[0] === false){

                response.innerHTML = r[1];
                reload('./');

            }else{

                response.innerHTML = r+`<button onclick="reloadPage('./');">REGRESAR</button>`;
        
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

            if(r[0] === false){

                response.innerHTML = r[1];
                reload('./');

            }else{

                response.innerHTML = r+`<button onclick="reloadPage('./');">REGRESAR</button>`;

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
                <h3><strong>Debe ingresar algunos de los dos(02) datos:<br>fecha o matrícula para su verificación.</strong></h3>
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

function show() {
    $.ajax({
        url: "algoritmo/ShowNow.php",
        type: "POST",
        dataType: 'json',
        }).done(function(r) { // La variable (r) contiene la información que viene del servidor (BackEnd).
            response.innerHTML = r;
        }).fail(function(r) {
            console.log(r);
        }).always(function() {
            console.log("complete");
        });
}

function reloadPage(url) {
    setTimeout(function() {
        window.location.href = url
    }, parseInt(url) * 1000);
}

function reload(url) {
    setTimeout(function() {
        window.location.href = url
    }, 3000);
}





