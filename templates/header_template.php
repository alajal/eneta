<header>

    <nav class="top">
        <p class="logo"></p>

        <div class="inoutbutton">
            <?php if($loggedin) { ?>
                <button id="signoutButton">Sign out</button>
            <?php } else { ?>
            <button id="signinButton">Sign in with Google</button>
            <?php } ?>

            <!--kui kasutaja on sisse logitud, kuvatakse tema nimi
            //TODO-->

       </div>
   </nav>

   <nav class="bottom">
       <!--div class="menu-wrapper"-->
        <ul class="menu">
            <li class="uudised">
                <a href="/index.php">Uudised</a>
            </li>

            <li class="oppimiseks">
                <a href="/oppimiseks.php">Õppimiseks</a>
            </li>

            <li class="grupid">
                <a href="/grupid.php">Grupid</a>
            </li>

            <li class="yritused">
                <a href="/yritused.php">Üritused</a>
            </li>

            <li class="blogi">
                <a href="/blogi.php">Blogi</a>
            </li>
        </ul>
        <!--/div-->
    </nav>

</header>
