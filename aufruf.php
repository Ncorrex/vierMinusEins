<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="aufruf.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="addRecipe.php?repName=&prep=&ings=">Hinzufügen</a>
    </div>

    <div class="main">
        <?php session_start() ?>
        <form method="post" action="./aufruf.php">
            <table>
                <tr>
                    <td><label for="search">Suche:</label></td>
                    <td><input type="text" id="search" name="search"> </td>
                </tr>
            </table>
            <button type="submit"><span class="material-symbols-outlined">search</span></button>
        </form>

        <?php
        include 'makeConn.php';
        if ($_REQUEST["search"]) {
            $sql = "SELECT * FROM recipes;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row["id"] == $_REQUEST["search"] || str_contains($row["name"], $_REQUEST["search"]) || str_contains($row["ing"], $_REQUEST["search"])) {
                    $tempId = $row['id'];
                    $tempName = $row['name'];
                    echo "<h4><a class='recipeList' href='./showRecipe.php?id=$tempId'>$tempName</a></h4>";
                }
            }
        }

        ?>
    </div>
</body>

</html>