<!DOCTYPE html>
<html>

<head></head>

<body>
    
<?php
    
 $json =  file_get_contents('json/titles2.json') ;
    
 $data = json_decode($json, true);

    

$group_closed=false;
$last_depth =0;
    
function my_func($para,$depth) {

    $prev_node_depth = $depth;
    $depth=$depth+1;
    
    global $last_depth;  
    global $group_closed;

       
       foreach ($para as $key => $value) {
           
           $new_node = ( ( gettype($value)=="array" )   ) ;
           
         
           if ( $new_node &&   $last_depth == $depth  )  { 
                    print ( "<ul>  - ul, NEW group" );           
            } else 
                { if ( $new_node &&   $group_closed  && ( $prev_depth-$last_depth == 1 )  )  { 
                    print ( " <ul>  - ul, group CLOSED" );          
                    }
                }
           
            if ( $new_node ) {
               //   print ("<br/>new node: last " . $last_depth . "  depth: ". $depth ." prev_depth: ".$prev_node_depth  ."<br/>");
                $prev_node_depth = my_func($value,$depth);
            }   else {

               if ($key=="name")  {
                    print ( "<li> <b>" . $value . "</b>");
                    }
               
               $temp = $depth;
               
               if ($key=="path")  {
                //    print (   " " . $value .  "<i> last: " .$last_depth. " depth: ". $depth ."  prev_depth:".$prev_node_depth . " temp:".$temp."</i> </li> ");
                   print ( $value .  " </li> ");
                    }
               
            
               $last_depth = $depth;
               
            
            }
    
        
       } // end for
    
      /*  if ($prev_node_depth-1 == $depth) { 
           print ("  close if prev+1== depth:" . $depth . " prev_depth:" . $prev_node_depth  . "</br>"); } */ 
        
       if ($prev_node_depth-1 == $depth) { 
        //   print ("</ul>  --- CLOSE GROUP ---<br/>") ; 
           print (" - close group </ul> ") ; 
           $group_closed = true ; }
    

       
    return $depth;
      
}   

    
$x=my_func($data,-1);
   
   
	




    /*
    $jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
    
   
    
        $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($json, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            echo "$key:\n";
        } else {
            echo "$key => $val\n";
        }

        echo ("</br>");
        
  */


?>
</body>

</html>