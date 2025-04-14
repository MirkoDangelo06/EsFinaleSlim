<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/CertificazioniController.php';

$app = AppFactory::create();
$app->addErrorMiddleWare(true,true,true);

//alunni method and endpoints
$app->get('/alunni', "AlunniController:index");

$app->get('/alunni/{id:\d+}', "AlunniController:show");

$app->post('/alunni', "AlunniController:create");

$app->put('/alunni/{id:\d+}', "AlunniController:update");

$app->delete('/alunni/{id:\d+}', "AlunniController:delete");


//certificazioni methods and endpoints


$app->get('/alunni/{idAl:\d+}/certificazioni', "CertificazioniController:index"); // tutte le certificazioni di uno studente


$app->get('/alunni/{idAl:\d+}/certificazioni/{id:\d+}', "CertificazioniController:show");// una certificazione di un certo utente



$app->post('/alunni/{idAl:\d+}/certificazioni', "CertificazioniController:create"); // aggiunge una certificazione a un certo studente



$app->put('/alunni/{idAl:\d+}/certificazioni/{id:\d+}', "CertificazioniController:update"); // update di una certificazione di un certo alunno 


$app->delete('/alunni/{idAl:\d+}/certificazioni/{id:\d+}', "CertificazioniController:delete"); // delete di una certificazione di un certo alunno 


$app->run();


//--PER IL CREATE alunno
//curl -X POST http://localhost:8080/alunni -H "Content-Type: application/json" -d '{"nome": "guido", "cognome": "lauto"}'



//curl -X DELETE http://localhost:8080/alunni/1/certificazioni/1 


//--PER L'UPDATE alunno 
//curl -X PUT http://localhost:8080/alunni/3 -H "Content-Type: application/json" -d '{"nome": "GUIDO", "cognome": "LAUTO"}'

//-- Per update certificazione
/*curl -X PUT http://localhost:8080/alunni/1/certificazioni/2 
  -H "Content-Type: application/json" 
  -d '{"titolo": "Certificazione Laravel", "votazione": "95", "ente": "Boolean"}'
*/

/*per create certificazione
curl -X POST http://localhost:8080/alunni/1/certificazioni -H "Content-Type: appplication/json" -d '{"titolo": "maialona", "votazione":  "70", "ente": "roar"}'
*/

/*per eliminazione certificazione
    curl -X DELETE http://localhost:8080/alunni/1/certificazioni/2
*/


