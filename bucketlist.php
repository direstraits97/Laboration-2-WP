<?php 
include("includes/header.php");
?>
    <main>
      <h2>Min Bucketlist</h2>
      <section class="bordercontainer">
        <h3>
          Bucketlist
        </h3>
       <?php 
      $bucketlistItem = new BucketlistItem();

      if(isset($_GET['deleteid'])) {
        $deleteId = intval($_GET['deleteid']); //Hämta id från adressraden och konvertera till typen int.
        if($bucketlistItem->deleteItem($deleteId)) {
          echo "<p class='confirmation'>Innehåll raderat!</p>"; //Lyckad radering.
        } else {
          echo "<p>Fel vid radering av innehåll...</p>"; //Något gick fel.
        }
      }

      $bucketlistItems = $bucketlistItem->getItems();

      foreach($bucketlistItems as $item) { //Loopar igenom och skriver ut en associativ array med namngivna index i önskat format.
        ?>
        <article>
          <h4 class="name"><?= $bucketlistItem->preventXss($item['name']); ?></h4>
          <h4>Beskrivning:</h4>
          <p><?= $bucketlistItem->preventXss($item['description']); ?></p>
          <h4>Prioritetsnivå:</h4>
          <p><?= $item['priority']; ?></p>
          <h4>Skapad:</h4>
          <p><?= substr($item['created_at'], 0, 16); ?></p>
         <a class="deletebutton" href="bucketlist.php?deleteid=<?= $item['id']; ?>"><div class="buttoncontent">Radera</div></a> <!--Skicka med id, får den i adressraden.-->
        </article>
        <?php
      }
       ?>
      </section>
    </main>
<?php include("includes/footer.php"); ?>