<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('isbn')->required()->unique(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('year')->required(),
                Forms\Components\Select::make('field_id')
                    ->relationship('field', 'discipline')->required(),
                Forms\Components\Select::make('hall_id')
                    ->relationship('hall', 'name')->required(),
                Forms\Components\TextInput::make('author')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('isbn'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('field.discipline'),
                Tables\Columns\TextColumn::make('hall.name'),
                Tables\Columns\TextColumn::make('author'),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
