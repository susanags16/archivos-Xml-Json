<?php
  crear(); //Creamos el archivo
 // leer();  //Luego lo leemos
   
  //Para crear el archivo
  function crear(){
      $bd = new mysqli('localhost', 'root', '', 'crudbasico') or die("Error al conectar con MySQL-> ".mysql_error());
    
       $stmt = $bd->prepare("SELECT id, nombre, telefono, email  FROM contactos");
       $stmt->execute();
       $stmt->store_result();
       $stmt->bind_result($id, $nombre, $telefono, $email); 
  
       $xml = new DomDocument('1.0', 'UTF-8');
  
      $directorio = $xml->createElement('directorio');
      $directorio = $xml->appendChild($directorio);
  
      while($stmt->fetch()) {
     
        $contacto = $xml->createElement('contacto');
        $contacto = $directorio->appendChild($contacto);
 
        $nodo_id = $xml->createElement('id', $id);
        $nodo_id = $contacto->appendChild($nodo_id);
        $nodo_nombre = $xml->createElement('nombre', $nombre);
        $nodo_nombre = $contacto->appendChild($nodo_nombre);
        $nodo_telefono = $xml->createElement('telefono', $telefono);
        $nodo_telefono = $contacto->appendChild($nodo_telefono);
        $nodo_email = $xml->createElement('email', $email);
        $nodo_email = $contacto->appendChild($nodo_email);
       }
    
      // $stmt->free();
       $bd->close();
    
      $xml->formatOutput = true;
      $el_xml = $xml->saveXML();
      $xml->save('contacto.xml');
      
      //Mostramos el XML puro
      echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
           htmlentities($el_xml)."
<hr>";
  }
  
?>