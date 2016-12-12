
    
<?php
    
 $json =  file_get_contents('json/nav_hierarchy.json') ;
    
 $data = json_decode($json, true);

    

$group_closed=false;
$last_depth =0;
    
function my_func($para,$depth) {  

    $prev_node_depth = $depth;
    $depth=$depth+1;
    
    global $last_depth;  
    global $group_closed;

       $name="";
       foreach ($para as $key => $value) {
           
           $new_node = ( ( gettype($value)=="array" )   ) ;
           
         
           if ( $new_node &&   $last_depth == $depth  )  { 
                    print ( "<ul>" );           
            } else  // DELETE this path, never gits visited ?!
                { if ( $new_node &&   $group_closed  && ( $prev_depth-$last_depth == 1 )  )  { 
                    print ( "<ul>" );          
                    }
                }
           
            if ( $new_node ) {
               //   print ("<br/>new node: last " . $last_depth . "  depth: ". $depth ." prev_depth: ".$prev_node_depth  ."<br/>");
                $prev_node_depth = my_func($value,$depth);
            }   else {

               if ($key=="name")  {
                   $name = $value;
                  //  print ( "<li>" . $value );
                    }
               
               $temp = $depth;
               
               if ($key=="path")  {
                //    print (   " " . $value .  "<i> last: " .$last_depth. " depth: ". $depth ."  prev_depth:".$prev_node_depth . " temp:".$temp."</i> </li> ");
                // print ( "<li>" . $value . $name. " </li> ");
                   print ( "<li> <a href= \"" .   $value .  "\">" .$name. "</a> ");
                   
                if ( $new_node &&   $last_depth == $depth  )  { 
                    print ( "</li>" );           
                    }
                      
              
                   
                   $name="";
                
              //       print "<li id=\"navpart".$key."\"><a href=\"index.php?id=".$key."\"> ".$value. "</a></li>";
                   
                    }
               
            
               $last_depth = $depth;
               
            
            }
    
        
       } // end for
    
      /*  if ($prev_node_depth-1 == $depth) { 
           print ("  close if prev+1== depth:" . $depth . " prev_depth:" . $prev_node_depth  . "</br>"); } */ 
        
       if ($prev_node_depth-1 == $depth) { 
           
           print ("</ul></li> ") ; 
           $group_closed = true ; }
    

    
    return $depth;
      
}   


$x=my_func($data,-1);



?>
