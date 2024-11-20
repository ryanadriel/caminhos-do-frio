<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ChargeTypeEnum: string implements HasLabel
{
    case HOTEL = 'hotel';
    case RESTAURANT = 'restaurant';
    case TOURIST_SPOT = 'tourist_spot';
    case OTHER = 'other';

    public function getLabel(): ?string
    {
        return match ($this){
            self::HOTEL => ('Hotel'),
            self::RESTAURANT => ('Restaurante'),
            self::TOURIST_SPOT => ('Ponto Turistico'),
            self::OTHER => ('Outro'),
        };
    }

}
