<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TvChannelResource\Pages;
use App\Models\TvChannel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TvChannelResource extends Resource
{
    protected static ?string $model = TvChannel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'name')->required(),
                Forms\Components\TextInput::make(name: 'image')->required(),
                Forms\Components\TextInput::make(name: 'link')->required(),
                Forms\Components\TextInput::make(name: 'ref'),
                Forms\Components\DateTimePicker::make('date_time')->required()
                    ->label('Date and Time')
                    ->displayFormat('F j, Y g:i A')
                    ->withoutSeconds()
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'name'),
                Tables\Columns\TextColumn::make(name: 'image'),
                Tables\Columns\TextColumn::make(name: 'link'),
                Tables\Columns\TextColumn::make(name: 'ref'),
                Tables\Columns\TextColumn::make(name: 'date_time'),
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
            'index' => Pages\ListTvChannels::route('/'),
            'create' => Pages\CreateTvChannel::route('/create'),
            'edit' => Pages\EditTvChannel::route('/{record}/edit'),
        ];
    }
}

namespace App\Filament\Resources\TvChannelResource\Pages;

use App\Filament\Resources\TvChannelResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class CreateTvChannel extends CreateRecord
{
    protected static string $resource = TvChannelResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));

    }
}

class EditTvChannel extends EditRecord
{
    protected static string $resource = TvChannelResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
