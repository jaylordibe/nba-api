<?php


namespace App\Constants;


use ReflectionClass;
use ReflectionException;

class DatabaseTableConstant {

    const PASSWORD_RESETS = 'password_resets';
    const FAILED_JOBS = 'failed_jobs';
    const USERS = 'users';
    const TEAMS = 'teams';

    /**
     * @param string $table
     * @return string
     */
    public static function fromString(string $table): string {
        $constants = self::asList();

        foreach ($constants as $constant) {
            if ($constant === $table) {
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
