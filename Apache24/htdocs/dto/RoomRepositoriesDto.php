<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\dto;

Class RoomrePositoriesdto
{
    public $id;
    public $building;
    public $floor;
    public $room;


    public function __construct ($data = null)
    {
        if (\is_array($data)) {
            if (isset($data["id"])) {
                $this->id = (int) $data["id"];
            }
            if (isset($data['building_name'])) {
                $this->building = $data['building_name'];
            }
            if (isset($data['floor_name'])) {
                $this->floor = $data['floor_name'];
            }
            if (isset($data['room_name'])) {
                $this->room = $data['room_name'];
            }
        }
    }
}
