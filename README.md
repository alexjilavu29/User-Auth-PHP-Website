# Music Production Company -- PHP Website

## About the Project

This project explores the concept of a music production company, offering users an immersive experience through various visual and interactive elements related to music. Features include a top 3 list of the company's "veteran" artists, dedicated artist pages with detailed descriptions, and a distinctive logo.

## User Features

- **Create Account:** Users can create an account, with their details added to the website's database, and will receive a confirmation email.
- **Account Access:** After registration, users can access their personal account, where they can see account information and have the option to log out.
- **Newsletter Subscription:** Registered users can opt to subscribe to the Newsletter to receive updated information about music and contemporary artists.

## Database Structure

### `users` Table
- `idUser`: Primary key, autoincrement, not null
- `username`: Not null
- `password`: Not null
- `email`
- `newsletter`: BINARY
- `logged_in`: BINARY
- `role`: DEFAULT client

### `artisti` Table
- `idArtist`: Primary key, autoincrement, not null
- `name`: Not null
- `music_genre`: Not null
- `description`
- `followers`


### Romanian Translation Below
---


# Firmă de Producție Muzicală -- PHP Website

## Despre Proiect

Acest proiect explorează conceptul unei firme de producție muzicală, oferind utilizatorilor o experiență imersivă prin diverse elemente vizuale și interactive legate de muzică. Caracteristicile includ un top 3 al artiștilor "vechi" ai firmei, pagini dedicate artiștilor cu descrieri detaliate și un logo distinctiv.

## Funcționalități Utilizator

- **Creare Cont:** Utilizatorii pot crea un cont, cu datele lor adăugate în baza de date a site-ului și vor primi un mail de confirmare.
- **Acces Cont:** După înregistrare, utilizatorii își pot accesa contul personal, unde pot vedea informații ale contului și au opțiunea de delogare.
- **Abonare la Newsletter:** Utilizatorii înregistrați pot opta pentru abonarea la Newsletter pentru a primi informații actualizate despre muzică și artiști contemporani.

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
