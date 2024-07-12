<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\dto;

Class PolicerePositoriesdto
{
public $id;
public $building;
public $gender;
public $room;
public $ZigBeadDress;
public $date;
public $status;
public $floor;
public $fs1;
public $cl1;


public function __construct ($data = null)
{
    if (\is_array($data)) {
        if (isset($data["ID"])) {
            $this->id = (int) $data["ID"];
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
        // if (isset ($data['zigbee_addr'])) {
        //     $this->ZigBeeAddress = $data['Zigbee_addr'];
        // }
        // if (isset($data['tm'])) {
        //     $this->date = $data['tm'];
        // }
        if (isset($data['fs'])) {
            $this->status = $data['fs'];
        }
        // if (isset($data['fs1'])) {
        //     $this->fs1 = $data['fs1'];
        // }
        // if (isset($data['cl1'])) {
        //     $this->cl1 = $data['cl1'];
        // }
    }
}
}