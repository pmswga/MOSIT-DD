<?php

namespace App\Core\Config;

class ListMessageCode
{
    public const ERROR = -2;
    public const WARNING = -1;
    public const INFO = 0;
    public const SUCCESS = 1;

    static public function getType($code)
    {
        switch ($code)
        {
            case self::ERROR:
            {
                return 'error';
            } break;
            case self::WARNING:
            {
                return 'warning';
            } break;
            case self::INFO:
            {
                return 'info';
            } break;
            case self::SUCCESS:
            {
                return 'success';
            } break;
            default:
                return 'message';
        }
    }

}
