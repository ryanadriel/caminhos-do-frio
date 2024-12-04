<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ReservationResource;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestReservation extends BaseWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Últimas Reservas Solicitadas';


    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query( ReservationResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('reservation_date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nome')
                    ->sortable(),
                Tables\Columns\TextColumn::make('package.name')
                    ->label('Pacote')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total do Pacote')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reservation_date')
                    ->label('Data da Reserva')
                    ->date('d/m/y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
