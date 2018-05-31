<?php if(!isset($_SESSION['user_id'])): ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php else: ?>

<div class="content">
    <form action="/user/doUpdate" method="post">

        <div class="titel"><?= $heading ?></div>

        <?php
        if(isset($_GET['message'])) {
            echo "<div class='fehler'>$fehlermeldung</div>";
        }
        ?>

        <label for="mompassword" class="label">Aktuelles Passwort</label>
        <input id="mompassword" name="mompassword" type="password"  class="textForm" required/>

        <label for="password" class="label">Neues Passwort</label>
        <input id="password" name="password" type="password"  class="textForm" required/>

        <label for="passwordcheck" class="label">Passwort wiederholen</label>
        <input id="passwordcheck" name="passwordcheck" type="password"  class="textForm" required/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">

    </form>
</div>

<?php endif ?>