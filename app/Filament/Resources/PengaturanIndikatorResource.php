<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanIndikatorResource\Pages;
use App\Filament\Resources\PengaturanIndikatorResource\RelationManagers;
use App\Models\PengaturanIndikator;
use App\Models\MasterJawabanIndikator;
use App\Models\MasterIndikator;
use App\Models\MasterTatanan;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PengaturanIndikatorResource extends Resource
{
    protected static ?string $model = PengaturanIndikator::class;

    protected static ?string $navigationLabel = 'Isi Indikator';

    protected static ?string $modelLabel = 'Isi Indikator';

    protected static ?string $pluralLabel = 'Isi Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relasi')
                    ->schema([
                        Forms\Components\Select::make('master_tatanans_id')
                            ->label('Tatanan')
                            ->relationship('masterTatanan', 'name')
                            ->searchable()
                            ->disabled(fn ($record) => $record ? $record->exists : false) // Menandai sebagai disabled jika record ada
                            ->preload()
                            ->live()
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
                            ->disabled(fn ($record) => $record ? $record->exists : false) // Menandai sebagai disabled jika record ada
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('master_jawaban_indikators_id', null))
                            ->required(),
                        Forms\Components\Select::make('master_jawaban_indikators_id')
                            ->label('Jawaban Indikator')
                            ->options(fn (Get $get): Collection => MasterJawabanIndikator::query()
                                ->where('master_indikators_id', $get('master_indikators_id'))
                                ->pluck('jawaban', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                    Forms\Components\Select::make('pengisi_id')
                        ->label('Pengisi')
                        ->relationship('pengisi', 'name')
                        ->searchable()
                        ->disabled(fn ($record) => $record ? $record->exists : false) // Menandai sebagai disabled jika record ada
                        ->preload()
                        ->required(),
                    Forms\Components\Select::make('koordinator_id')
                        ->label('Koordinator')
                        ->relationship('koordinator', 'name')
                        ->searchable()
                        ->disabled(fn ($record) => $record ? $record->exists : false) // Menandai sebagai disabled jika record ada
                        ->preload()
                        ->required(),
                    ]),
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
                Tables\Columns\TextColumn::make('masterIndikator.pertanyaan')
                    ->label('Indikator')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengisi.name')
                    ->label('Pengisi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('koordinator.name')
                    ->label('Koordinator')
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $userId = Auth::id();
                // Asumsikan bahwa pengguna memiliki metode atau properti untuk mendapatkan role
                $roles = Auth::user()->roles->pluck('name'); // Atau metode lain jika berbeda
                $roleNames = $roles->implode(', ');
                if ($roleNames=='super_admin'){
                    return $query;
                }else{
                return $query->where('pengisi_id', $userId)->orWhere('koordinator_id', $userId);
                }
            });
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
            'index' => Pages\ListPengaturanIndikators::route('/'),
            'create' => Pages\CreatePengaturanIndikator::route('/create'),
            'edit' => Pages\EditPengaturanIndikator::route('/{record}/edit'),
        ];
    }
    protected static function getTableQuery(): Builder
    {
        dd(parent::getTableQuery()->where('status', 'published')->toSql());
    }
}
