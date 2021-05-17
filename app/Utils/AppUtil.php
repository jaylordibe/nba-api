<?php


namespace App\Utils;


use App\Constants\StatusConstant;
use Illuminate\Support\Carbon;

class AppUtil {

    /**
     * Generate new value for the deleted database item using laravel's soft delete.
     * @param string $value
     * @return string
     */
    public static function generateDeletedDBItemValue(string $value) {
        return StatusConstant::DELETED . '_' . Carbon::now()->getTimestamp() . '_' . $value;
    }
}
