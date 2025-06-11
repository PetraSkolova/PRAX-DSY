<?php
require "database.php";

//require-cel stranka padne ak je v tom tubore chyba
//include - nacita sa to c je dobre aj ked je subor zly (napr index.php ale toto by neslo)
//tento prikaz chceme poslat na databazu
$sql = "SELECT * FROM users";
//toto posle nasu poziadavku a zapiseme si to co nam prislo spat
$result = mysqli_query($conn, $sql);
//toto nam da tie nase hodnoty v normalneho stavu(list the budu pekne vidno mena atd)
// dat si "var_dump($all_users);" a uvidis to
$all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//var_dump($all_users);
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>All users</title>
</head>
<body>
    <header></header>
    <main>
        <h1>All users</h1>
        <br>
        <?php 
        //toto zisti ci nahadou nieje ta databaza prazdna, potom zvoli tej
        if(empty($all_users)):?>
            <p> database is empty</p>
        
        <?php 
        //v tomto podtym som zmatena sry daj to do chatu
        else:?>
            <table>
            <tr>
                <th>Meno</th>
                <th>Priezvisko</th>
                <th>Vek</th>
                <th>Operacia</th>
            </tr>
            <?php foreach($all_users as $oneUser): ?>
                <tr>
                    <td><?php echo $oneUser["first_name"]?></td>
                    <td><?php echo $oneUser["last_name"];?></td>
                    <td><?php echo $oneUser["age"];?></td>
                    <td>
                    <a href="one_user.php?id=<?php echo $oneUser["id"]?>">info</a>
                    <a href="one_user.php?id=<?php echo $oneUser["id"]?>">edit</a>
                    <a href="one_user.php?id=<?php echo $oneUser["id"]?>">delete</a>

                    </td>

                </tr>
            <?php endforeach;?>
            </table>
            <?php endif;?>


        <a href="index.php">My database</a>

    </main>

    <footer>
    </footer>

    
</body>
</html>