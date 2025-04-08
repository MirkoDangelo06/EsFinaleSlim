<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/CertificazioniController.php';

$app = AppFactory::create();

//alunni method and endpoints
$app->get('/alunni', "AlunniController:index");

$app->get('/alunni/{id:\d+}', "AlunniController:show");

$app->post('/alunni', "AlunniController:create");

$app->put('/alunni/{id:\d+}', "AlunniController:update");

$app->delete('/alunni/{id:\d+}', "AlunniController:delete");


//certificazioni methods and endpoints


$app->get('/alunni/{idAl}/certificazioni', "CertificazioniController:index"); // tutte le certificazioni di uno studente


$app->get('/alunni/{idAl}/certificazioni/{id:\d+}', "CertificazioniController:show");// una certificazione di un certo utente



$app->post('/alunni/{idAl}/certificazioni', "CertificazioniController:create"); // aggiunge una certificazione a un certo studente



$app->put('/alunni/{idAl}/certificazioni/{id}', "CertificazioniController:update"); // update di una certificazione di un certo alunno 


$app->delete('/alunni/{idAl}/certificazioni/{id}', "CertificazioniController:delete"); // delete di una certificazione di un certo alunno 


$app->run();



/*
* Recuperare tutti gli alunni.
* Recuperare un singolo alunno tramite id.
* Creare un nuovo alunno.
* Aggiornare le informazioni di un alunno.
* Eliminare un alunno.


* Recuperare tutte le certificazioni di un alunno.
* Recuperare una singola certificazione tramite id.
* Creare un nuova certificazione per un alunno.
* Aggiornare le informazioni di una certificazione.
* Eliminare una certificazione.




Implementare controlli per gestire errori comuni (es. alunno non trovato, dati mancanti o errati).
(Opzionale) Assicurarsi che i dati inviati siano validi prima di inserirli nel database.
(Opzionale) Aggiungere la possibilità di filtrare e ordinare i risultati nelle richieste GET.



//--PER IL CREATE alunno
//curl -X POST http://localhost:8080/alunni -H "Content-Type: application/json" -d '{"nome": "guido", "cognome": "lauto"}'



//curl -X DELETE della certificazione http://localhost:8080/alunni/1/certificazioni/1 


//--PER L'UPDATE alunno 
//curl -X PUT http://localhost:8080/alunni/3 -H "Content-Type: application/json" -d '{"nome": "GUIDO", "cognome": "LAUTO"}'
*/


/*per create certificazione
curl -X POST http://localhost:8080/alunni/1/certificazioni -H "Content-Type: appplication/json" -d '{"titolo": "maialona", "votazione":  "70", "ente": "roar"}'
*/