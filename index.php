<!DOCTYPE html>

<html lang="en">
    
    

<head>
    <title>Club E-12</title>
    
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript">
    </script>
    
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            $("nav li").click(function (e) {
                
                e.stopPropagation(); // !!! took ages to find this solution .. 
                
                // remember if current clicked on <li> was clicked (and hence expanded) before
                 old_iamhere = ( ($(this).attr("iamhere") == 'true') && ($(this).attr("expand") == 'true')  ); 
                
                // init all with iamhere=false and expand=true
               
                $("nav li").attr("iamhere", "false");
                $("nav li").attr("expand", "true");
                
                // but set iamhere true for the current selected one,               
            
                $(this).attr("iamhere", "true");  
                
                // if current <li> was clicked again then do not expand
                if (old_iamhere)  {
                    $(this).attr("expand", "false");   
                }
                
                save_this = $(this); // yess, this works - expanded value gets lost otherwise, jquery bug ?
                
    
                
                $('nav ul').hide();
                $("[iamhere=true]").parents().show();       
                
                
                 if (!old_iamhere) {
                     $("[iamhere=true][expand=true]").children().show();
                     save_this.attr("expand", "true");  // re-init                                
                 }
                
                // load linked nav sources into same window
                uri_to_load = save_this.find('a').attr('href');
                console.log(uri_to_load);
                e.preventDefault();
                if (uri_to_load != "#") {
                    $(".main").load(uri_to_load);
                }
                   
            });
            
            // init: show top level of clamshell once on document ready event
            
            $('nav ul').hide();
    
            $('nav > ul > li ').parents().show(); // ! selector to remember
  
        });
    </script>
</head>

<body>
    

    
    <header>
        <p title="club_e-12">Club E-12</p>
    </header>
    
       
    <div id="wayfindig">
        
    </div>
    
    
    <nav>
        <?php include("inc/nav_dynamic.php"); ?>
    </nav>
    
    <div class="main"> DIV </div>
    
    <footer>
        <p>Just a simple footer </p>
    </footer>
    

    
</body>

</html>