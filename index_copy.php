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
                // child() won't wotk for nested <a> in <li>
                uri_to_load = save_this.find('a').attr('href');
           
                e.preventDefault();                 // !!
                if (uri_to_load != "#") {
                    $(".main").load(uri_to_load);
                }
                
                // wayfindig
               
                // $("#wayfinding").append( uri_to_load );
                   
            });  // end on click event inner function
            
            
            // things to run only once after initial DOM:
            
            // init: show top level of clamshell once on document ready event
            
            $('nav ul').hide();  
            $('nav > ul > li ').parents().show(); // ! selector to remember
            
            // UTF-8 right pointing arrow for nested entries
            /*
            $('nav li[nested="true"] ').each(function () {
                if  (($this).attr(iamhere) == "true" ) {
                    $(this).find('div.arrow').text("_") ;
                }
                
                
            });
            */
             $("li[nested=true] ").attr("test", "xxx");
            
            
            
            
            /* load content of first item in nav

            uri_to_load = $("nav ul li").find('a').attr('href');
           
            $("#main").load(uri_to_load);  // ??
            */
  
        });
            
    </script>
</head>

<body>
    

    
    <header>
        <p title="club_e-12">Club E-12</p>
    </header>
    
       
    <div id="wayfinding">
        wayfinding, you are here: 
     
    </div>
    
    
    <nav>
        <?php include("inc/nav_dynamic.php"); ?>
    </nav>
    
    <div class="main"></div>
    
    <footer>
        <p>Just a simple footer </p>
    </footer>
    

    
</body>

</html>