<?php
    define( 'SCRIPT_ROOT', 'http://localhost/club-e12' );
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Books: Club E-12</title>  <!- gets dyynamicall changed by loaded main content -->
    
    <meta charset="utf-8">
    
    <!-- this enforces to reload the css with a dummy version not existent -->

   
    <!-- CDN handlebars -->
    <script src=https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.min.js type="text/javascript">
    </script>
    
    <!-- CDN Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript">
    </script>
    
    <?php
    $v=rand(1, 10000);
    echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/book.css?v=' .$v  . '">';
    ?>
    
   
</head>


<script>

var books_data_url = "https://rawgit.com/club-e12/club-e12/master/json/book_list.json";

$(document).ready(function(){
 $.getJSON(books_data_url,
  function (data) {
    var mysource = $('#booklisttemplate').html();
    var mytemplate = Handlebars.compile(mysource);
    var myresult = mytemplate(data)
    $('#booklist').html(myresult);
     
     
         $(".details").each( function () {
                alert ( $(this).html()  );    
            });
     
  });
    

    

    

});

</script>
    
<body>
    
  <?php


    include("my_lib/Book.php");
    include("my_lib/MyOwnFetchLib.php");
 
    $jsondata = file_get_contents("https://rawgit.com/club-e12/club-e12/master/json/book_list.json");
    $jsondata = json_decode($jsondata,true);
    
    $isbn_list = array();
    foreach($jsondata as $items) { 
        foreach($items as $item) {
            foreach ($item as $key =>$value) {
                // echo "Key: $key; Value: $value\n";
                if ( $key=='isbn_13')  {
                        $isbn_list[]=$value;}

            }
        }
    }

    print ("<div id=\"bookboxes\" >");
    
    foreach($isbn_list as $item_isbn) {
     
        $book = new Book();  
        $book->isbn_13 = $item_isbn;
    
        $fetch = new MyOwnFetchLib();
        $fetch->getBookAndAuthors($book); // extracted multiple authors from single string in json
        
        print ("<div id=\"box_" . $item_isbn ."\" class=\"book\" visible=\"false\"> </div>");
        
        
      //  print ("test : " . $book->description ." ". $book->google_preview);
    
      }
    print("</div>");
 ?> 
    

    <div>
        <h2> These are the recently added books to our book-exchange service:</h2>
    </div>
    
   
          
   <div id="destination">     
    </div>
    
 <script>
     $("#bookboxes").appendTo("#destination");
 </script>
    
<div id="booklist">Book list goes here...</div>
<div id="booklisttemplate" class="handlebars">
    
    <p>{{books.length}} books were found:</p>
   
        {{#each books as |book|}}
        

      
        <div id={{isbn_13}} class="details">{{isbn_13}}
            <span class="isbn_13">{{isbn_13}}</span>
            <br/>
            <span class="available">{{available}}</span>
              <br/>
            
            <span class="location">{{location}}</span>           

              <br/>
              <span class="received">{{received}}</span>
   
        </div>
         
      
        {{/each}}

</div>

</body>

</html>