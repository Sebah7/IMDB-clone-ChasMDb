<h1>
Dokumentation för grupp 6 - Denize, Denjin, Elias, Jacob, Sebah.
</h1>

<u>Fredag 02/02/24</u><br>
Närvaro: Alla<br>
Ta upp på dagens agenda:<br>

- Skriva på kontraktet
- Bestämma oss för vilken agil metod vi kommer att använda oss av. Hur sätter vi upp sprintarna?
- Hur ska vi strukturera arbetet, ses på plats/distans?
- Gå igenom GitFlow - instruktioner för hur vi jobbar med issue board/kanban
- Vilken kodstandard vi ska ha
- Hur kommer vi igång med projektet?

Om vi ska använda oss av ramverk? Tailwind? Bootstrap?

Elias ska kolla dokumentation för Tailwind under helgen.
Vi bestämmer oss för att träffas på måndag kl 09 i skolan för att ha en genomgång av github flow, samt att kunna starta igång projektet med att få in en devcontainer i vår u05mapp. <br><br>


<u>Måndag 05/02/23</u><br>
Närvaro: Alla <br><br>

Dagens agenda:<br>
- Vi har skapat en dev-container med vår egna databas, där vi lagt in Laravel, och skapat grunden för att kunna fortsätta projektet.
- Vi går igenom blades och templates, hur det fungerar och hur vi går tillväga.
- Vi diskuterar hur vårt ER-diagram ska byggas upp och se ut.
- Vi behöver även planera en site.map.
- Vi behöver se över hur vi lägger upp en kanban tavla, där vi diskuterar de olika issues vi kommer ha under projektets gång.<br><br>

Vad vi har gjort:<br>
Klonat ner repo - jobbar med .gitignore issue
Skapat sitemap
Skapat ERD:<br>
Vi har gjort en tankekarta över ett ER-diagram.
Vi diskuterar main page.
Vi planerar ER-diagram med hjälp av draw.io filer i VScode.
Vi diskuterar log in och sign up page, samt Watchlist.
Vi har skapat ett ER diagram!

<u>Tisdag 6/2 2025</u>
Närvaro: Elias, Jacob, Sebah, Denize
Frånvaro: Denjin

<br><br>
Dagens agenda:<br> 
Idag har vi ett möte med Olli-Heikki angående den skapade databasen som vi har skapat lokalt på Denize dator. Vi vill att alla ska få tillgång till databasen från sin egen dator (lokalt). Vi ska fråga om det är möjligt att synka flera admins till en och samma databas eller om vi måste skapa en ny databas från början. 
<br><br>
<i>Q: How can we know for sure that our dbs are synced? Can we see it without pushing? 
Q: Ask Olli about our ERD</i><br><br>

<u>Idag behöver vi komma fram till:</u>
- En arbetsstruktur som underlag för hur vi ska arbeta framöver.
- Hur ska vi hålla ihop dokumentationen? - Alla måste dokumentera sin del av uppgifterna. 
- Struktur över våra landningssidor, samt design och hur vi ska koda i dessa.
- Dela ut uppgifter
- På fredag ska vi sammanfatta veckans jobb och vad vi ska göra veckan efter
- Idag ska vi även sammanställa ett svar till Olli Heikki om var vi ligger i vårt grupp-projekt. 
- Denna vecka vill vi även bli klara med lo-fi och hi-fi prototyper, och se hur mycket av Tailwind som vi behöver inkludera. 
- Vi skapar Routes som även hjälper oss med vår site:map och därefter controllerns/funktioner. 
- Hur vill vi att appen ska se ut? Färger? 
- Elias ska fixa en eller två routes och visa oss på torsdag förmiddag hur det går till.
<br><br>

Sammanfattning av dagen:<br>
- Sebah skriver på tavlan vad vi ska nå/förväntas hinna med vid varje sprint. 
- Vi diskuterar hur vi vill att projektets uppgifter ska göras, vad som ska ske vilken vecka. 
- Vi utgår ifrån denna kodstruktur som mall fig-standards/accepted/PSR-1-basic-coding-standard.md at master · php-fig/fig-standards (github.com)

<b>Förväntingar/mål:</b><br>

Sprint 1: 
Skapa repo
Skapa Db, dev, app-folder, user
Kanban-board i github

Sprint 2:
Figma/lofi/hifi (detta ska vara någorlunda klart tills att våra views börjar ta form)
Init sql-mapp/eller seeders?
Fördela blades
Controller
RBAC
CRUD
Deployment

Sprint 3:
Continuation of sprint 2. 
API
Deployment
Sanctum

Sprint 4:
Deployment
Touch up
Design
Testing

<u>Torsdag 8/2 2024</u>
Närvarande: Jacob, Sebah, Elias, Denize, Denjin<br><br>

Dagens agenda: <br>
Strukturera ER diagrammet enligt Olli-Heikki
Bestämma antalet landningssidor samt (Sitemaps) för att kunna fixa Figma-prototyper
Skriva aktuell status fram till nu, för att skicka till Ollie.<br><br>

<i>
Status Update<br>
- Signed the contract (everybody)
- Created a drive folder with different documentations files. (shared with everybody)
- Created GitHub team and repo (everybody joined)
- Created a Laravel app / devcontiner / installed tailwind/ pushed to main (everybody pulled and installed composer/npm / created same database(Adminer) and updated .env)
- Created our Kanban in GitHub
- Discussed desired work structure and sprints. 
- Created a few issues and assigned them
- Issues
- Create ERD (In progress)
- Create sitemap (In progress)
- Create sql init (In progress)</i>

Idag har vi kollat på lite material för MVC struktur. <br><br> och Denjin sitter med ERD. Jacob och Elias kollar på Sitemaps. Denize kollar upp init-sql innehåll till projektet.. 

Dagen avslutas med att sammanfatta veckans jobb inför mötet med Olli Heikki.
Jacob har även gjort klart sitemap på Figma, som vi ska visa upp för att få godkänt, innan vi kan arbeta vidare.
ERD är klart. Inväntar godkännande från OH.
<br><br>

<u>Fredag 9/2 2024</u>
Närvarande: Denjin, Sebah, Denize, Jacob<br>
Frånvaro: Elias<br>

Dagens agenda:<br>

Vi har haft ett möte med Olli-Heikki där vi gick igenom vår sitemap och ERD, för ett godkännande. Vi har lite småfix i sitemap och ERD, vilket förväntas justeras relativt fort. Utöver det fick vi ett godkännande i det stora hela. Vi gick även igenom hur vi kommer gå vidare med antingen Seeders eller SQL, när vi kopplar in databaser till våra egna datorer, och vilken väg som är mest effektiv att gå efter. 

När allt det här är klart, så kan vi börja dela ut uppgifter och dela in oss för att ta oss an större issues. Och även lägga upp issues i vår Kanban Board. 

Plan till måndag och tisdag, läsa laravel/dokumentation och gå igenom föreläsningen om MVC, router & migrationer igen för att få en bättre förståelse av projektets strukturer och planer vidare. 
<br><br>

<u>Måndag 12/2 2024</u>
Närvarande: Alla
<br><br>
Dagens agenda:<br>
- Var befinner vi oss just nu? Vad är vårt nästa steg?
- Hur ska vi fördela arbetsuppgifter?
- Göra klart ER-diagrammet (pivot tables). (KLART)
- Denize ska föra över dokumentationen till en DOCU.md fil.
- Skapa models (7 st - users, review, watchlist, movies, genre, director, actors).
