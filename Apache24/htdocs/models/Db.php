<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\models;

use PDOException;
use app\repositories\Hydrator;
use app\repositories\PoliceRepositories;

class Db
{
    public function result($controller){
        $res = '';
        try {
           $array  = (new PoliceRepositories(new Hydrator()))->getPolice();
            foreach ($array as $key) {
                $item = $key->jsonSerialize();
                $res .= $controller->renderPartial('@app/views/room/card-room', [
                    'room' => $item['room'],
                    'status' => $item['status']
                ]);
            
           }
        } catch (PDOException|\InvalidArgumentException $e) {
            echo $e->getMessage();
        }

        return $res;
    }
}
