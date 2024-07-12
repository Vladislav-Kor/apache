<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\entities;

class ObjectId
{
    private $id;

    /**
     * __construct.
     *
     * @param mixed $id
     */
    public function __construct($id = null)
    {
        if(!is_int($id)||is_null($id)){
            throw new \InvalidArgumentException("переданный не корректный Id");
        }
        $this->id =  $id;
    }

    /**
     * getValue.
     */
    public function getValue(): int
    {
        return $this->id;
    }
}