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
        $deleteId = intval($_GET['deleteid']);
        if($bucketlistItem->deleteItem($deleteId)) {
          echo "<p>Innehåll raderat!</p>";
        } else {
          echo "<p>Fel vid radering av innehåll...</p>";
        }
      }

      $bucketlistItems = $bucketlistItem->getItems();

      foreach($bucketlistItems as $item) {
        ?>
        <article>
          <h4><?= $bucketlistItem->preventXss($item['name']); ?></h4>
          <h4>Beskrivning:</h4>
          <p><?= $bucketlistItem->preventXss($item['description']); ?></p>
          <h4>Prioritetsnivå:</h4>
          <p><?= $item['priority']; ?></p>
          <h4>Skapad:</h4>
          <p><?= $item['created_at']; ?></p>
         <button><a href="bucketlist.php?deleteid=<?= $item['id']; ?>">Radera</a></button>
        </article>
        <?php
      }
       ?>
      </section>
    </main>
<?php include("includes/footer.php"); ?>