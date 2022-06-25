<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="addRecipe.php?repName=&prep=&ings=">Hinzufügen</a>
    </div>

    <div class="main">
        <h1>Rezept suchen</h1>
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
            </table>
            <button type="submit">Suche</button>
        </form>
        <hr>
        <?php
        include 'makeConn.php';
        $sql = "SELECT * FROM recipes;";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $tempId = $row['id'];
            $tempName = $row['name'];
            echo "<h4><a class='recipeList' href='./aufruf.php?id=$tempId'>$tempName</a></h4><br>";
        }
        ?>
    </div>
</body>

</html>