<?php
    // phpinfo();
    $vista = null;

    include('Assets/config/configDB.php');
    $client = new SoapClient(NULL, OPTIONS);
      
    try{
        $pixels = $client->getPixels();
       
        $color = $pixels[2];
        $pixels[1][2] = $color;
            
        echo '<table>';
        foreach($pixels as $row){
            echo '<tr>';
                foreach($row as $pixel){
                    echo "<td style='background-color: $row[2] '";
                }
            echo '</tr>';
        }
        echo '</table>';
    }catch (Exception $e){
        echo $e;
    }
     
    

    print $pixels;
?>