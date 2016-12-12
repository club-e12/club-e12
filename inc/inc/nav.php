       
<ul>

    <?php foreach ($json_data['titles'] as $key => $value) {
        print "<li id=\"navpart".$key."\"><a href=\"index.php?id=".$key."\"> ".$value. "</a></li>";
    }
    ?>



</ul>
