# Proiect App WEB - Firmă de Producție Muzicală

## Despre Proiect

Acest proiect explorează conceptul unei firme de producție muzicală, oferind utilizatorilor o experiență imersivă prin diverse elemente vizuale și interactive legate de muzică. Caracteristicile includ un top 3 al artiștilor "vechi" ai firmei, pagini dedicate artiștilor cu descrieri detaliate și un logo distinctiv.

## Funcționalități Utilizator

- **Creare Cont:** Utilizatorii pot crea un cont, cu datele lor adăugate în baza de date a site-ului și vor primi un mail de confirmare.
- **Acces Cont:** După înregistrare, utilizatorii își pot accesa contul personal, unde pot vedea informații ale contului și au opțiunea de delogare.
- **Abonare la Newsletter:** Utilizatorii înregistrați pot opta pentru abonarea la Newsletter pentru a primi informații actualizate despre muzică.

## Structura Bazei de Date

### Tabela `users`
- `idUser`: Cheie primară, autoincrement, not null
- `username`: Not null
- `password`: Not null
- `email`
- `newsletter`: BINARY
- `logged_in`: BINARY
- `rol`: DEFAULT client

### Tabela `artisti`
- `idArtist`: Cheie primară, autoincrement, not null
- `nume`: Not null
- `gen_muzical`: Not null
- `descriere`
- `urmaritori`
