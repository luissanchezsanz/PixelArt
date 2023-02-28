<?php
    $vista = null;

    include('Assets/config/configDB.php');
    $client = new SoapClient(NULL, OPTIONS);
      
    try{
        $pixels = $client->getPixels();
            
        echo '<table>';
        foreach($pixels as $pixel){
            if($pixel['y']== 0){
                echo '<tr>';
            }
            echo '<td><a style="background-color: '.$pixel[2].'; height: 2rem; width: 2rem; display: block;" 
            data-coords="'.$pixel['x'].','.$pixel['y'].'"></a></td>';
            if($pixel['y'] == 31 ){
                echo '</tr>';
            }
        }
        echo '</table>';
        echo '<form class="color-picker" style="display: none;">
        <input type="color" name="color" value="<?= $pixel[2] ?>">
        <button type="submit">Cambiar</button>
        </form>';
    }catch (Exception $e){
        echo $e;
    }
    

    // print $pixels;
?>