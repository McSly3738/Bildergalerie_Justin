<div class="content">
    <form action="/user/doCreate" method="post">

        <span class="titel"><?= $heading ?></span>
        <br><br>
        <?php
        if(isset($_GET['message'])) {
            echo "<div class='fehler'>$fehlermeldung</div>";
        }
        ?>

        <label for="username" class="label">Username</label>
        <input id="username" name="username" type="text" class="textForm" required/>

        <label for="email" class="label">Mail</label>
        <input id="email" name="email" type="email" class="textForm" required/>

        <label for="password" class="label">Passwort</label>
        <input id="password" name="password" type="password" class="textForm" required/>

        <label for="passwordcheck" class="label">Passwort wiederholen</label>
        <input id="passwordcheck" name="passwordcheck" type="password" class="textForm" required/>

        <input id="send" name="send" value="Registrieren" type="submit" class="submitForm">

        <br><br>
        <a href="/user/login"><div class="u_titel link">Du hast schon ein Account? Hier einloggen!</div></a>
    </form>
</div>

