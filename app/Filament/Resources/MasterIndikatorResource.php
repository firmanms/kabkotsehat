<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterIndikatorResource\Pages;
use App\Filament\Resources\MasterIndikatorResource\RelationManagers;
use App\Models\MasterIndikator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterIndikatorResource extends Resource
{
    protected static ?string $model = MasterIndikator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('master_tatanans_id')
                    ->label('Tatanan')
                    ->relationship('masterTatanan', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('pertanyaan')
                    ->label('Pertanyaan')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                    Forms\Components\Select::make('jenis')
                    ->options([
                        'Pokok' => 'Pokok',
                        'Pendukung' => 'Pendukung',
                    ])
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('detail')
                    ->label('Detail')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('sumberdata')
                    ->label('Sumber Data')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('dokumenpendukung')
                    ->label('Dokumen Pendukung')
                    ->maxLength(65535)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('masterTatanan.name')
                    ->label('Master Tatanan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pertanyaan')->limit(50)
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('detail')
                    ->sortable()
                    ->searchable()
                    ->html()
                    ->limit(50)
                    ->tooltip(fn ($record) => strip_tags($record->detail)),
                Tables\Columns\TextColumn::make('sumberdata')
                    ->sortable()
                    ->searchable()
                    ->html()
                    ->limit(50)
                    ->tooltip(fn ($record) => strip_tags($record->sumberdata)),
                Tables\Columns\TextColumn::make('dokumenpendukung')
                    ->sortable()
                    ->searchable()
                    ->html()
                    ->limit(50)
                    ->tooltip(fn ($record) => strip_tags($record->dokumenpendukung)),
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
            'index' => Pages\ListMasterIndikators::route('/'),
            'create' => Pages\CreateMasterIndikator::route('/create'),
            'edit' => Pages\EditMasterIndikator::route('/{record}/edit'),
        ];
    }
}
