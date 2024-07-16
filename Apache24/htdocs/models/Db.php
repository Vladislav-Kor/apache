<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\models;

use PDO;
use PDOException;
use app\repositories\Hydrator;
use app\entities\Room\RoomName;
use app\repositories\RoomsRepositories;
use app\repositories\PoliceRepositories;

class Db
{
    // public function result($controller){
    //     $res = '';
    //     try {
    //         $rooms = (new RoomsRepositories(new Hydrator()))->getRoom();
    //         foreach ($rooms as $key) {
    //             $room = ($key->jsonSerialize());
    //             $array  = (new PoliceRepositories(new Hydrator()))->getPoliceByRoom(new RoomName($room['room']));
    //             foreach ($array as $key) {
    //                 $item = $key->jsonSerialize();
    //                 $res .= $controller->renderPartial('@app/views/room/card-room', [
    //                     'room' => $item['room'],
    //                     'status' => $item['status']
    //                 ]);
                
    //            }         
    //         }
    //     } catch (PDOException|\InvalidArgumentException $e) {
    //         echo $e->getMessage();
    //     }

    //     return $res;
    // }

    public function result(){
        $res = '';
        $dsn = 'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=C:\Apache24\htdocs\web\document\dabase.mdb';
        $username = 'Admin';
        $password = 'orbita91.wxy-';

        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $table = [
                'police',
                'room',
                'build',
            ];
            $sql = "SELECT * FROM ".$table[0];
            $stmt = $conn->prepare($sql);
            $stmt->execute();
  
            $res = '<table border="1">';
            $res .= '<tr>';
            // Получение имен столбцов
            $columnNames = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
            foreach ($columnNames as $name) {
                $res .= '<th>' . $name . '</th>';
            }
            $res .= '</tr>';
            // Сброс курсора на начало
            $stmt->execute();
            // Вывод результатов в таблицу
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res .= '<tr>';
                foreach ($row as $value) {
                    $res .= '<td>' . $value . '</td>';
                }
                $res .= '</tr>';
            }
            $res .= '</table>';
            $conn = null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $res;
    }
}
