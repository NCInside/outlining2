<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Tables\Columns\CustomImage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('bg')
                ->directory('projectbg')
                ->image()
                ->required(),
                FileUpload::make('photo')
                ->directory('projectphoto')
                ->image()
                ->required(),
                FileUpload::make('profile')
                ->directory('projectprofile')
                ->image()
                ->required(),
                FileUpload::make('qr')
                ->directory('projectqr')
                ->image()
                ->required(),
                TextInput::make('title')
                ->maxLength(255)
                ->required(),
                Textarea::make('description')
                ->cols(6)
                ->rows(3)
                ->required(),
                TextInput::make('name')
                ->maxLength(255)
                ->required(),
                TextInput::make('nim')
                ->maxLength(255)
                ->required(),
                TextInput::make('ig')
                ->maxLength(255)
                ->required(),
                TextInput::make('wa')
                ->maxLength(255)
                ->required(),
                TextInput::make('video')
                ->maxLength(255)
                ->required(),
                TextInput::make('qrlink')
                ->maxLength(255)
                ->required(),
                Toggle::make('highlight'),
                Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('name'),
                TextColumn::make('nim'),
                CustomImage::make('bg'),
                CustomImage::make('photo'),
                CustomImage::make('profile'),
                TextColumn::make('category.name'),
                ToggleColumn::make('highlight'),
            ])
            ->filters([
                SelectFilter::make('category_id')->relationship('category', 'name'),
                Filter::make('highlight')->toggle()
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                DeleteBulkAction::make()
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    
}
