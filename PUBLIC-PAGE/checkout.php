<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body style="background-color: #eff2f1;">
    <div style="background-color: #3b5d50;">
        <?php
        $headerHomeAboutUsLinkCss = "opacity: 1;";
        include "component/header.php";
        ?>
        <?php
        include "component/menu-click-icon.php";
        ?>
        <?php
        $Content1IndexFontContent = "Checkout";
        $Content1IndexPresentContent = "Checking your products";
        include "component/content-1.php";
        ?>
    </div>
    <?php
    include "component/content-10.php"
    ?> 
    
    <?php
    include "component/content-6.php"
    ?> 
    
</body>

</html>