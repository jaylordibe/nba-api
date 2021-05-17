<?php


namespace App\Utils;


class DataTypeUtil {

    /**
     * Converts data to string.
     * @param $data - data to be converted
     * @return string
     */
    public static function toString($data): string {
        return (string) $data;
    }

    /**
     * Converts data to int.
     * @param $data - data to be converted
     * @return int
     */
    public static function toInt($data): int {
        return (int) $data;
    }

    /**
     * Converts data to float.
     * @param $data - data to be converted
     * @return float
     */
    public static function toFloat($data): float {
        return (float) $data;
    }

    /**
     * Converts data to array.
     * @param $data - data to be converted
     * @return array
     */
    public static function toArray($data): array {
        return (array) $data;
    }

    /**
     * Converts data to boolean.
     * @param $data
     * @return bool
     */
    public static function toBoolean($data): bool {
        return filter_var($data, FILTER_VALIDATE_BOOLEAN);
    }
}
