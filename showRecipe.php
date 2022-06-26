<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="addRecipe.php?repName=&prep=&ings=">Hinzufügen</a>
    </div>

    <div class="main">
        <?php
        session_start();
        include 'makeConn.php';
        if ($_REQUEST["id"]) {
            $sql = "SELECT * FROM recipes;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row["id"] == $_REQUEST["id"]) {
        ?>
                    <div>
                        <h2><?= $row['name'] ?></h2>
                        <table>
                            <tr>
                                <th>Zutat</th>
                                <th>Menge</th>
                                <th></th>
                            </tr>
                            <?php
                            $ingredient = preg_split('/;/', $row['ing']);
                            foreach ($ingredient as $value) {
                                $ing = trim($value);
                                $ing = preg_split('/ /', $ing);
                                echo "<tr>";
                                foreach ($ing as $element) {
                                    echo "<td>$element</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                            </p>
                            <p>
                            <h3><?= $row['prep'] ?></h3>
                            </p>
                    </div>
                    <hr>
        <?php
                }
            }
        } ?>
    </div>
</body>

</html>