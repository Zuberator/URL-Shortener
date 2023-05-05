<?php include("assets/header.php"); ?>

<main>
    <section>

        <?php
        include("assets/sqlite.php");

        $link = htmlspecialchars($_GET["OrginalLink"]);

        $res = $db->query("SELECT * FROM links WHERE OrginalLink='" . $link . "'");
        foreach ($res as $row) { {
                $fullLink = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . '/?resolve=' . $row['NewLink'];
                echo "<h2><a href=$fullLink>" . $fullLink . "</a></h2>";
            }
            $dbh = null;
        }
        ?>

    </section>
</main>

</body>

</html>
<? ob_flush(); ?>