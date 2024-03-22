<?php

namespace App\Traits;

trait TextEditor {

    public function getImages($message){
    
        $dom = new \DOMDocument();
      
        $y = $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      
        $images = $dom->getElementsByTagName('img');
       
        foreach($images as $k => $img){
           
            $data = $img->getAttribute('src');
            
            if(str_contains($data, 'data:image')){
                list($type, $data) = explode(';', $data);
              
                list($type, $data) = explode(',', $data);
                
                $data = base64_decode($data);
                
                $image_name= "/uploads/" . time().$k.'.png';
                $path = public_path() . $image_name;
    
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }

        }

        $message = $dom->saveHTML();

        return $message;
    }
}