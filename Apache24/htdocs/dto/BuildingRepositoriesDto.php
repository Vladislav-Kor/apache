<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\dto;

Class BuildingRepositoriesDto
{
    public $building_addr;
    public $name;

    public function __construct ($data = null)
    {
        if (\is_array($data)) {
            if (isset($data["building_addr"])) {
                $this->building_addr = (int) $data["building_addr"];
            }
            if (isset($data['building_name'])) {
                $this->name = $data['building_name'];
            }
           
        }
    }
}