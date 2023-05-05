<?php include("assets/header.php"); ?>

<main>
    <section>

        <form action="" method="post">
            <h2 id="text-form">Paste URL to shorten:</h2>
            <input type="text" id="auction-link" name="auction-link" placeholder="Loooooong URL..." required>
            <input type="submit" id="auction-link-submit" value="SHORTEN" class="button">
        </form>

        <?php
        include("assets/sqlite.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $OrginalLink = stripslashes($_REQUEST['auction-link']);

            $sqlInsertIntoTable = "INSERT INTO links (OrginalLink, NewLink)
            VALUES ('$OrginalLink', '" . crc32($OrginalLink) . "')";

            if ($db->query($sqlInsertIntoTable) == TRUE) {
                header("location:generated.php?OrginalLink=$OrginalLink");
            } else {
                echo "<div class='form'>Nieprawidłowe dane w formularzu</div>";
            }
        }

        if (isset($_GET["resolve"])) {

            $link = htmlspecialchars($_GET["resolve"]);

            $res = $db->query("SELECT * FROM links WHERE NewLink='" . $link . "'");
            foreach ($res as $row) { {
                    header("location: " . $row['OrginalLink']);
                }
                $dbh = null;
            }
        }
        ?>

    </section>
</main>

<?php include("assets/footer.php"); ?>

</body>

</html>
<? ob_flush(); ?>