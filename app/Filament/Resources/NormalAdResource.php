<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NormalAdResource\Pages;
use App\Models\NormalAd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NormalAdResource extends Resource
{
    protected static ?string $model = NormalAd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'home_img'),
                Forms\Components\TextInput::make(name: 'home_link'),

                Forms\Components\TextInput::make(name: 'first_home_img'),


                Forms\Components\Checkbox::make('on_off')->label('Is Open?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'home_img'),
                Tables\Columns\TextColumn::make(name: 'home_link'),


                Tables\Columns\TextColumn::make(name: 'first_home_img'),


                Tables\Columns\IconColumn::make(name: 'on_off')->boolean(),
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
            'index' => Pages\ListNormalAds::route('/'),
            'create' => Pages\CreateNormalAd::route('/create'),
            'edit' => Pages\EditNormalAd::route('/{record}/edit'),
        ];
    }
}


namespace App\Filament\Resources\NormalAdResource\Pages;

use App\Filament\Resources\NormalAdResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class CreateNormalAd extends CreateRecord
{
    protected static string $resource = NormalAdResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}

class EditNormalAd extends EditRecord
{
    protected static string $resource = NormalAdResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
