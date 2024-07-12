<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\entities\Building;

class BuildingName
{
    private $param;

    /**
     * __construct.
     *
     * @param mixed $param
     */
    public function __construct($param = null)
    {
        if(is_null($param)) {
            $this->param = "здание не назначено";
        }
        if(!is_string($param)){
            throw new \InvalidArgumentException("переданное не корректное название здания");
        }
        $this->param = $param;
    }

    /**
     * getValue.
     */
    public function getValue(): string
    {
        return $this->param;
    }
}