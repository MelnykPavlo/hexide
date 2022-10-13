<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    protected string $field;

    public function translate($originField)
    {
        $locale = App::getLocale();
        if ($locale === "UA")
            $this->field = $originField . "_ua";
        else
            $this->field = $originField;
        return $this->field;
    }
}
