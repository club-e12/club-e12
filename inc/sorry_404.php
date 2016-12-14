<?php
    define( 'SCRIPT_ROOT', 'http://localhost/club-e12' );
?>

<!DOCTYPE html>
<html lang="en">


    
<head>
    
    
    <?php
    $v=rand(1, 10000);
    echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/svg_logo.css?v=' .$v  . '">';
    ?>
    
    
</head>

<body>
    
    
    <div class="svg_div_center">
        <?php
        $file_svg = file_get_contents(SCRIPT_ROOT."/images/sorry_404.svg");
        echo $file_svg;
        ?>
    </div>

    
    
   
   
</body>

</html>