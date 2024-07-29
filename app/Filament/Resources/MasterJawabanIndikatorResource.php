<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterJawabanIndikatorResource\Pages;
use App\Filament\Resources\MasterJawabanIndikatorResource\RelationManagers;
use App\Models\MasterJawabanIndikator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterJawabanIndikatorResource extends Resource
{
    protected static ?string $model = MasterJawabanIndikator::class;

    protected static ?string $navigationLabel = 'Master Jawaban Indikator';

    protected static ?string $modelLabel = 'Master Jawaban Indikator';

    protected static ?string $pluralLabel = 'Master Jawaban Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('master_indikators_id')
                    ->label('Indikator')
                    ->relationship('masterIndikator', 'pertanyaan')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('jawaban')
                    ->label('Jawaban')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('score')
                    ->label('Score')
                    ->required()
                    ->numeric()
                    ->maxLength(3)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('masterIndikator.pertanyaan')
                    ->label('Pertanyaan Indikator')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jawaban')
                    ->label('Jawaban')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->label('Score')
                    ->sortable()
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
            'index' => Pages\ListMasterJawabanIndikators::route('/'),
            'create' => Pages\CreateMasterJawabanIndikator::route('/create'),
            'edit' => Pages\EditMasterJawabanIndikator::route('/{record}/edit'),
        ];
    }
}
