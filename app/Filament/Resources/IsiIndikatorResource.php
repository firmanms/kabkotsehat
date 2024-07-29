<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IsiIndikatorResource\Pages;
use App\Filament\Resources\IsiIndikatorResource\RelationManagers;
use App\Models\PengaturanIndikator;
use App\Models\MasterJawabanIndikator;
use App\Models\MasterIndikator;
use App\Models\MasterTatanan;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class IsiIndikatorResource extends Resource
{
    protected static ?string $model = PengaturanIndikator::class;

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
                            ->live()
                            ->disabled()
                            ->afterStateUpdated(function (Set $set) {
                                $set('master_indikators_id', null);
                            })
                            ->required(),
                        Forms\Components\Select::make('master_indikators_id')
                            ->label('Indikator')
                            ->options(fn (Get $get): Collection => MasterIndikator::query()
                                ->where('master_tatanans_id', $get('master_tatanans_id'))
                                ->pluck('pertanyaan', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->disabled()
                            ->afterStateUpdated(fn (Set $set) => $set('master_jawaban_indikators_id', null))
                            ->required(),
                        Forms\Components\Select::make('master_jawaban_indikators_id')
                            ->label('Jawaban Indikator')
                            ->options(fn (Get $get): Collection => MasterJawabanIndikator::query()
                                ->where('master_indikators_id', $get('master_indikators_id'))
                                ->pluck('jawaban', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Filter::make('pengisi_id')
                    ->query(fn (Builder $query) => $query->where('pengisi_id', auth()->id()))
                    ->default(),
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
            'index' => Pages\ListIsiIndikators::route('/'),
            'create' => Pages\CreateIsiIndikator::route('/create'),
            'edit' => Pages\EditIsiIndikator::route('/{record}/edit'),
        ];
    }


}
