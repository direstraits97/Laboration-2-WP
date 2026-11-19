<?php 
include("includes/header.php"); ?>
    <main>
      <h2>Min Bucketlist</h2>
      <div class="bordercontainer">
       <p>Här ska poster hamna</p>
      </div>
      <div class="bordercontainer">
      <h3>Lägg till innehåll i Bucketlist</h3>
      <form action="">
        <div class="formlayout">
        <label for="name">Namn:</label>
        <textarea name="name" id="name"></textarea>
        </div>
        <br>
        <div class="formlayout">
        <label for="description">Beskrivning:</label>
        <textarea name="description" id="description"></textarea>
        </div class="formlayout">
        <p>
          Prioritet:
        </p>
        <div class="formlayout">
        <div class="inputlayout">
        <label for="levelone">Prioritetsnivå 1</label>
        <input type="radio" id="levelone" name="priority" value="1" class="radioinput">
        </div>
        <br>
        <div class="inputlayout">
        <label for="leveltwo">Prioritetsnivå 2</label>
        <input type="radio" id="leveltwo" name="priority" value="2" class="radioinput">
        </div>
        <br>
        <div class="inputlayout">
        <label for="levelthree">Prioritetsnivå 3</label>
        <input type="radio" id="levelthree" name="priority" value="3" class="radioinput">
        </div>
        </div>
      </form>
</div>
    </main>
<?php include("includes/footer.php"); ?>