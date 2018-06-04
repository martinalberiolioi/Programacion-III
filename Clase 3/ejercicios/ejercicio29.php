<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejercicio29</title>
    <style>
    body
    {   /*somehow esto es css*/
        background-color: <?php echo $_POST["color"]; ?>;
    }
    </style>
</head>
<body>
    <form method="POST">
        <select name="color">
            <option value="red">Rojo</option>
            <option value="yellow">Amarillo</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
            <option value="white">Blanco</option>
            <option value="black">Negro</option>
        </select>

        <button>Enviar</button>        

    </form>
</body>
</html>