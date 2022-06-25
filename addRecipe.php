<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addRecipe.css">
</head>

<body>
    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="addRecipe.php">Hinzufügen</a>
    </div>

    <div class="main">
        <h2>Rezept hinzugefügt!</h2>
        <?php session_start() ?>
        <form method="post" action="./addRecipe.php">
            <table>
                <tr>
                    <td><label for="repName">Name</label></td>
                    <td><input type="text" name="repName" id="repName"></td>
                </tr>
                <tr>
                    <td><label for="ings">Rezepte</label></td>
                    <td><input type="text" name="ings" id="ings" title="bitte durch ; trennen"></td>
                </tr>
                <tr>
                    <td><label for="prep">Zubereitung</label></td>
                    <td><input type="text" name="prep" id="prep"></td>
                </tr>
            </table>
            <button type="submit">Submit</button>
        </form>
        <?php
        include 'makeConn.php';
        if ($_REQUEST["repName"] && $_REQUEST["prep"] && $_REQUEST["ings"]) {
            if (!$_REQUEST["repName"] == '' && !$_REQUEST["prep"] = '' && !$_REQUEST["ings"] == '') {
                if (str_contains($_REQUEST["prep"], ";")) {
                    $name = $_REQUEST["repName"];
                    $prep = $_REQUEST["prep"];
                    $ings = $_REQUEST["ings"];
                    $sql = "INSERT INTO recipes (name, ing, prep)VALUES ('" . $name . "', '" . $ings . "', '" . $prep . "');";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } else {
                    echo "<h3>Bitte Zutaten durch ';' trennen.</h3>";
                }
            }
        } else {
            echo "<h3>Bitte alle Felder ausfüllen.</h3>";
        }
        ?>
    </div>
</body>

</html>