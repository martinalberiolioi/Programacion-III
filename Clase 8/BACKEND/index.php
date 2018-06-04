<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once './vendor/autoload.php';

    $config['displayErrorDetails'] = true;
    $config['addContentLengthHeader'] = false;

    $app = new \Slim\App(["settings" => $config]);

    /*----------------------------------------------------------------------*/

    //agrego el siguiente metodo para cuando entra por PUT y a la direccion http://localhost:8080/clase/index.php/param
    $app->put('/param', function (Request $request, response $response){

        $response->getBody()->write("ENTRASTE POR PUT A /PARAM !!");
        return $response;

    })->add(function($request,$response,$next){

        $response->getBody()->write("antes -- middleware nivel (UNO MENOS DE GLOBAL)<br/>");

        $response = $next($request,$response);

        $response->getBody()->write("<br/>despues -- middleware nivel (UNO MENOS DE GLOBAL)<br/>");
    
        return $response;
    });


    $app->group('/credenciales', function () {

        $this->get('[/]', function (Request $request, response $response){

            $response->getBody()->write("ENTRE AL GRUPO POR GET<br/>");
            return $response;
        });

        $this->post('[/]', function (Request $request, response $response){

            $response->getBody()->write("ENTRE AL GRUPO POR POST<br/>");
            return $response;
        });

    })->add(function($request,$response,$next){
        
        if($request->isGet())
        {
            $response->getBody()->write("VALIDE POR MW Y ESTAS EN GET. EL MW SIGUE DE LARGO");

            return $response;
        }
        else if($request->isPost())
        {
            $parametros = $request->getParsedBody(); //devuelve un array con todos los clave-valor que se envian como argumento

            //si nombre y perfil tienen algo...
            if(isset($parametros['nombre']) && isset($parametros['perfil']))
            {
                //si la clave "perfil" contiene "admin"...
                if($parametros['perfil'] == "admin")
                {
                    //le pega al next SOLAMENTE cuando entre por post y el perfil sea admin
                    //next contiene el metodo que se ejecuta en post ("entre al grupo por post")                     
                    $response = $next($request, $response);

                    $response->getBody()->write("BIENVENIDO ".$parametros['nombre']);

                    return $response;
                }
                else //en caso que el perfil no sea admin, muestra el mensaje de error pero NO EJECUTA el middleware. Muere ahi
                {
                    $response->getBody()->write("PERMISOS REVOCADOS");
                }
            }
            else //en caso que haya error de login, muestra el mensaje de error pero NO EJECUTA el middleware. Muere ahi
            {
                $response->getBody()->write("ERROR DE LOGIN");
            }
            
        }

        return $response;
    });

    /*---------------------------------------------------------------------------------------------------*/

    $app->group('/ejerCredenciales', function () {

        $this->get('[/]', function (Request $request, response $response){

            $response->getBody()->write("GET --- EJERCICIO<br/>");
            return $response;
        });

        $this->post('[/]', function (Request $request, response $response){

            $response->getBody()->write("POST --- EJERCICIO<br/>");
            return $response;
        });

        $this->put('[/]', function (Request $request, response $response){

            $response->getBody()->write("PUT --- EJERCICIO<br/>");
            return $response;
        });

        $this->delete('[/]', function (Request $request, response $response){

            $response->getBody()->write("DELETE --- EJERCICIO<br/>");
            return $response;
        });

    })->add(function($request,$response,$next){

        $parametros = $request->getParsedBody(); //devuelve un array con todos los clave-valor que se envian como argumento

        //si nombre y perfil tienen algo...
        if(isset($parametros['usuario']) && isset($parametros['contrasena']))
        {
            try 
            {
                //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
                $origenDatos = 'mysql:host=localhost;dbname=credenciales;charset=utf8';
                $usuario='root';
                $clave='';
    
                $objetoPDO = new PDO($origenDatos, $usuario, $clave);
                //-------------HASTA ACA LA CONEXION---------------//
    
    
                $sql = $objetoPDO->prepare("SELECT usuario, contrasena, id FROM usuarios WHERE contrasena='".$parametros['contrasena']."'");
                //prepara la instruccion, para que sea optimizada una sola vez, y luego ejecutada con ->execute() las veces que quiera
    
                $sql->execute();

                if($sql->rowCount() === 1)
                {
                    //le pega al next SOLAMENTE cuando entre por post y el perfil sea admin
                    //next contiene el metodo que se ejecuta en post ("entre al grupo por post")                     
                    $response = $next($request, $response);
    
                    $response->getBody()->write("BIENVENIDO ".$parametros['usuario']."<br/>");
    
                    return $response;
                }
                else //en caso que el perfil no sea admin, muestra el mensaje de error pero NO EJECUTA el middleware. Muere ahi
                {
                    $response->getBody()->write("PERMISOS REVOCADOS<br/>");
                }

            } catch (PDOException $e)
            {
                echo "Error!!!\n" . $e->getMessage();
            } 
             

            /* ESTO LO HICE EN OTRO EJERCICIO
            //si la clave "perfil" contiene "admin"...
            if($parametros['contrasena'] == "123")
            {
                //le pega al next SOLAMENTE cuando entre por post y el perfil sea admin
                //next contiene el metodo que se ejecuta en post ("entre al grupo por post")                     
                $response = $next($request, $response);

                $response->getBody()->write("BIENVENIDO ".$parametros['usuario']);

                return $response;
            }
            else //en caso que el perfil no sea admin, muestra el mensaje de error pero NO EJECUTA el middleware. Muere ahi
            {
                $response->getBody()->write("PERMISOS REVOCADOS");
            }*/
        }
        else //en caso que haya error de login, muestra el mensaje de error pero NO EJECUTA el middleware. Muere ahi
        {
            $response->getBody()->write("ERROR DE LOGIN");
        }
        return $response;
    });


    
    //agrego la funcion MiddleWare (esto va a lo ultimo junto al run)
    $app->add(function($request,$response,$next){
        $response->getBody()->write("antes -- middleware nivel GLOBAL<br/>"); //antes de la ejecucion del metodo en $next (lo que mande por get o post)

        $response = $next($request,$response); //guarda en $response el metodo que viene en $next (lo que mande por get o post)

        $response->getBody()->write("<br/>despues -- middleware nivel GLOBAL<br/>"); //Despues de la ejecucion del metodo en $next (lo que mande por get o post)

        return $response;
    });


    $app->run();

?>