# BACKEND_REST
## Installazione
Per poter usare tutto sarà necessario [Docker](https://docs.docker.com/get-docker/).

* Avviare il container di MySQL.
```bash
docker run --name my_sql_server --rm -v <percorso cartella mysql_data>:/var/lib/mysql -v <percorso cartella dump>:/dump -e MYSQL_ROOT_PASSWORD=<password> -p 3306:3306 -d mysql:latest
```

* Entrare nella bash del container MySQL.
```bash
docker exec -it my_sql_server bash
```

* Importare il file dump.
```bash
mysql -u root -p < /dump/create_employee.sql
exit
```

* Avviare il container del webserver.
```bash
docker run -d -p 8080:80 --name my-apache-php-app --rm  -v <percorso_per_la_cartella>:/var/www/html zener79/php:7.4-apache
```

* Comandi da utilizzare
#### Mostra una lista di impiegati.

```http
  GET /employees?page=${page}&size=${size}
```

| Parametro | Tipo     | Descrizione                |
| :-------- | :------- | :------------------------- |
| `page` | `int` |numero della pagina da mostrare |
| `size` | `int` |numero dell'impiegato da mostrare |


#### Mostra le informazioni di un singolo impiegato.

```http
  GET /employees?id=${id}
```

| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da mostrare |

#### Rimuovere un impiegato dalla lista.

```http
  DELETE /employees?id=${id}
```

| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da rimuovere |

#### Aggiungi un impiegato alla lista
```http
  POST /
```
E' richiesto un payload con i dati del dipendente da aggiungere.

#### Modifica le informazioni di un impiegato 
```http
  PUT /employees/${id}
```
| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da modificare |

E' richiesto un payload con i dati del dipendente da modificare.
