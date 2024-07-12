<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\entities\Room;

class RoomName
{
    private $param;

    /**
     * __construct.
     *
     * @param mixed $param
     */
    public function __construct($param = null)
    { 
        
        try {
            if(is_null($param)||(is_string($param) && $param ==='')) {
                $this->param = "комната не назначена";
            }
            if(is_string($param)){
                $this->param =  $param;
            }
        } catch (\Throwable $th) {
            // throw new \InvalidArgumentException("переданное не корректное название комнаты".$param);
            throw $th;
        }
       
        
    }

    /**
     * getValue.
     */
    public function getValue(): string
    {
        return $this->param;
    }
}