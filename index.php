<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css"/>
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
            <div class="menu-wrapper">
                <ul class="menu">
                    <li class="uudised">
                        <a href="/pages/uudised/">Uudised</a>
                    </li>

                    <li class="oppimiseks">
                        <a href="/pages/oppimiseks/">Õppimiseks</a>
                    </li>

                    <li class="grupid">
                        <a href="/pages/grupid/">Grupid</a>
                    </li>

                    <li class="yritused">
                        <a href="/pages/yritused/">Üritused</a>
                    </li>

                    <li class="blogi">
                        <a href="/pages/yritused/">Blogi</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="content">
        <div class="news">
            <!--koht, kus javascript loob uued uudised-->
            <p>Sisu</p>
        </div>


    </div>

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
        echo "<h3>Database success.</h3>";
    }
    catch(Exception $e){
        die(var_dump($e));
    }

    $sql_select = "SELECT t.message FROM enetadb.test_tbl t where t.name = 'Lembit'";
    $stmt = $conn->query($sql_select);
    $messages = $stmt->fetchAll();
    if(count($messages) > 0) {
        foreach($messages as $message) {
            echo "<h2>".$message["message"]."</h2>";
        }
    } else {
        echo "<h3>mingi jama</h3>";
    }

    ?>


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
