<?php



class MyOwnFetchLib {

    public static function getBookAndAuthors($book) { // expects book object with isbn_13 set and will return this object and an authors array

        $qry_str = '?bibkeys=ISBN:' .$book->isbn_13 . '&jscmd=viewapi';
        $qry_str_2 = 'https://www.googleapis.com/books/v1/volumes?q=sisbn:' . $book->isbn_13 ;

        $json_string = 'https://books.google.com/books' . $qry_str;
        $jsondata = file_get_contents($json_string);


        $jsondata= substr( $jsondata,19); // remove var for js 'var _GBSBookInfo = '
        $jsondata= substr($jsondata, 0, -1); // remove semicolon
        $jsondata_2 = file_get_contents($qry_str_2);


        $jsondata = json_decode($jsondata,true);
        $jsondata_2 = json_decode($jsondata_2,true);

        if ( $jsondata ) { // boolean, if isbn found
            $key = 'ISBN:'. $book->isbn_13;
            $book->google_preview =  $jsondata  [$key]["preview_url"] ;


                $book->title = $jsondata_2["items"][0]["volumeInfo"]["title"];

                $id = $jsondata_2["items"][0]["id"];
                $book->published = $jsondata_2["items"][0]["volumeInfo"]["publishedDate"];
                $book->page_count = intval  ( $jsondata_2["items"][0]["volumeInfo"]["pageCount"] );
                $book->purchase_link = $jsondata_2["items"][0]["volumeInfo"]["infoLink"];
                
                $book->description = $jsondata_2["items"][0]["volumeInfo"]["description"];

                $cover = 'https://books.google.com/books/content?id=' .$id . '&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api';
                $book->cover = $cover;

                $authors = $jsondata_2["items"][0]["volumeInfo"]["authors"];

                return $authors;
        }

    }

}

?>
