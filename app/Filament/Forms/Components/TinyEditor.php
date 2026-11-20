<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class TinyEditor extends Field
{
    protected string $view = 'filament.forms.components.tinymce-editor';

    protected int $minHeight = 480;

    public function minHeight(int $height): static
    {
        $this->minHeight = $height;

        return $this;
    }

    public function getMinHeight(): int
    {
        return $this->minHeight;
    }
}
