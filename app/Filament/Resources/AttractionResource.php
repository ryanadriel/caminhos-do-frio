<?php

namespace App\Filament\Resources;

use App\Enums\ChargeTypeEnum;
use App\Filament\Resources\AttractionResource\Pages;
use App\Filament\Resources\AttractionResource\RelationManagers;
use App\Models\Attraction;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttractionResource extends Resource
{
    protected static ?string $model = Attraction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->label('City')
                    ->options(
                        City::where('status', true)
                        ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('address')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('number')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),

                Forms\Components\Select::make('type')
                    ->options(ChargeTypeEnum::class)
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city.name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('number')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttractions::route('/'),
            'create' => Pages\CreateAttraction::route('/create'),
            'edit' => Pages\EditAttraction::route('/{record}/edit'),
        ];
    }
}
