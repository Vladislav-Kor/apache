<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */
declare(strict_types=1);

namespace app\entities\Building;

/**
 * Building
 * 
 */
class Building implements \JsonSerializable
{
    /**
     * @var BuildingName
     */
    private $name;

    public function jsonSerialize(): array
    {
        return [
            'name' =>  $this->name->getValue(),
        ];
    }
}