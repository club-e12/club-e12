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
                  
                  // down-arrow for  iamhere when it is a nested item
                  $("[iamhere='true'][nested='true']").children('div.arrow').html("&#x25bc").attr("highlight_arrow","true"); 
                  // left-arrow for all not "iamhere"
                  $("[iamhere!='true'][nested='true']").children('div.arrow').html("&#x25c4").attr("highlight_arrow","false");  ;
                
                // down arrow for parents of iamhere
                 $("[iamhere=true]").parents("[nested='true'][iamhere='false']").find('div:first').html("&#x25bc").attr("highlight_arrow","true");
                
                 if (!old_iamhere) { // open close effect when clicked on again
                     $("[iamhere=true][expand=true]").children().show();
                     save_this.attr("expand", "true");  // re-init                                
                 } else { // toggling arrow
                     // left arrow 
                     $("[nested='true']").children('div.arrow').html("&#x25c4") ; 
                     // iamhere gets closed and changes color
                     $("[nested='true'][iamhere=true]").find('div').attr("highlight_arrow","false"); 
                     // parents are also open , therefore left-arrow ... tricky traversing :-(
                    $("[iamhere=true]").parents("[nested='true'][iamhere='false']").find('div:first').html("&#x25bc"); // down arrow 
                 }
                
                
                
                // load linked nav sources into same window
                // child() won't wotk for nested <a> in <li>
                uri_to_load = save_this.find('a').attr('href');
                new_title = save_this.find('a:first').text();
                document.title = new_title + ":" + " Club-E12";
              
           
                e.preventDefault();                 // !!
                if (uri_to_load != "#") {
                    $(".main").load(uri_to_load);
                }
                
                // wayfinding, current path
                path="";
                current = $("[iamhere=true]").find('a:first').text();  // current element
                $("[iamhere=true]").parents("[nested='true'][iamhere='false']").find('a:first').each (function (value) {
                    path =  path+$(this).text()+" -> "  ;
                }); 
                path=path+current;
    
                
                $('span[id="wayfinding"]').text("You are here: "+path);
         
                
                           
                   
            });  // end on click event inner function
            
            
            // things to run only once after initial DOM:
            
            // init: show top level of clamshell once on document ready event
            
            $('nav ul').hide();  
            $('nav > ul > li ').parents().show(); // ! selector to remember
            
            $("li[nested='true']").children('div.arrow').html("&#x25c4") ; // left arrow for nested elements
            
            // load content of first item in nav

            uri_to_load = $("nav ul li").first().find('a').attr('href');

            // alert( uri_to_load.text() );
            $(".main").load(uri_to_load)  ; // ??
            document.title = "XXXXX";
            
  
        }); // end of inner function document ready
        

        
            
    </script>
</head>

<body>
    <div id="wrapper">

    
    
        <header>    
            <div id="header-content">
                <h1 title="club_e-12">Club E-12 </h1>
                <h1 title="club_e-12">Club E-12 </h1>
           
                    <span id="wayfinding"> 
                    </span>

            </div>  
        </header>
   

        
    
    <div id="content">
        
        
  

        <div id="sidebar">
            <nav>
                <?php include("inc/nav_dynamic.php"); ?>
            </nav>
        </div>

        <div id="main" class="main">
                    <!-- content gets injected via js load -->
        </div>



         
    
    </div> <!-- end content -->

    <div class="push"></div>

    </div> <!-- wrapper -->
    
    <div id="footer">
        <footer id="footer-content">
            <p>Just a simple footer </p>
        </footer>
    </div>
</body>

</html>