<?php


namespace App\Constants;


use ReflectionClass;
use ReflectionException;

class StatusConstant {

    const ACTIVE = 'Active';
    const PENDING = 'Pending';
    const DEACTIVATED = 'Deactivated';
    const DELETED = 'Deleted';

    /**
     * @param string $status
     * @return string
     */
    public static function fromString(string $status): string {
        $constants = self::asList();

        foreach ($constants as $constant) {
            if ($constant === $status) {
                return $constant;
            }
        }

        return '';
    }

    /**
     * @return array
     */
    public static function asList(): array {
        try {
            $reflectionClass = new ReflectionClass(__CLASS__);
        } catch (ReflectionException $e) {
            return [];
        }

        $constants = $reflectionClass->getConstants();
        $constantValues = [];

        foreach ($constants as $constant) {
            $constantValues[] = $constant;
        }

        return $constantValues;
    }
}
