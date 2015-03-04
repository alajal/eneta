<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <!--link rel="stylesheet" href="css/bootstrap.css"/-->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <header>

        <nav class="top">
            <p>Teretulemast!</p>
            <p class="logo">
            </p>

            <div class="right">
                <ul>
                    <li>Liige?</li>
                    <li class="login">
                        <a href="/pages/login/">Register / Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <nav class="nav">
            <!--div class="menu-wrapper"-->
                <ul class="menu">
                    <li class="uudised">
                        <a href="./index.php">Uudised</a>
                    </li>

                    <li class="oppimiseks">
                        <a href="./oppimiseks.php">Õppimiseks</a>
                    </li>

                    <li class="grupid">
                        <a href="./grupid.php">Grupid</a>
                    </li>

                    <li class="yritused">
                        <a href="./yritused.php">Üritused</a>
                    </li>

                    <li class="blogi">
                        <a href="./blogi.php">Blogi</a>
                    </li>
                </ul>
            <!--/div-->
        </nav>

    </header>


    <div id="content">
        <div id="content-container">
            <div id="left-sidebar">
                <ul>
                    <li><a href="#">Kuva uudised</a> </li>
                    <li><a href="#">Sisesta uudised</a> </li>
                </ul>
            </div>

            <div id="first-content-col">
                <!--koht, kus javascript loob uued uudised-->
                <p>Sisu</p>

                <?php
                // DB connection info
                //TODO: Update the values for $host, $user, $pwd, and $db
                //using the values you retrieved earlier from the portal.
                $host = "eu-cdbr-azure-north-b.cloudapp.net";
                $user = "b3870d42c5e18e";
                $pwd = "6fde5b20";
                $db = "enetaDB";
                // Connect to database.
                try {
                    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
                    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    echo "<p>Database success.</p>";
                }
                catch(Exception $e){
                    die(var_dump($e));
                }

                $sql_select = "SELECT t.message FROM enetadb.test_tbl t where t.name = 'Lembit'";
                $stmt = $conn->query($sql_select);
                $messages = $stmt->fetchAll();
                if(count($messages) > 0) {
                    foreach($messages as $message) {
                        echo "<p>".$message["message"]."</p>";
                    }
                } else {
                    echo "<p>mingi jama</p>";
                }

                ?>

            </div>

        </div>
    </div>

    <footer>
        <div class="footer">
            <p id="kontakt">Kontakt</p>
            <p id="enetast">Enetast lähemalt</p>
        </div>
    </footer>
</body>
</html>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->
