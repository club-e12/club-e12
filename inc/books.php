<?php
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
    
   
</head>
    
<style>
            * { font-family: calibri, helvetica, sans-serif; }
        .handlebars {
            display: none;
        }


        li.book { padding-top: 0.7em; padding-left: 0.5em; }

        .book .isbn_13 { font-style: small;}
        .book .available { font-weight: bold; }
        .book .location { font-style: italic; }
        .book .received {font-size: smaller; }
</style>

<script>
    var books_data_url = "https://rawgit.com/club-e12/club-e12/master/json/book_list.json";

$(document).ready(function(){
 $.getJSON(books_data_url,
  function (data) {
    var mysource = $('#booklisttemplate').html();
    var mytemplate = Handlebars.compile(mysource);
    var myresult = mytemplate(data)
    $('#booklist').html(myresult);
  });
});

</script>
    
<body>
    
  <?php


    include("my_lib/Book.php");
    $book = new Book();
    $book->isbn_13 = "9780321965516";
    
    print ( $book->isbn_13) ;
   
    
    include("my_lib/MyOwnFetchLib.php");
    $fetch = new MyOwnFetchLib();
    
    $fetch->getBookAndAuthors($book);
    print ($book->published);
    
        
             
  
   
?>
    
    
    <h2>Books</h2>

<div id="booklist">Book list goes here...</div>
<div id="booklisttemplate" class="handlebars">
    
    <p>{{books.length}} books were found:</p>
    <ol>
        {{#each books as |book|}}
      
        <li class="book">
            <span class="isbn_13">{{isbn_13}}</span>
            <br/>
            <span class="available">{{available}}</span>
              <br/>
            
            <span class="location">{{location}}</span>           

              <br/>
              <span class="received">{{received}}</span>
     
            
        </li>
      
        {{/each}}
    </ol>
</div>
    
    
</body>

</html>