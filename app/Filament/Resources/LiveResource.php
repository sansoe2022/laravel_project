<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LiveResource\Pages;
use App\Filament\Resources\LiveResource\RelationManagers;
use App\Models\Live;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LiveResource extends Resource
{
    protected static ?string $model = Live::class;

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
                Forms\Components\DateTimePicker::make('date_time')->required()
                ->label('Date and Time')
                ->displayFormat('F j, Y g:i A')
                ->withoutSeconds()
                ->default(now())
                ->required(),
                Forms\Components\Checkbox::make('is_live')->label('Is Live?'),
                Forms\Components\Repeater::make('links')
                ->relationship('links')
                ->schema([
                    Forms\Components\TextInput::make('reso')->required(),
                    Forms\Components\TextInput::make('link')->required(),
                    Forms\Components\TextInput::make('ref'),
                ])
                ->columns(3)
                ->label('Live Links'),
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
                Tables\Columns\IconColumn::make(name: 'is_live')->boolean(),
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
            'index' => Pages\ListLives::route('/'),
            'create' => Pages\CreateLive::route('/create'),
            'edit' => Pages\EditLive::route('/{record}/edit'),
        ];
    }
}


namespace App\Filament\Resources\LiveResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LiveResource;

class CreateLive extends CreateRecord
{
    protected static string $resource = LiveResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
     

    }
}

class EditLive extends EditRecord
{
    protected static string $resource = LiveResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
