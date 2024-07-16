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

class PoliceStatus
{
    public const STATUS_CLEAR = 'Clear';
    public const STATUS_DISTURB = 'Do not disturb False';
    public const STATUS_NOT_DISTURB = 'Do not disturb';
    public const STATUS_CLEARUP = 'Clearup';
    public const NOT_STATUS = '';

    /**
     * @var string
     */
    private $param;

    /**
     * __construct.
     *
     * @param int|string $value
     */
    public function __construct($param = null)
    {
        $array= [
            self::STATUS_CLEAR,
            self::STATUS_DISTURB,
            self::STATUS_NOT_DISTURB,
            self::STATUS_CLEARUP        
        ];
        if(in_array($param, $array)) {
            $this->param = self::NOT_STATUS;
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

    /**
     * getTranslator.
     */
    public function getTranslator(): string
    {
        switch ($this->param) {
            case self::STATUS_CLEAR:
                return 'Нужна уборка';
                break;
            case self::STATUS_CLEARUP:
                return 'не нужна уборка';
                break;
            case self::STATUS_NOT_DISTURB:
                return 'Не беспокоить';
                break;
            case self::STATUS_DISTURB:
                return 'можно беспокоить';
                break;
            default:
                return self::NOT_STATUS;
                break;
        }
    }
}