<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CertificazioniController
{

    public function index(Request $request, Response $response, $args) {
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("SELECT * FROM certificazioni where alunno_id = $args[idAl]");
        $results = $result->fetch_all(MYSQLI_ASSOC);

        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }



    public function show(Request $request, Response $response, $args) {
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("SELECT * FROM certificazioni WHERE id = $args[id] and alunno_id = $args[idAl]");
        
       
        if (empty($results)){ 
            $response->getBody()->write(json_encode("nessun alunno o certificazione trovata"));
            return $response->withHeader("Content-type", "application/json")->withStatus(404);
        }else{
            $results = $result->fetch_all(MYSQLI_ASSOC);
            $response->getBody()->write(json_encode($results));
            return $response->withHeader("Content-type", "application/json")->withStatus(200);
        }
    }

 
    public function create(Request $request, Response $response, $args) {

        $body = json_decode($request->getBody()->getContents(), true);
       
        $titolo = $body["titolo"];
        $votazione = $body["votazione"];
        $ente = $body["ente"];

        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $creation = $mysqli_connection->query("INSERT INTO certificazioni (alunno_id, titolo, votazione, ente) VALUES ('$args[idAl]', '$titolo', '$votazione', '$ente')");


        return $response->withHeader("Content-type", "application/json")->withStatus(201);
    }




    
    public function update(Request $request, Response $response, $args) {
        $body = json_decode($request->getBody()->getContents(), true);
        $titolo = $body["titolo"];
        $votazione = $body["votazione"];
        $ente = $body["ente"];

        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $update = $mysqli_connection->query("UPDATE certificazioni SET alunno_id= '$args[idAl]', titolo='$titolo', votazione='$votazione', ente='$ente' WHERE id = $args[id]");

        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

 
    public function delete(Request $request, Response $response, $args) {
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("DELETE FROM certificazioni WHERE id = $args[id] and alunno_id = $args[idAl]");
        
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

}