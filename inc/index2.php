<!DOCTYPE html>
<html lang="en">
<head>  
    <?php include("inc/htmlhead.php"); ?>  
    <?php
        if (empty($_GET)) {
            $id=0;
            }
            else {
                  $id= htmlspecialchars($_GET["id"]);
            }
      ?>
      
    <?php
        $json_data = json_decode( file_get_contents('json/titles.json') , true );
        $title = $json_data['titles'][$id];
        print "<title>The United States Constitution: ".$title."</title>";
    ?>

</head>

<?php  
   print "<body id=\"part".$id."\">" ; 
    
?>

<div class="container">
        
    <?php include("inc/header.php"); ?>

    <div class="row">
    
        <div class="three columns">
            <nav>
                <?php include("inc/nav2.php"); ?>
            </nav>
        </div>

        <div class="nine columns">
            <main>
                <?php include("inc/content".$id.".php"); ?>
            </main>
        </div>
        

        <div class="row">
            <div class="twelve columns">
                <footer>
                    <?php include("inc/footer.php"); ?>
                </footer>
            </div>
        </div>

    </div>
</div>    
<?php     
    print "  </body> ";
    print " </html> ";
?>