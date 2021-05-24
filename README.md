# USM


## Lezione del 3 Maggio 2021
sul **branch main** c'è l'ultima versione fatta in classe

> $ git clone -b main https://github.com/corsidrive/user-management-system.git usm_versione_3_maggio

ci sono dei ragionamenti lasciati à metà sulla mofifica dell'utente.


## Versione finale (o quasi)

---
### [Guarda questo video](https://drive.google.com/file/d/1_NqRP3Y1pAP4IfarFZD4M4lSYTiGNTZ-/view) 


---

sul **branch versione-finale** c'è la versione con modifica, inserimento, cancellazione, creazione funzionanti

> $ git clone -b versione-finale https://github.com/corsidrive/user-management-system.git usm_versione_finale


# configurare usando LE VOSTRE IMPOSTAZIONI  

esiste un file dove dovete configurare il database 
file: [./src/config/local/AppConfig.php](./src/config/local/AppConfig.php)

```php
class AppConfig {
    const DB_PASSWORD = '';
    const DB_USER = 'root';
    const DB_NAME = 'corso_formarete';
    const DB_HOST = 'localhost';
}
```

dopo eseguendo il file nella root, via browser o via cli

> [install-demo.php](https://github.com/corsidrive/user-management-system/blob/versione-finale/install-demo.php) 

verrà creato il database di prova e una serie di utenti



## enjoy ❤


