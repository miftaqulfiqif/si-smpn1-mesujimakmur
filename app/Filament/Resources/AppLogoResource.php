<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppLogoResource\Pages;
use App\Filament\Resources\AppLogoResource\RelationManagers;
use App\Models\AppLogo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AppLogoResource extends Resource
{
    protected static ?string $model = AppLogo::class;

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_url')
                    ->columnSpanFull()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => 'app-logo.' . $file->getExtension(),
                    )
                    ->required(),
                Forms\Components\TextInput::make('alt_text'),
                Forms\Components\Select::make('type')
                    ->options([
                        'favicon' => 'Favicon',
                        'logo' => 'Logo',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('editor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('alt_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAppLogos::route('/'),
            'create' => Pages\CreateAppLogo::route('/create'),
            'view' => Pages\ViewAppLogo::route('/{record}'),
            'edit' => Pages\EditAppLogo::route('/{record}/edit'),
        ];
    }
}
