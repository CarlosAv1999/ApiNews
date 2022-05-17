<?php
//include('top-cache.php'); 
include_once 'alloycors.php';
include_once 'db.php';

class Noticia extends DB{
    /*
    function obtenerNoticias(){
        $query = $this->connect()->query('SELECT DISTINCT news.shipment_id, news.title, news.description, news.url, news.published, categories.name 
        FROM news, categories, feeds 
        WHERE news.feed_id = feeds.order_id AND feeds.category_id = categories.id 
        ORDER BY news.shipment_id;');
        return $query;
    }
*/
    function obtenerNoticias(){
        $query = $this->connect()->query('SELECT * FROM consultarnoticias');
        return $query;
    }
/*
    function obtenerCategorias(){
        $query = $this->connect()->query('SELECT	DISTINCT categories.id, categories.name 
        FROM categories');
        return $query;
    }
*/
    function obtenerCategorias(){
        $query = $this->connect()->query('SELECT * FROM consultarcategorias');
        return $query;
    }

    function obtenerNoticia($id){
        $query = $this->connect()->prepare('select s.* from (select @p2:=:id p) parm , consultarnoticiasid s');
        $query->execute(['id' => $id]);
        return $query;

        /*
        $query = $this->connect()->prepare('SELECT * FROM pelicula WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
        */
    }
/*
    function obtenerNoticiasTitulo($titulo){
        $titulo = "%".$titulo."%";
        //echo $titulo;
        $query = $this->connect()->prepare('SELECT news.shipment_id, news.title, news.description, news.url, news.published, categories.name
        FROM news, categories, feeds 
        WHERE news.shipment_id > 0	AND news.feed_id = feeds.order_id AND feeds.category_id = categories.id AND categories.id > 0 AND news.title LIKE :titulo
        ');
        $query->execute(['titulo' => $titulo]);
        return $query;
    }
    */

    function obtenerNoticiasTitulo($titulo){
        $titulo = "%".$titulo."%";
        //echo $titulo;
        $query = $this->connect()->prepare('select s.* from (select @p1:=:titulo p) parm , consultartitulo s');
        $query->execute(['titulo' => $titulo]);
        return $query;
    }

    function obtenerNoticiasOrden($orden){
        //$orden = "%".$orden."%";
        //echo $orden;
        switch($orden){
            case "title":
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordentitle');
                //$query->execute(['orden' => $orden]);
                break;

            case "url":
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordenurl');
                //$query->execute(['orden' => $orden]);
                break;

            case "description":
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordendescripcion');
                //$query->execute(['orden' => $orden]);
                break;

            case "category":
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordencategory');
                //$query->execute(['orden' => $orden]);
                break;

            case "published":
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordenpublished');
                //$query->execute(['orden' => $orden]);
                break;

            default:
                $query = $this->connect()->query('SELECT * FROM consultarnoticiasordenpublished');
                //$query->execute(['orden' => $orden]);
        }
        return $query;
    }

    function obtenerNoticiasFeed($id){
        $query = $this->connect()->prepare('select s.* from (select @p2:=:id p) parm , consultarnoticiasfeed s');
        $query->execute(['id' => $id]);
        return $query;
    }

    function obtenerInfoFeed(){
        $query = $this->connect()->query('SELECT * FROM consultarnoticiasfeedsinid');
        //$query->execute(['id' => $id]);
        return $query;
    }

    function obtenerInfoFeedId($id){
        $query = $this->connect()->prepare('select s.* from (select @p2:=:id p) parm , consultarinfofeeds s');
        $query->execute(['id' => $id]);
        //echo json_encode($query);
        return $query;
    }

    function obtenerCategoria($array){
        //echo $array['name'];
        $nombre = $array['name'];
        $nombre = "%".$nombre."%";
        //echo $nombre;

        //echo $titulo;
        $query = $this->connect()->prepare('select s.* from (select @p1:=:nombre p) parm , consultarcategoriapornombre s ');
        $query->execute(['nombre' => $nombre]);
        //echo json_encode($query);
        return $query;
    }
    

    function obtenerIdFeedCreado(){
        $query = $this->connect()->query('SELECT * FROM consultaridfeedcreado');
        return $query;
    }

    function nuevoFeed($feed){
        //$this->obtenerCategoria($feed);
        //$query = $this->connect()->prepare('INSERT INTO pelicula (nombre, descripcion) VALUES (:nombre, :descripcion)');
        $query = $this->connect()->prepare('INSERT INTO `feeds` (`order_id`, `category_id`, `url`) VALUES (NULL, :id, :url);');
        $query->execute(['id' => $feed['id'], 'url' => $feed['url']]);
        return $query;
    }

    function nuevaNoticia($feed_id, $titulo, $descripcion, $date, $url, $imagen){
        
        //$query = $this->connect()->prepare('INSERT INTO pelicula (nombre, descripcion) VALUES (:nombre, :descripcion)');
        $query = $this->connect()->prepare('INSERT INTO `news` (`shipment_id`, `feed_id`, `title`, `description`, `published`, `url`, `imagen`) VALUES (NULL, :feed_id, :titulo, :descripcion, :date, :url, :imagen);');
        $query->execute(['feed_id' => $feed_id, 'titulo' => $titulo, 'descripcion' => $descripcion, 'date' => $date, 'url' => $url, 'imagen' => $imagen] );
        return $query;
    }

    function nuevaCategoria($categoria){
        
        //$query = $this->connect()->prepare('INSERT INTO pelicula (nombre, descripcion) VALUES (:nombre, :descripcion)');
        $query = $this->connect()->prepare('INSERT INTO `categories` (`id`, `name`) VALUES (NULL, :name)');
        $query->execute(['name' => $categoria['name']]);
        return $query;
    }

    function destruirNoticiasFeed($id){
        //$this->obtenerCategoria($feed);
        //$query = $this->connect()->prepare('INSERT INTO pelicula (nombre, descripcion) VALUES (:nombre, :descripcion)');
        $query = $this->connect()->prepare('DELETE FROM news 
        WHERE news.feed_id = :id;');
        $query->execute(['id' => $id]);
        return $query;
    }
    /*
    function nuevaPelicula($pelicula){
        $query = $this->connect()->prepare('INSERT INTO pelicula (nombre, descripcion) VALUES (:nombre, :descripcion)');
        $query->execute(['nombre' => $pelicula['nombre'], 'descripcion' => $pelicula['descripcion']]);
        return $query;
    }
    */

}
//include('bottom-cache.php');
?>