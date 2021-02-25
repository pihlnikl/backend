<?php include "init.php" ?>
<?php include "head.php" ?>

<h1>Alla lösenord är: hemlis</h1>
<br>
Del 1. Största delen av databasen gjorde jag enligt exemplet. Bekantade mig med SQL kodandet i phpmyadmin, men fick inte allting att fungera
i php koden tyvärr. Skapade även en comments databas, men den blev lite onödig eftersom jag inte fick den att fungera.
<?php
    print("<a href='./Capture.PNG'>Diagram</a>")
?>
<br>
<br>
Del 2: Fungerar som det skall. Har en inloggning och en registrering som hashar lösenordet, samt en check som kollar om lösenordet är rätt.
<br>
<br>
Del 3: Fick halvgjort. Lyckades begränsa resultatet till anonyma användare med hjälp av if($_SESSION == null) i filtret. 
Lyckades inte dock begränsa antalet annonser per sodium_add
<br>
<br>
Del 4: Fungerar enligt instruktionerna. Använde mig av register.php exemplet som vi gjorde på lektionerna.
<br>
<br>
Del 5: Jag antar att uppgiften krävde att man raderar profilen, eftersom det är profilerna som synns i annonser?
Isf fungerar denna del också. 
Hade lagat en lite annorlund fetch.php än den i exemplet. Min delete.php kollar via fetch ifall lösenordet är rätt före den sedan fortsätter
tillbaka till delete för att radera profilen enligt user.
<br>
<br>
Del 6: Samma som i del 5, alltså kolla informationen med fetch varefter en UPDATE editerar SQL databasen.
Ända problemet är att jag inte fick UPDATE att fungera. Försökte använda ett liknande system som register.php i exemplet med prepare.
<br>
<br>
Del 7: Blev halvfärdigt. Lyckades endast sortera enligt salary, såsom i exemplet
<br>
<br>
Del 8: Ogjort
<br>
<br>
Del 9: Skapade endast databasen. Försökte länge få profile.php att visa en färdig kommentar från databasen, men lyckades inte.
<br>
<br>
Projekt 2 gick inte lika bra som projekt 1. Jag har inte följt med kursen i normal tempo eftersom detta redan är tredje gången jag börjat denna kurs.
Projekt 2 gick delvis så dålig p.g.a. tidsbrist eftersom deadlinen kom upp så sent på itslearnings framsida. 
Detta är dock mitt eget fel eftersom denna information fanns tillgänglig i kursens egna sida.