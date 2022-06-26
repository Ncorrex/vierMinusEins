<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="aufruf.css">
</head>

<body>

    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="addRecipe.php">Hinzufügen</a>
    </div>

    <div class="main">
        <?php session_start() ?>
        <form method="post" action="./aufruf.php">
            <table>
                <tr>
                    <td><label for="id">ID:</label></td>
                    <td><input type="number" id="id" name="id"> </td>
                </tr>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name"></td>
                </tr>
                <tr>
                    <td><label for="ing">Zutat:</label></td>
                    <td><input type="text" id="ing" name="ing"></td>
                </tr>
            </table>
            <button type="submit">Suche</button>
        </form>
        <?php
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
                                $ing = preg_split('/ /', $value);
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
        } elseif ($_REQUEST["name"]) {
            $sql = "SELECT * FROM recipes;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row["name"] == $_REQUEST["name"]) {
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
                                $ing = preg_split('/ /', $value);
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
        } elseif ($_REQUEST["ing"]) {
            $sql = "SELECT * FROM recipes;";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                if(str_contains($row["ing"], $_REQUEST["ing"])){
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
                                $ing = preg_split('/ /', $value);
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
        } 
        
        else {
            ?>
            <div>
                <h2>Bitte ein Rezept wählen</h2>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>