<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsFakeResource\Pages;
use App\Filament\Resources\NewsFakeResource\RelationManagers;
use App\Models\NewsFake;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsFakeResource extends Resource
{
    protected static ?string $model = NewsFake::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'title'),
                Forms\Components\TextInput::make(name: 'image'),
                Forms\Components\Textarea::make(name: 'body'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'title'),
                Tables\Columns\TextColumn::make(name: 'image'),
                Tables\Columns\TextColumn::make(name: 'body'),
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
            'index' => Pages\ListNewsFakes::route('/'),
            'create' => Pages\CreateNewsFake::route('/create'),
            'edit' => Pages\EditNewsFake::route('/{record}/edit'),
        ];
    }
}


namespace App\Filament\Resources\NewsFakeResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\NewsFakeResource;

class CreateNewsFake extends CreateRecord
{
    protected static string $resource = NewsFakeResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
     

    }
}

class EditNewsFake extends EditRecord
{
    protected static string $resource = NewsFakeResource::class;

    protected function afterSave(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}