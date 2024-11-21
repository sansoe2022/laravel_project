<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HighLightResource\Pages;
use App\Models\HighLight;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HighLightResource extends Resource
{
    protected static ?string $model = HighLight::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'league'),
                Forms\Components\TextInput::make(name: 'home_name'),
                Forms\Components\TextInput::make(name: 'home_logo'),
                Forms\Components\TextInput::make(name: 'away_name'),
                Forms\Components\TextInput::make(name: 'away_logo'),
                Forms\Components\DateTimePicker::make('date_time')->required(),
                Forms\Components\TextInput::make(name: 'result')->required(),
                Forms\Components\Repeater::make('high_lights')
                    ->relationship('links')
                    ->schema([
                        Forms\Components\TextInput::make('reso')->required(),
                        Forms\Components\TextInput::make('link')->required(),
                        Forms\Components\TextInput::make('ref'),
                    ])
                    ->columns(3)
                    ->label('HighLight Links'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'league'),
                Tables\Columns\TextColumn::make(name: 'home_name'),
                Tables\Columns\TextColumn::make(name: 'home_logo'),
                Tables\Columns\TextColumn::make(name: 'away_name'),
                Tables\Columns\TextColumn::make(name: 'away_logo'),
                Tables\Columns\TextColumn::make(name: 'date_time'),
                Tables\Columns\TextColumn::make(name: 'result'),

            ])
            ->defaultSort('date_time', 'asc')
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
            'index' => Pages\ListHighLights::route('/'),
            'create' => Pages\CreateHighLight::route('/create'),
            'edit' => Pages\EditHighLight::route('/{record}/edit'),
        ];
    }
}


namespace App\Filament\Resources\HighLightResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\HighLightResource;

class CreateHighLight extends CreateRecord
{
    protected static string $resource = HighLightResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
     

    }
}

class EditHighLight extends EditRecord
{
    protected static string $resource = HighLightResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
