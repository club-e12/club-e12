<?php
    define( 'SCRIPT_ROOT', 'http://localhost/club-e12' );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Club E-12</title>  <!- gets dyynamicall changed by loaded main content -->
    
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- this enforces to reload the css with a dummy version not existent -->
    <?php
    $v=rand(1, 10000);
    echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/svg_logo.css?v=' .$v  . '">';
    ?>
    
    
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
                
                save_this = $(this); // yess, this works - expanded-value gets lost otherwise ! jquery bug?
                   
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
                // rem: child() won't work for nested <a> in <li>
                
                uri_to_load = save_this.find('a').attr('href');
                new_title = save_this.find('a:first').text();
                document.title = new_title + ":" + " Club-E12";
              
           
                e.preventDefault();                 // !!
                if (uri_to_load != "#") {
                    $(".main").load(uri_to_load);
                }
                
                /* WAFINDIG , path construction  */
                /* use CCS to style these different span id's for introtest, sperator symbol and path !! */
                
                sperator ="<span id='sep_symb'> &#x2192; </span>"; 
                path = sperator;
                current = $("[iamhere=true]").find('a:first').text();  // current element
                $("[iamhere=true]").parents("[nested='true'][iamhere='false']").find('a:first').each (function (value) {
                    path =  path+$(this).text()+sperator;
                }); 
                path=path+current;
    
                $('span[id="wayfinding"]').html( "<span id='intro'> You are here: </span>"
                    + "<span id='path'>" +   path + "</span>" );
                                                
                
            });  // end on-click event inner function
            
            
            // things to run only once after initial DOM:
            
            // init: show top level of clamshell once on document ready event
            
            $('nav ul').hide();  
            $('nav > ul > li ').parents().show(); // ! selector to remember
            
            $("li[nested='true']").children('div.arrow').html("&#x25c4") ; // left arrow for nested elements
            
            // load content of first item in nav

            uri_to_load = $("nav ul li").first().find('a').attr('href');
            first_title = $("nav ul li").first().find('a').text()+ ":" + " Club-E12";

            // alert( uri_to_load.text() );
            $(".main").load(uri_to_load)  ; // ??
            document.title = first_title;
            
        }); // end of inner function document ready
  
    </script>
</head>

    
<body>
    <div id="wrapper">

        <header>    
            <div id="header-content">
                
             
                <div class="svg_div_left">
                    <?php
                    $file_svg = file_get_contents(SCRIPT_ROOT."/images/club-e12.svg");
                    echo $file_svg;
                    ?>
                </div>
                
                
                <div class="svg_div_right">
                    <?php
                    $file_svg = file_get_contents(SCRIPT_ROOT."/images/club-e12.svg");
                    echo $file_svg;
                    ?>
                </div>
                
                <div class="header_text">
                    thomas
                </div>
                
                <div class="header_text">
                    thomas_2
                </div>
                
                <div class="header_text">
                    <span id="wayfinding"></span> <!-- display current  path, injected via js -->
                </div>
                
                

            </div>  
        </header>
   
    <div id="content">  <!-- contains nav sidebar and main injected cotent -->
        

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

    </div> <!-- end of wrapper -->
    
    <div id="footer">
        <footer id="footer-content">
            <p>Just a simple footer </p>
        </footer>
    </div>
    
</body>

</html>