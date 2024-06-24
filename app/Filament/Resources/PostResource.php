<?php

namespace App\Filament\Resources;

use App\Enums\StatusPostEnum;
use App\Filament\Clusters\Blog;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Actions;
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
use Filament\Notifications\Notification;
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

    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = Blog::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(3)->schema([

                    Section::make()->schema([
                        FileUpload::make('featured_image_url')
                            ->default('default-post.jpg')
                            ->label('Imagem da postagem')
                            ->required()
                            ->disk('public')
                            ->directory('image_posts')
                            ->columnSpanFull(),

                    ])->columnSpan(1),

                    Section::make()->schema([
                        Grid::make(4)->schema([
                            Group::make()->schema([
                                TextInput::make('title')
                                    ->label('Título da postagem')
                                    ->required()
                                    ->maxLength(255)

                            ])->columnSpan(4),
                        ]),

                        Grid::make(4)->schema([
                            Group::make()->schema([
                                DatePicker::make('scheduled_for')
                                    ->label('Data programada da postagem')
                                    ->hidden(fn(Get $get) => $get('status') !== 'SCHEDULED')
                                    ->displayFormat(function () {
                                        return 'd/m/Y';
                                    })
                                    ->required(),

                            ])->columnSpan(2),
//
//                            Group::make()->schema([
//
//                            ])->columnSpan(2),
                        ]),

//                        Grid::make(11)->schema([
//                            Group::make()->schema([
//
//
//                            ])->columnSpan(1),
//
//                            Group::make()->schema([
//
//                            ])->columnSpan(5),
//
//                            Group::make()->schema([
//
//                            ])->columnSpan(5),
//                        ]),

                    ])->columnSpan(2),
                ]),

                Tabs::make('Create article')->tabs([

                    Tab::make('Configurações')->icon('heroicon-m-inbox')->schema([
                        Grid::make(8)->schema([


                            Group::make()->schema([
                                Select::make('category_id')
                                    ->label('Categoria')
                                    ->searchable()
                                    ->preload()
                                    ->reactive()
                                    ->distinct()
                                    ->required()
                                    ->relationship('category', 'name'),
                            ])->columnSpan(2),

                            Group::make()->schema([
                                Select::make('status')
                                    ->label('Status da postagem')
                                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Selecione o status do seu artigo.')
                                    ->hintColor('primary')
                                    ->options(StatusPostEnum::class)
                                    ->live()
                                    ->required(),

                            ])->columnSpan(6),

                            Group::make()->schema([

                            ])->columnSpan(2),
                        ]),


                    ])->columns(3),

                    Tab::make('Conteúdo descritivo')
                        ->icon('heroicon-m-inbox')
                        ->schema([
                            TextInput::make('subTitle')->label('Sub Titulo')
                                ->label('Sub Titulo')
                                ->maxLength(255)
                                ->required(),

                            Textarea::make('summary')
                                ->label('Resumo')
                                ->maxLength(255)
                                ->required(),

                            RichEditor::make('content')
                                ->label('Conteúdo')
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
                                ->required()
                                ->columnSpanFull(),
                        ]),

            ])->columnSpanFull()->activeTab(1)->persistTabInQueryString()

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
                Tables\Actions\ActionGroup::make([
                    DeleteAction::make()
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('User deleted')
                                ->body('The user has been deleted successfully.'),
                        )
                        ->before(function () {
                            dd('action aqui');
                        }),
                    Tables\Actions\EditAction::make()->slideOver(),
                    Tables\Actions\DeleteAction::make()
                        ->action(function(Post $record) {
                            if($record->featured_image_url != 'default-post.jpg'){
                                Storage::delete('public/' . $record->featured_image_url);
                            }
                            $record->delete();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Deletar ' . static::$modelLabel)
                        ->modalDescription('Tem certeza de que deseja excluir este ' . static::$modelLabel . '? Isto não pode ser desfeito.')
                        ->modalSubmitActionLabel('Sim, deletar!'),
                ])->tooltip("Menu")
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Deletar todos selecionados')
                        ->action(function(Post $record) {
                            //... AJUSTAR
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Deletar ' . static::$modelLabel)
                        ->modalDescription('Tem certeza de que deseja excluir este ' . static::$modelLabel . '? Isto não pode ser desfeito.')
                        ->modalSubmitActionLabel('Sim, deletar!')
                        ->before(function (Post $record) {
                            //... AJUSTAR
                        }),
                ])->label('Deletar seleção'),
            ]);
    }

    protected function getActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function (Post $record) {


                    dd('sadmsadjnsalkj');

//                    if ($record->photo) {
//                        Storage::disk('public')->delete($record->photo);
//                    }
//                    // delete multiple
//                    if ($record->galery) {
//                        foreach ($record->galery as $ph) Storage::disk('public')->delete($ph);
//                    }
                })
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewPost::class,
            Pages\EditPost::class,
            Pages\ListPosts::class,
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() < 10 ? 'warning' : 'success';
    }
}
