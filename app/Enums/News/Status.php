<?php

namespace App\Enums\News;

enum Status : string
{
    CASE DRAFT = 'draft';
    CASE ACTIVE = 'active';
    CASE BLOCKED = 'blocked';

    public static function getEnums() : array
    {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value
        ];
    }


}
