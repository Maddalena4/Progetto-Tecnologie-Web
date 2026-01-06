# Progetto – Tecnologie Web

## Descrizione
Questo progetto consiste in un sito web per lo scambio di appunti tra utenti. 
Il sistema prevede due tipi di utenti: **amministratori (admin)** e **utenti standard (user)**, ciascuno con funzionalità specifiche.

---

## Utenti di test

Nel database sono già presenti due utenti registrati per scopi di test:

| Email | Ruolo | Password |
|-------|-------|----------|
| maddalena.prandini@studio.unibo.it | admin | ok |
| elena.fucci3@studio.unibo.it | user  | prova |

Questi account permettono di testare le principali funzionalità del sito per entrambi i ruoli.

---

## Registrazione e login

- La **registrazione** di nuovi utenti è consentita solo per utenti non presenti nel database.  
- Gli account con ruolo **admin** possono solo effettuare il login; non è prevista la possibilità di registrare nuovi admin tramite il sito.

---

## Funzionalità

### Amministratore (*admin*)
- Creazione, modifica ed eliminazione di corsi e facoltà.  
- Visualizzazione di tutti i corsi e tutte le facoltà presenti nel database.

### Utente standard (*user*)
- Visualizzazione dei corsi e delle facoltà a cui ha accesso tramite la voce di menu **Facoltà**.  
- Caricamento di file PDF relativi ai corsi.  
- Visualizzazione di tutti i PDF presenti nel database.  
- Assegnazione di valutazioni ai corsi.  
- Possibilità di seguire corsi di interesse; i corsi seguiti sono accessibili nella sezione **Seguiti** per averli sempre a portata di mano.  
- Ricezione di notifiche quando un altro utente carica un nuovo PDF in un corso seguito.

---

## Note aggiuntive
- Le funzionalità del sito permettono di testare completamente sia gli amministratori che gli utenti standard.  
- L’interfaccia separa chiaramente le operazioni disponibili in base al ruolo dell’utente.
