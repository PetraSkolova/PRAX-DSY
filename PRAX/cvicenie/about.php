<?php 

$actualPage = basename($_SERVER["REQUEST_URI"]);  //odtrhnem lomitko, ostane meno adresara 

include ("includes/header.php"); 

?>

<main>
    <h1>About</h1>

    <p class="content">
        Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Voluptatem deleniti eius
        nostrum incidunt tempore praesentium voluptate odio,
        laborum eligendi dolores natus rem pariatur, cum numquam 
        porro expedita ipsam at nobis.
    </p>
    
    <p class="content">
        Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Voluptatem deleniti eius
        nostrum incidunt tempore praesentium voluptate odio,
        laborum eligendi dolores natus rem pariatur, cum numquam 
        porro expedita ipsam at nobis.
    </p>

    <p class="content">
        Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Voluptatem deleniti eius
        nostrum incidunt tempore praesentium voluptate odio,
        laborum eligendi dolores natus rem pariatur, cum numquam 
        porro expedita ipsam at nobis.
    </p>

</main>

<?php include ("includes/footer.php"); ?>