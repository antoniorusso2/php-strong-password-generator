## 1. Creare un form che invii in GET la lunghezza desiderata della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere minuscole, maiuscole, numeri e/o simboli) della lunghezza specificata, da restituire all’utente. Scirivamo tutta la logica ed il layout in un unico file index.php

## 2.Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php, che includeremo poi nella pagina principale.

## 3.Invece di visualizzare la password generata nella stessa pagina (index.php), effettuiamo un redirect ad una seconda pagina (result.php), dedicata proprio a mostrare il risultato. Questa pagina riceverà la password che era stata generata tramite sessione e la mostrerà all’utente.

## 4.Gestire ulteriori parametri nel form per le password, dando la possibilità all’utente di specificare quali set di caratteri possono essere ammessi nella password da generare, tra lettere maiuscole, lettere minuscole, numeri e simboli.
