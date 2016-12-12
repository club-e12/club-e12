
    
<?php
    
 $json =  file_get_contents('json/nav_hierarchy.json') ;
    
 $data = json_decode($json, true);

    

$group_closed=false;
$last_depth =0;
$just_opened = true;

    
function my_func($para,$depth,$para_close_it_tag) {  

    $close_it_tag = $para_close_it_tag;
    
    $prev_node_depth = $depth;
    $depth=$depth+1;
    
    global $last_depth;  
    global $group_closed;
    global $just_opened;

       $name="";
       
       foreach ($para as $key => $value) {
        
        //   print("  sizeof " . sizeof($value) .  " <br/>" );       
           
           $new_node = ( ( gettype($value)=="array" )   ) ;
           
           // print </li> only for non nested objects in next recursive call
           if ( $new_node)  {
               if ( sizeof($value)==2 ) {
                   $close_it_tag=true;
               } else {
                   $close_it_tag=false;
                }
           }
           
         //  print(" it_tag: ". (  $close_it_tag ? 'true' : 'false') . " <br/> ");
         
           if ( $new_node &&   $last_depth == $depth  )  { // new group gets opened
                    print ( "<ul>" );
                    $group_closed=false;
                    $just_opened=true;
            } else  // DELETE this path, never gets visited ?!
                { if ( $new_node &&   $group_closed  && ( $prev_depth-$last_depth == 1 )  )  { 
                    print ( "<ul>" );
                    $just_opened=true;
                    }
                }
           
            if ( $new_node ) {
               //   print ("<br/>new node: last " . $last_depth . "  depth: ". $depth ." prev_depth: ".$prev_node_depth  ."<br/>");
              //  print ("ENTER recursion <br/>");
                $prev_node_depth = my_func($value,$depth,$close_it_tag);
              //  print ("BACK from recursion <br/>");
            }   
           
           else { 

               
               if ($key=="name")  {
                   $name = $value;
                  //  print ( "<li>" . $value );
                    }
               
               $temp = $depth;
               
               if ($key=="path")  {
                //    print (   " " . $value .  "<i> last: " .$last_depth. " depth: ". $depth ."  prev_depth:".$prev_node_depth . " temp:".$temp."</i> </li> ");
                // print ( "<li>" . $value . $name. " </li> ");
                   print ( "<li> <a href= \"" .   $value .  "\">" .$name. "</a> ");
                   
            
                if (     $close_it_tag   )  { 
                    print ( "</li>" );
                    $just_opened=false;
                    
                    }
                      
              
                   
                   $name="";
                
              //       print "<li id=\"navpart".$key."\"><a href=\"index.php?id=".$key."\"> ".$value. "</a></li>";
                   
                    }
               
            
               $last_depth = $depth;
               
            
            } // end of else
    
        
       } // end for
    
      /*  if ($prev_node_depth-1 == $depth) { 
           print ("  close if prev+1== depth:" . $depth . " prev_depth:" . $prev_node_depth  . "</br>"); } */ 
        
       if ($prev_node_depth-1 == $depth) { 
           
           print ("</ul></li> ") ; 
           $group_closed = true ; }
    

    
    return $depth;
      
}   


$x=my_func($data,-1,false);



?>
