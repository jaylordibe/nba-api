<?php


namespace App\Constants;


use ReflectionClass;
use ReflectionException;

class ConferenceConstant {

    const EASTERN_CONFERENCE = 'Eastern Conference';
    const WESTERN_CONFERENCE = 'Western Conference';

    /**
     * Get conference constant from string.
     * @param string $conference
     * @return string
     */
    public static function fromString(string $conference): string {
        $constants = self::asList();

        foreach ($constants as $constant) {
            if ($constant === $conference) {
                return $constant;
            }
        }

        return '';
    }

    /**
     * Get conference constants.
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
