<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require_once './vendor/autoload.php';
    
    $config['displayErrorDetails'] = true;
    $config['addContentLengthHeader'] = false;
    
    /*
    ¡La primera línea es la más importante! A su vez en el modo de 
    desarrollo para obtener información sobre los errores
     (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
      el construido en PHP webserver, entonces usted verá en la salida de la consola 
      que es útil).
    
      La segunda línea permite al servidor web establecer el encabezado Content-Length, 
      lo que hace que Slim se comporte de manera más predecible.
    */
    
    //*********************************************************************************************//
    //INICIALIZO EL APIREST
    //*********************************************************************************************//
    $app = new \Slim\App(["settings" => $config]);


    $app->get('[/]', function (Request $request, Response $response) {    
        $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
        return $response;
    
    });
    
    $app->post('[/]', function (Request $request, Response $response) {   
        $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
        return $response;
    
    });

    $app->put('[/]', function (Request $request, Response $response) {   
        $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
        return $response;
    
    });

    $app->delete('[/]', function (Request $request, Response $response) {   
        $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
        return $response;
    
    });

    //No existe la carpeta "parametros". Esto es una forma de indicar a que metodo quiero apuntar
    //desde la URL accedo como ---> http://localhost:8080/apirest01/index.php/parametros/LoQueSea

    $app->get('/parametros/{id}', function (Request $request, Response $response, $args) {   
        $id = $args['id']; //$args es un array asociativo. Entonces le paso el parametro 'id' para que me lo retorne
        $response->getBody()->write("GET => Pasaste el dato: ".$id);
        return $response;
    
    });

    //en este caso, el parametro {nombre} es opcional. Para indicar que algo es opcional, lo encerramos entre []

    $app->get('/parametros/{id}/[{nombre}]', function (Request $request, Response $response, $args) {   
        $id = $args['id']; //$args es un array asociativo. Entonces le paso el parametro 'id' para que me lo retorne
        $nombre = $args['nombre'];

        if(isset($nombre)) //si $nombre tiene algo...
        {
            $response->getBody()->write("GET => Pasaste el dato: ".$id." y el nombre: ".$nombre);
        }
        else //si esta vacio...
        {
            $response->getBody()->write("GET => Pasaste el dato: ".$id);
        }
       
        return $response;
    
    });

    //$app->any hace que entre con cualquier metodo (get, post, put, delete)
    $app->any('/todos/', function (Request $request, Response $response, $args) {

        //$request->getMethod() me devuelve por cual metodo viene (get, post, delete, put)
        $response->getBody()->write("GET => Viene por: ".$request->getMethod());
        return $response;
    
    });

    //$app->group agrupa rutas
    //cuando pongo ->group function no lleva parametros, osea va function()
    $app->group('/grupo', function () {   

        //si va por get y por apirest01/grupo/ hace esto

        $this->get('/', function (Request $request, Response $response, $args){
            $response->getBody()->write("ENTRASTE POR GET Y SIN PARAMETROS");

            return $response;
        });

        $this->get('/{id}', function (Request $request, Response $response, $args){
            $id = $args['id'];
            $response->getBody()->write("ENTRASTE POR GET Y CON PARAMETRO: ".$id);

            return $response;
        });

        //si va por post y por apirest01/grupo/loQueSea hace esto
        $this->post('/{id}', function (Request $request, Response $response, $args){
            $id = $args['id'];
            $response->getBody()->write("ENTRASTE POR POST Y CON PARAMETRO: ".$id);

            return $response;
        });
    
    });

    $app->run();

?>