<?php 
include("includes/header.php"); ?>
    <main>
      <h2>AI som hjälpmedel</h2>
      <div class="bordercontainer">
        <h3>
          Hur har AI använts för att underlätta utvecklingsprocessen?
        </h3>
        <p>
            Under tiden som uppgiften utfördes så felsökte jag koden då och då med hjälp av ChatGPT. Det visade sig till exempel att jag hade
            skrivit koden i fel ordning gällande att faktiskt skicka in data till tabellen i databasen. Jag hade bytt plats på var inmatade värden skulle placeras
            i tabellen med vilka värden som skulle matas in, så man kan säga att kodsnutten blev åt fel håll. En annan sak som jag använde AI för var att förhindra XSS-exploits.
            I JavaScript kan man ju skapa textnodes, men jag var inte säker på hur jag skulle fixa detta med PHP då jag t.ex. kunde mata in b-taggar runt inmatade värden och detta sedan skrevs
            ut i fetstil. Claude föreslog att man kunde skriva en stödfunktion med inbyggda funktioner i PHP. Denna funktion kunde sedan omringa värden som skulle skrivas ut i HMTL för att
            förhindra manipulering av kod:
</p>
<p><b>
             public function e($value) : string {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
  }</b>
          </p>
          <p>
AI kunde snabbt ge mig rätt svar i de fall jag hade problem med att översätta syntax, men ibland kan det bli missar. Vid ett tillfälle förstod jag inte varför koden inte 
kom till en else-sats för felaktig input i formulär. ChatGPT missade det som jag såg senare trots att jag hade matat in php-koden för undersidan, vilket var att jag hade glömt att skriva
"echo". En dum liten miss, men i mitt fall såg inte AI det heller!
          </p>
</div>
    </main>
<?php include("includes/footer.php"); ?>