<html>
    <body>
        <h2>Llamada GET mediante enlace</h2>

        <a href="request.php?nombre=juan&edad=20">Enviar</a>

        <h2>Llamada GET mediante formulario</h2>
        
        <form method="get" action="request.php">
            <input type="text" name="nombre" value="" />
            <input type="text" name="edad" value="10" />
            <button type="submit">Enviar</button>
        </form>

        <h2>Llamada POST mediante formulario</h2>
        
        <form method="post" action="request.php">
            <input type="text" name="nombre" value="" />
            <input type="text" name="edad" value="10" />
            <button type="submit">Enviar</button>
        </form>

    </body>
</html>