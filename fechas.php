<?php
//include('top-cache.php'); 
date_default_timezone_set('America/Mexico_City');
//echo 'hola mundo';
$date1 = "Thu, 17 Mar 2022 16:19:23 GMT";
$date2 = "Thu, 17 Mar 2022 18:57:16 -0400";
$date3 = "2022-03-16T22:12:41Z";
$date4 = "2022-03-17T17:23:10-04:00";
$date5 = "Sun, 20 Mar 2022 16:57:38 +0000";
$date6;
//echo date_format($date1, 'Y-m-d H:i:s');
#output: 2012-03-24 17:45:12
//echo date("jS F, Y H:i:s", strtotime("Sun, 20 Mar 2022 12:19:05 -0400"));
echo date("Y/m/d H:i:s D\, M j", strtotime("Sun, 20 Mar 2022 12:19:05 -0400"));

    //$rss = simplexml_load_file("http://news.yahoo.com/rss/");
        
        /*

        echo '<h4>'. $rss->channel->title . '</h4>';
        $imagen = $rss->channel->image->url;
        foreach ($rss->channel->item as $item) {
            //echo "<p>" . $item->title . "</p>";
            echo '<br>';
            echo $titulo = $item->title;
            echo '<br>';
            //echo "<p>" . $item->description . "</p>";
            $descripcion = $item->description;
            $descripcion = str_replace("<p>", "", $descripcion);
            echo$descripcion = str_replace("</p>", "", $descripcion);
            echo '<br>';
            //echo "<p>" . $item->pubDate . "</p>";
            $date = $item->pubDate;
            echo $date= date("Y/m/d\, H:i:s\, D\, M j", strtotime($date));
            echo '<br>';
            //echo "<p>" . $item->link . "</p>";
            echo $url = $item->link;
            echo '<br>';
            echo $imagen;
            echo '<br>';
            echo "imagen: ".$media;
            echo '<br>';

        } 
        */
        //include('bottom-cache.php');
?>