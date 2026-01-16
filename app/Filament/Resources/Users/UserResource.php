<?php

namespace App\Filament\Resources\Users;

use App\Enums\PanelTypeEnum;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'usuarios';

    protected static ?string $modelLabel = "Usuários";

    protected static ?int $navigationSort = 1;
//    protected static ?string $navigationBadgeTooltip = 'Total usuários';

    protected static string | \UnitEnum | null $navigationGroup = 'Streamers';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    /**
     * Description method:
     * Condição para não trazer o usuário logado
     * Exclui todos usuários do tipo "super-admin"
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('id', '!=', auth()->id())
            ->where('panel', '!=', PanelTypeEnum::SUPER_ADMIN);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->where('panel', '!=', 'super-admin')->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return (int) static::getNavigationBadge() > 10 ? 'warning' : 'success';
    }
}
