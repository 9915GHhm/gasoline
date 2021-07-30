<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Combustible</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="box">
        <h1>Suministro de combustible</h1>
        <form id="frm">
            <input type="text" name="fecha" id="fecha" placeholder="fecha">
            <input type="text" name="placa" id="placa" placeholder="matrícula">
            <button type="submit" >Enviar</button>
            <output type="number">
        </form>
        <div class="mt-3" id="response">
          <div id="mensaje"></div>
        </div>
    </div>
<script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
<script src="librerias/bootstrap4/popper.min.js"></script>
<script src="librerias/bootstrap4/bootstrap.min.js"></script>
<script src="./public/js/plac.js"></script>
<script type="text/javascript">
    show();
</script>
</body>
</html>
