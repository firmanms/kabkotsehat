<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterTatananResource\Pages;
use App\Filament\Resources\MasterTatananResource\RelationManagers;
use App\Models\MasterTatanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterTatananResource extends Resource
{
    protected static ?string $model = MasterTatanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function shouldRegisterNavigation(): bool
    // {
    //     if (auth()->user()->can('master-tatanans')) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //     // return (auth()->user()->can('mastertatanan.index'))
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),
                Forms\Components\Textarea::make('catatan')
                ->label('Catatan')
                ->maxLength(65535)
                ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('catatan')
                ->searchable(),
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
            'index' => Pages\ListMasterTatanans::route('/'),
            'create' => Pages\CreateMasterTatanan::route('/create'),
            'edit' => Pages\EditMasterTatanan::route('/{record}/edit'),
        ];
    }
}
