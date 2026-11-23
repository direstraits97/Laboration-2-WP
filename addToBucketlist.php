<?php 
include("includes/header.php");
?>
<main>
  <h2>
    Lägg till nytt innehåll i Bucketlist
  </h2>
  <div class="bordercontainer">
      <h3>Lägg till innehåll i Bucketlist</h3>

      <?php 

      $name = "";
      $description = "";
      $priority = "";

      if(isset($_POST['name'])) {

        $name = $_POST['name'] ?? "";
        $description = $_POST['description'] ?? "";
        $priority = $_POST['priority'] ?? "";

        $newItem = new BucketlistItem();

        $errors = [];

        if(!$newItem->setName($name)) {
          array_push($errors, "Du måste ange ett namn!");
        }
        if(!$newItem->setDescription($description)) {
          array_push($errors, "Du måste ange en beskrivning!");
        }
        if(!$newItem->setPriority($priority)) {
          array_push($errors, "Du måste ange en prioritetsnivå!");
        }

        if($newItem->addItem($name, $description, $priority)) {
         echo "<p class='confirmation'>$name är tillagd i din Bucketlist!</p>";
         $name = "";
         $description = "";
         $priority = "";
        } else echo "<p class='errormessage'>Det gick inte att lägga till innehållet.</p>";
      }
      ?>

      <form method="post">
        <?php 
        if(isset($errors)) {
          ?>
          <ul class="error">
              <?php
              foreach($errors as $error) {
                echo "<li>" . $error . "</li>";
              }
              ?>
          </ul>
          <?php
        }
        ?>
        <div class="formlayout">
        <label for="name">Namn:</label>
        <textarea name="name" id="name"><?=$name; ?></textarea>
        </div>
        <br>
        <div class="formdescriptionlayout">
        <label for="description">Beskrivning:</label>
        <textarea name="description" id="description" class="description"><?=$description; ?></textarea>
        </div>
        <p>
          Prioritet:
        </p>
        <div class="formlayout">
        <div class="inputlayout">
        <label for="levelone">Nivå 1</label>
        <input type="radio" id="levelone" name="priority" value="1" class="radioinput">
        </div>
        <br>
        <div class="inputlayout">
        <label for="leveltwo">Nivå 2</label>
        <input type="radio" id="leveltwo" name="priority" value="2" class="radioinput">
        </div>
        <br>
        <div class="inputlayout">
        <label for="levelthree">Nivå 3</label>
        <input type="radio" id="levelthree" name="priority" value="3" class="radioinput">
        </div>
        </div>
        <input type="submit" value="Lägg till" class="button">
      </form>
</div>
</main>
<?php include("includes/footer.php"); ?>