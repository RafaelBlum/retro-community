<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\Blog;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $activeNavigationIcon = 'heroicon-o-book-open';

    protected static ?string $pluralModelLabel = "Blog";
    protected static ?string $modelLabel = "Post";

    //protected static ?string $cluster = Blog::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(3)->schema([

                    Section::make()->schema([
                        FileUpload::make('featured_image_url')
                            ->label('Imagem do artigo')
                            ->required()
                            ->disk('public')
                            ->directory('image_posts')
                            ->columnSpanFull(),

                    ])->columnSpan(1),

                    Section::make()->schema([
                        Grid::make(4)->schema([
                            Group::make()->schema([
                                TextInput::make('title')
                                    ->label('Título do artigo')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(debounce: '1000')
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
//                                    TextInput::make('slug')
//                                        ->maxLength(255)
//                                        ->disabled()
//                                        ->dehydrated()
//                                        ->unique(ignoreRecord: true),
                            ])->columnSpan(4),
                        ]),

                        Grid::make(4)->schema([
                            Group::make()->schema([


                            ])->columnSpan(2),

                            Group::make()->schema([

                            ])->columnSpan(2),
                        ]),

                        Grid::make(11)->schema([
                            Group::make()->schema([


                            ])->columnSpan(1),

                            Group::make()->schema([

                            ])->columnSpan(5),

                            Group::make()->schema([

                            ])->columnSpan(5),
                        ]),

                    ])->columnSpan(2),
                ]),


            ])->columns([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                'lg' => 2,
                'xl' => 2,
                '2xl' => 2
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image_url')
                    ->square()
                    ->defaultImageUrl(url('storage/app/public/image_posts'))
                    ->size(60)
                    ->label(''),

                TextColumn::make('title')
                    ->label('Titulo')
                    ->limit(20)
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
