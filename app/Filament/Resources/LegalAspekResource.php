<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalAspekResource\Pages;
use App\Filament\Resources\LegalAspekResource\RelationManagers;
use App\Models\LegalAspek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LegalAspekResource extends Resource
{
    protected static ?string $model = LegalAspek::class;

    protected static ?string $navigationLabel = 'Legal Aspek';

    protected static ?string $modelLabel = 'Legal Aspek';

    protected static ?string $pluralLabel = 'Legal Aspek';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function query()
    // {
    //     $query = parent::query();

    //     if (!Auth::user()->is_admin) {
    //         // Hanya tampilkan postingan milik pengguna jika bukan admin
    //         $query->where('user_id', Auth::id());
    //     }

    //     return $query;
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relasi')
                    ->schema([
                        // Forms\Components\FileUpload::make('sk')
                        //     ->label('SK')
                        //     ->acceptedFileTypes(['application/pdf'])
                        //     ->multiple()
                        //     ->disk('public')
                        //     ->directory('legal-aspek')
                        //     ->visibility('public')
                        //     ->required(),
                        Forms\Components\TextInput::make('sk')
                            ->label('Catatan')
                            ->maxLength(65535),

                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->maxLength(65535),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->searchable(),
                Tables\Columns\TextColumn::make('sk')
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $userId = Auth::id();
                // Asumsikan bahwa pengguna memiliki metode atau properti untuk mendapatkan role
                $roles = Auth::user()->roles->pluck('name'); // Atau metode lain jika berbeda
                $roleNames = $roles->implode(', ');
                if ($roleNames=='super_admin'){
                    return $query;
                }else{
                    return $query->where('user_id', $userId);
                }

            });
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    // protected static function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()->where('user_id', Auth::id());
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLegalAspeks::route('/'),
            'create' => Pages\CreateLegalAspek::route('/create'),
            'edit' => Pages\EditLegalAspek::route('/{record}/edit'),
        ];
    }
}
