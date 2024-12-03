<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'type'];

    /**
     * Ayarı anahtar adı ile al.
     *
     * @param string $key
     * @return string|null
     */
    public static function getValue($key)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : null;
    }

    /**
     * Ayar değerini güncelle.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function setValue($key, $value)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->update(['value' => $value]);
        } else {
            self::create(['key' => $key, 'value' => $value]);
        }
    }
}
