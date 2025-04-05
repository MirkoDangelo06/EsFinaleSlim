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


//certificazioni methos and endpoints


// Add these routes after the alunni routes and before $app->run()


$app->get('/certificazioni', "CertificazioniController:index");


$app->get('/certificazioni/{id:\d+}', "CertificazioniController:show");


$app->post('/certificazioni', "CertificazioniController:create");


$app->put('/certificazioni/{id:\d+}', "CertificazioniController:update");


$app->delete('/certificazioni/{id:\d+}', "CertificazioniController:delete");


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



//--PER IL CREATE
//curl -X POST http://localhost:8080/alunni -H "Content-Type: application/json" -d '{"nome": "guido", "cognome": "lauto"}'

//--PER IL DELETE
//curl -X POST http://localhost:8080/alunni/5

//--PER L'UPDATE
//curl -X PUT http://localhost:8080/alunni/3 -H "Content-Type: application/json" -d '{"nome": "GUIDO", "cognome": "LAUTO"}'
*/