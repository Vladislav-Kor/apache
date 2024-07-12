<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\Police;

use app\entities\Date;

/**
 * Police
 * Параметры номеров
 */
class Police implements \JsonSerializable
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

    /**
     * @var Date
     */
    private $date;

    /**
     * @var PoliceStatus
     */
    private $status;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id->getValue(),
            'building' =>  $this->building->getValue(),
            'floor' => $this->floor->getValue(),
            'room' => $this->room->getValue(),
            // 'date' => $this->date->getValue(),
            'status' => $this->status->getTranslator(),
        ];
    }
}