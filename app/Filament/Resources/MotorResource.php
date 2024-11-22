<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotorResource\Pages;
use App\Models\Motor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MotorResource extends Resource
{
    protected static ?string $model = Motor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Servis Motor';
    protected static ?string $pluralModelLabel = 'Data Servis Motor';
    protected static ?string $navigationLabel = 'Servis Motor';
    protected static ?string $breadcrumb = 'Servis Motor';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('plat_motor')
                    ->required()
                    ->maxLength(255),
                TextInput::make('tipe_motor')
                    ->required()
                    ->maxLength(255),
                TextInput::make('merk_motor')
                    ->required()
                    ->maxLength(255),
                Textarea::make('desc_kerusakan')
                    ->required(),
                FileUpload::make('foto_motor')
                    ->image()
                    ->directory('motors')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plat_motor'),
                Tables\Columns\TextColumn::make('tipe_motor'),
                Tables\Columns\TextColumn::make('merk_motor'),
                Tables\Columns\TextColumn::make('desc_kerusakan')
                    ->limit(50),
                Tables\Columns\ImageColumn::make('foto_motor'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMotors::route('/'),
            'create' => Pages\CreateMotor::route('/create'),
            'edit' => Pages\EditMotor::route('/{record}/edit'),
        ];
    }
}
