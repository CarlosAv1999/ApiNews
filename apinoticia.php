<?php
include_once 'alloycors.php';
include_once 'noticia.php';
date_default_timezone_set('America/Mexico_City');
class ApiNoticias{
    
    function getAll(){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerNoticias();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "shipment_id" => $row['shipment_id'],
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "url" => $row['url'],
                    "published" => $row['published'],
                    "category" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            echo json_encode($noticias);
            return json_encode($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllCategories(){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerCategorias();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            echo json_encode($noticias);
            return json_encode($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerNoticia($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "shipment_id" => $row['shipment_id'],
                "title" => $row['title'],
                "description" => $row['description'],
                "url" => $row['url'],
                "published" => $row['published'],
                "category" => $row['name'],
            );
            array_push($noticias["items"], $item);
            echo json_encode($noticias);
            return json_encode($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getByTitulo($titulo){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerNoticiasTitulo($titulo);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "shipment_id" => $row['shipment_id'],
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "url" => $row['url'],
                    "published" => $row['published'],
                    "category" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            echo json_encode($noticias);
            return json_encode($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
        /*
        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "shipment_id" => $row['shipment_id'],
                "title" => $row['title'],
                "description" => $row['description'],
                "url" => $row['url'],
                "published" => $row['published'],
                "name" => $row['name'],
            );
            array_push($noticias["items"], $item);
            $this->printJSON($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
        */
    }

    function getSort($orden){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerNoticiasOrden($orden);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "shipment_id" => $row['shipment_id'],
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "url" => $row['url'],
                    "published" => $row['published'],
                    "category" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            echo json_encode($noticias);
            return json_encode($noticias);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getByIdFeed($id){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerNoticiasFeed($id);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "shipment_id" => $row['shipment_id'],
                    "title" => $row['title'],
                    "description" => $row['description'],
                    "url" => $row['url'],
                    "published" => $row['published'],
                    "category" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            echo json_encode($noticias);
            return json_encode($noticias);
            //$this->printJSON($noticias );
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllInfoFeed(){
        $noticia = new Noticia();
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticia->obtenerInfoFeed();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "order_id" => $row['order_id'],
                    "category_id" => $row['category_id'],
                    "url" => $row['url'],
                    "name" => $row['name'],
                );
                array_push($noticias["items"], $item);
            }
            //echo json_encode($noticias);
            return json_encode($noticias);
           // $this->printJSON($noticias );
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getCategoryByName($name){
        $noticia = new Noticia();
        $category = array();
        $category["items"] = array();

        $res = $noticia->obtenerCategoria($name);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "name" => $row['name'],
                    "id" => $row['id'],
                );
                array_push($category["items"], $item);
            }
            //echo json_encode($category);
            return json_encode($category);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getIdLastFeed(){
        $noticia = new Noticia();
        $category = array();
        $category["items"] = array();

        $res = $noticia->obtenerIdFeedCreado();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "order_id" => $row['order_id'],
                    "category_id" => $row['category_id'],
                    "url" => $row['url'],
                    "name" => $row['name'],
                );
                array_push($category["items"], $item);
            }
            //echo json_encode($category);
            return json_encode($category);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getInfoFeedById($id){
        $noticia = new Noticia();
        $category = array();
        $category["items"] = array();

        $res = $noticia->obtenerInfoFeedId($id);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "order_id" => $row['order_id'],
                    "category_id" => $row['category_id'],
                    "url" => $row['url'],
                    "name" => $row['name'],
                );
                array_push($category["items"], $item);
            }
            //echo json_encode($category);
            return json_encode($category);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function addCategoria($item){
        $categoria = new Noticia();
        $existe = true;

        $obj1 = json_decode($this->getAllCategories());
        $arrayFeeds = $obj1->{"items"};

        for($i = 0; $i < count($arrayFeeds); $i++){
            //echo $i;
            $obj2 =  $arrayFeeds[$i];
            $name = $obj2->name;
            echo $name;

            if (strcmp($name, $item['name']) === 0) {
                $existe = false;
            }
            
        }

        if ($existe) {

            $res = $categoria->nuevaCategoria($item);
            $this->exito('Nuevo categoria registrada');
        }else{
            $this->error('Ya existe la categoria ingresada');
        }
    }

    function addFeed($item){
        $feed = new Noticia();
        $existe = true;
        $imagenDef = "https://cdn-icons-png.flaticon.com/512/21/21601.png";

        $obj1 = json_decode($this->getAllInfoFeed());
        //print_r($obj1);
        $arrayFeeds = $obj1->{"items"};
        
        //echo = count($arrayFeeds);

        for($i = 0; $i < count($arrayFeeds); $i++){
            //echo $i;
            $obj2 =  $arrayFeeds[$i];
            $url = $obj2->url;

            if (strcmp($url, $item['url']) === 0) {
                $existe = false;
            }
            
        }

        if($existe){

        $obj1 = json_decode($this->getCategoryByName($item));
        $arrayId = $obj1->{"items"};
        $obj2 =  $arrayId[0];

        $catId = $obj2->id;

        $arrayFeed = array(
            'id' => $catId,
            'url' => $item['url']
        );

        $rss = simplexml_load_file($arrayFeed['url']);

        $res = $feed->nuevoFeed($arrayFeed);

        $obj1 = json_decode($this->getIdLastFeed());
        $arrayId = $obj1->{"items"};
        $obj2 =  $arrayId[0];
        $lastFeedId =  $obj2->order_id;

        
        

        echo '<h4>'. $rss->channel->title . '</h4>';
        $imagen = $rss->channel->image->url;

        if(strcmp($imagen, "") === 0){
            $imagen = $imagenDef;
        }
        echo '<br>';
        echo 'imagen url: '.$imagen;
        echo '<br>';
        foreach ($rss->channel->item as $item) {
            //echo "<p>" . $item->title . "</p>";
            $titulo = $item->title;
            //echo "<p>" . $item->description . "</p>";
            $descripcion = $item->description;
            $descripcion = str_replace("<p>", "", $descripcion);
            $descripcion = str_replace("</p>", "", $descripcion);
            //echo "<p>" . $item->pubDate . "</p>";
            $date = $item->pubDate;
            $date= date("Y/m/d\, H:i:s", strtotime($date));
            //echo "<p>" . $item->link . "</p>";
            $url = $item->link;
            $res = $feed->nuevaNoticia($lastFeedId, $titulo, $descripcion, $date, $url, $imagen);
        } 

        $this->exito('Nuevo feed registrado');
    }else{
        $this->error("El url del feed ya existe");
    }
    }

    function addNoticia($item){
        $categoria = new Noticia();

        $res = $categoria->nuevaCategoria($item);
        $this->exito('Nuevo categoria registrada');
    }

    function refresh(){
        $feed = new Noticia();

        $obj1 = json_decode($this->getAllInfoFeed());
        //print_r($obj1);
        $arrayFeeds = $obj1->{"items"};
        
        //echo = count($arrayFeeds);

        for($i = 0; $i < count($arrayFeeds); $i++){
            //echo $i;
            $obj2 =  $arrayFeeds[$i];
            $id = $obj2->order_id;
            $url = $obj2->url;
            
            $this->destroyNewsFeed($id);
            $rss = simplexml_load_file($url);
            $imagen = $rss->channel->image->url;
            foreach ($rss->channel->item as $item) {
                //echo "<p>" . $item->title . "</p>";
                $titulo = $item->title;
                //echo "<p>" . $item->description . "</p>";
                $descripcion = $item->description;
                $descripcion = str_replace("<p>", "", $descripcion);
                $descripcion = str_replace("</p>", "", $descripcion);
                //echo "<p>" . $item->pubDate . "</p>";
                $date = $item->pubDate;
                $date= date("Y/m/d\, H:i:s", strtotime($date));
                //echo "<p>" . $item->link . "</p>";
                $url = $item->link;
                $res = $feed->nuevaNoticia($id, $titulo, $descripcion, $date, $url,$imagen);
            } 
        }
        
        $this->exito('Nuevo feed registrado');
        
    }

    function refreshOneFeed($id){
        $feed = new Noticia();

        $obj1 = json_decode($this->getInfoFeedById($id));
        //print_r($obj1);
        $arrayFeeds = $obj1->{"items"};
        
        //echo = count($arrayFeeds);

        for($i = 0; $i < count($arrayFeeds); $i++){
            //echo $i;
            $obj2 =  $arrayFeeds[$i];
            $id = $obj2->order_id;
            $url = $obj2->url;
            
            $this->destroyNewsFeed($id);
            $rss = simplexml_load_file($url);
            $imagen = $rss->channel->image->url;
            foreach ($rss->channel->item as $item) {
                //echo "<p>" . $item->title . "</p>";
                $titulo = $item->title;
                //echo "<p>" . $item->description . "</p>";
                $descripcion = $item->description;
                //echo "<p>" . $item->pubDate . "</p>";
                $date = $item->pubDate;
                //echo "<p>" . $item->link . "</p>";
                $url = $item->link;
                $res = $feed->nuevaNoticia($id, $titulo, $descripcion, $date, $url, $imagen);
            } 
        }
        
        $this->exito('Nuevo feed registrado');
        
    }

    /*
    function add($item){
        $pelicula = new Noticia();

        $res = $pelicula->nuevaPelicula($item);
        $this->exito('Nuevo pelicula registrada');
    }
*/
    function destroyNewsFeed($id){
        $categoria = new Noticia();

        $res = $categoria->destruirNoticiasFeed($id);
        $this->exito('Noticias eliminadas');
    }

    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

    function subirImagen($file){
        $directorio = "imagenes/";

        $this->imagen = basename($file["name"]);
        $archivo = $directorio . basename($file["name"]);

        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    
        // valida que es imagen
        $checarSiImagen = getimagesize($file["tmp_name"]);

        if($checarSiImagen != false){
            //validando tamaño del archivo
            $size = $file["size"];

            if($size > 500000){
                $this->error = "El archivo tiene que ser menor a 500kb";
                return false;
            }else{

                //validar tipo de imagen
                if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                    // se validó el archivo correctamente
                    if(move_uploaded_file($file["tmp_name"], $archivo)){
                        //echo "El archivo se subió correctamente";
                        return true;
                    }else{
                        $this->error = "Hubo un error en la subida del archivo";
                        return false;
                    }
                }else{
                    $this->error = "Solo se admiten archivos jpg/jpeg";
                    return false;
                }
            }
        }else{
            $this->error = "El documento no es una imagen";
            return false;
        }
    }

    function getImagen(){
        return $this->imagen;
    }

    function getError(){
        return $this->error;
    }
}
?>