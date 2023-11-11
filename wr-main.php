<!DOCTYPE html>
<html lang="en">
    <?php session_start();?>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <meta charset="UTF-8">
        <title> Game </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            function gameSetup(){
                window.location.href ="wr-setup.php";
            }
        </script>

    </head>
    <body>
        <style>
            <?php include "Design.css" ?>
        </style>
        <div class="navbar">
            <a href="wr-main.php"><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="Account.php"><i class="fas fa-cog"></i></a>
            <!-- Welcome Header -->
            <h1 class="header">Welcome!</h1>
        </div>


        <div id="mainDiv">
            <h3 id="how">How to play</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras accumsan elit ac vehicula porttitor. Fusce id tempus justo. Vestibulum ligula turpis, fermentum in volutpat eget, rutrum vel nunc. Aenean pretium sit amet nunc facilisis molestie. In fermentum diam quis velit pretium vehicula. Duis maximus malesuada ligula, ut lobortis odio. Pellentesque sit amet condimentum orci. Nullam maximus ac dui elementum facilisis. Curabitur vel hendrerit justo, nec dignissim arcu. Duis gravida nibh ante, et auctor neque auctor non. Suspendisse vitae risus velit. Duis volutpat libero eu risus dignissim, porttitor placerat urna tincidunt. Curabitur nec imperdiet urna. Aliquam massa augue, semper quis rhoncus nec, fringilla at nibh. Sed a iaculis metus, vitae commodo ex. Vivamus ac dolor non ante pulvinar tincidunt et ac ante.

                Sed et lorem ullamcorper, lacinia velit sed, aliquet lacus. Phasellus volutpat fringilla tortor, quis elementum urna aliquet mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse ligula nulla, sodales vehicula augue at, tempus luctus felis. Duis ullamcorper enim tellus, et mattis diam venenatis id. Duis ac nisi laoreet, sollicitudin sem vel, cursus ante. Integer id vehicula tortor. Morbi vestibulum interdum eros, eget lacinia nulla congue auctor. Duis eu suscipit massa. Vivamus ullamcorper iaculis lobortis. Nulla non tempor nulla. Mauris ornare nisl in purus dictum, sit amet commodo mi bibendum.
                
                Vestibulum venenatis mollis lorem at maximus. Praesent ante mi, ornare quis finibus viverra, consequat quis tortor. Etiam ut libero lectus. Fusce ultricies, lorem eget luctus pharetra, magna lectus sodales arcu, vitae rutrum massa enim et ex. In non pulvinar ante. Proin nulla odio, elementum in facilisis sit amet, facilisis id mi. Mauris ac mollis est. Suspendisse potenti. Phasellus eget sem erat. Sed porta, arcu in fringilla tempor, nisl erat efficitur nunc, vel dignissim odio risus et nisl.</p>
        </div>
        <div id="cont">
        <button id="play" onclick="gameSetup()"> Play </button>
        </div>  
    </body>
</html>