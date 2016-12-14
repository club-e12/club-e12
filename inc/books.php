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
    
   
</head>
    
<style>
            * { font-family: calibri, helvetica, sans-serif; }
        .handlebars {
            display: none;
        }


        li.course { padding-top: 0.7em; padding-left: 0.5em; }

        .course .number { font-style: small;}
        .course .title { font-weight: bold; }
        .course .faculty { font-style: italic; }
        .course .meeting {font-size: smaller; }
</style>

<script>
    var courses_data_url = "https://cdn.rawgit.com/tf-csci-e-12/92d5331ff29cb1e9d83430c383a4b852/raw/8807c34a8ef3f858b0e7b47da7af14ab48786043/courses.json";

$(document).ready(function(){
 $.getJSON(courses_data_url,
  function (data) {
    var mysource = $('#courselisttemplate').html();
    var mytemplate = Handlebars.compile(mysource);
    var myresult = mytemplate(data)
    $('#courselist').html(myresult);
  });
});

</script>
    
<body>
    
    <h2>Courses</h2>

<div id="courselist">Course list goes here...</div>
<div id="courselisttemplate" class="handlebars">
    
    <p>{{courses.length}} courses were found:</p>
    <ol>
        {{#each courses as |course|}}
      
        <li class="course">
            <span class="number">{{course_group}} {{num_int}}{{num_char}}</span>
            <br/>
            <span class="title">{{title}}</span>
        
            {{#if faculty_text }}
              <br/>
              <span class="faculty">{{faculty_text}}</span>           
            {{/if}}
            {{#if meeting_text }}
              <br/>
              <span class="meeting">{{meeting_text}}</span>
            {{/if}}
            
        </li>
      
        {{/each}}
    </ol>
</div>
    
    
</body>

</html>