<?php
if(isset($_SESSION['user_id'])):

if(!isset($_GET['sid']) && !isset($_GET['id'])): ?>
<div class="content">
    <div class="u_titel">Link nicht verfügbar!</div>
</div>

<?php else: ?>

<div class="content">
    <form action="/galerie/doUpdate?id=<?= $g_id ?>" method="post">
        <div class="titel"><?= $heading ?></div>


        <label for="galeriename" class="label">Name</label>
        <input id="galeriename" name="galeriename" type="text" value="<?= $galerie->galeriename ?>" class="textForm" required/>

        <label for="beschreibung" class="label">Beschreibung</label>
        <input id="beschreibung" name="beschreibung" type="text" value="<?= $galerie->beschreibung ?>" class="textForm" required/>


        <label for="global" class="label">Öffentlich</label>
        <input type="checkbox" class='form' name="global" />
        <br><br>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">


    </form>
</div>

<?php endif; else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
