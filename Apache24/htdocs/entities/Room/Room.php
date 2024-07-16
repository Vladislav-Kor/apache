<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\Room;

use app\entities\Date;

/**
 * Room
 * Параметры номеров
 */
class Room implements \JsonSerializable
{
    /**
     * @var ObjectId
     */
    private $id;

    /**
     * @var BuildingName
     */
    private $building;

    /**
     * @var FloorName
     */
    private $floor;

    /**
     * @var RoomName
     */
    private $room;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id->getValue(),
            'building' =>  $this->building->getValue(),
            'floor' => $this->floor->getValue(),
            'room' => $this->room->getValue(),
        ];
    }
}