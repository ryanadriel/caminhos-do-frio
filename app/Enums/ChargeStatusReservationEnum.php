<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ChargeStatusReservationEnum: string implements HasLabel, HasColor
{
    case PENDING = 'pending';
    case RESERVED = 'reserved';
    case CANCELLED = 'cancelled';

    public function getLabel(): ?string
    {
      return match ($this) {
          self::PENDING => 'Pendente',
          self::RESERVED => 'Reservado',
          self::CANCELLED => 'Cancelado',
      };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'gray',
            self::RESERVED => 'success',
            self::CANCELLED => 'danger',
        };
    }
}
