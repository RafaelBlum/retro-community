<?php

namespace App\Filament\Resources;

use App\Enums\StatusArticleEnum;
use App\Filament\Clusters\Blog;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $activeNavigationIcon = 'heroicon-o-book-open';

    protected static ?string $pluralModelLabel = "Blog";
    protected static ?string $modelLabel = "Post";

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = Blog::class;
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
                                TextInput::make('slug')
                                    ->maxLength(255)
                                    ->visible(false)
                                    ->disabled()
                                    ->dehydrated()
                                    ->unique(ignoreRecord: true),
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

                Tabs::make('Create article')->tabs([

                    Tab::make('Configurações')->icon('heroicon-m-inbox')->schema([
                        Grid::make(8)->schema([
                            Group::make()->schema([


                            ])->columnSpan(2),

                            Group::make()->schema([
                                Select::make('category_id')
                                    ->label('Categoria')
                                    ->searchable()
                                    ->preload()
                                    ->reactive()
                                    ->distinct()
                                    ->relationship('category', 'name'),
                            ])->columnSpan(2),

                            Group::make()->schema([
                                Select::make('status')
                                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Selecione o status do seu artigo.')
                                    ->hintColor('primary')
                                    ->default('draft')
                                    ->options(StatusArticleEnum::class)
                                    ->live()
                                    ->required(),

                            ])->columnSpan(2),

                            Group::make()->schema([
                                DatePicker::make('published_at')->hidden(fn(Get $get) => $get('status') !== 'published_at')
                                    ->displayFormat(function () {
                                        return 'd/m/Y';
                                    })->columnSpanFull(),

                                DatePicker::make('scheduled_for')->hidden(fn(Get $get) => $get('status') !== 'scheduled_for')
                                    ->displayFormat(function () {
                                        return 'd/m/Y';
                                    }),
                            ])->columnSpan(2),
                        ]),


                    ])->columns(3),

                    Tab::make('Conteúdo descritivo')
                        ->icon('heroicon-m-inbox')
                        ->schema([
                            TextInput::make('subTitle')->label('Sub Titulo')
                                ->maxLength(255)
                                ->required(),

                            Textarea::make('summary')->label('Resumo')
                                ->maxLength(255)
                                ->required(),

                            RichEditor::make('content')
                                ->toolbarButtons([
                                    'attachFiles',
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'h1',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'underline',
                                    'undo',
                                ])
                                ->maxLength(65535)
                                ->columnSpanFull(),
                        ])
                ])->columnSpanFull()->activeTab(1)->persistTabInQueryString(),

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
                    ->size(60)
                    ->label(''),

                TextColumn::make('title')
                    ->label('Titulo')
                    ->limit(20)
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Categoria'),

                TextColumn::make('author.name')
                    ->label('Autor'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),

                TextColumn::make('views'),

                TextColumn::make('')
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

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewPost::class,
            Pages\EditPost::class,
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
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
