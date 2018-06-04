<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejercicio30</title>
</head>
<body>
    <form action="manejador.php" method="POST">
    <table> 
        <tr>
            <td>
                <select name="Filas">
                <?php //inyecta codigo de php, para con el for ahorrarme hardcodear los 50 espacios manualmente
                    for($i=1; $i < 51; $i++)
                    {
                        echo "<option value=".$i.">$i</option>";                                   
                    }
                ?>
                </se
            </td>
            <td>
                Filas
            </td>
        </tr>

        <tr>
            <td>
                <select name="Columnas">
                    <?php //inyecta codigo de php, para con el for ahorrarme hardcodear los 50 espacios manualmente
                        for($i=1; $i < 51; $i++)
                        {
                            echo "<option value=".$i.">$i</option>";                                   
                        }
                    ?>
                </select>
            </td>
            <td>
                Columnas
            </td>
        </tr>

        <tr>
            <td>
                <button type="submit" id="boton">Generar tabla</button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>