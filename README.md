# Proiect_App_WEB

# Acest proiect se axează pe ideea de firmă de producție muzicală. În acest sens, se pot vedea diferite elemente care aduc utilizatorul cu gândul la muzică, precum un top 3 cu cei mai „vechi” artiști ai firmei, o pagină cu toți artiștii și descrierile lor, precum și un logo pe măsură. 
# Un utilizator care intră pe acest site își poate creea un cont, moment în care datele acestuia vor fi adăugate în baza de date a site-ului. Acesta va primi un mail de confirmare și, pe urmă, își va putea accesa contul personal. Odată ce acesta își introduce datele în secțiunea „Aveți deja cont?”, secțiunea de Înregistrare din meniul dinamic va fi înlocuită cu o secțiune pe nume Profil, care va conține toate datele aferente contului, precum și opțiunea de a se deloga. Acest lucru va exercita o terminare a sesiunii curente, astfel putând introduce un alt cont sau a se loga pe același.
# Odată ce un user are cont la site-ul nostru, poate alege să se aboneze la Newsletter folosind email-ul deja introdus pentru a-și creea contul. Acesta va primi un mail personalizat cu informații despre muzică. 
## Mai jos se află structura bazei de date aferente site-ului, cu cheile primare și condițiile necesare.
Tabela users este formata din:  idUser (cheie primara, autoincrement,not null), username (not null), password (not null), email, newsletter BINARY, logged_in BINARY, rol DEFAULT client
Tabela artisti este formata din: idArtist (cheie primara, autoincrement, not null), nume (not null), gen_muzical (not null), descriere, urmaritori
