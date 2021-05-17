<?php


namespace App\Constants;


use ReflectionClass;
use ReflectionException;

class DivisionConstant {

    // Eastern Conference
    const ATLANTIC = 'Atlantic';
    const CENTRAL = 'Central';
    const SOUTHEAST = 'Southeast';

    // Western Conference
    const NORTHWEST = 'Northwest';
    const PACIFIC = 'Pacific';
    const SOUTHWEST = 'Southwest';

    /**
     * Get division constant from string.
     * @param string $division
     * @return string
     */
    public static function fromString(string $division): string {
        $constants = self::asList();

        foreach ($constants as $constant) {
            if ($constant === $division) {
                return $constant;
            }
        }

        return '';
    }

    /**
     * Find divisions by conference.
     * @param string $conference
     * @return array
     */
    public static function findByConference(string $conference): array {
        $conference = ConferenceConstant::fromString($conference);

        if (empty($conference)) {
            return [];
        }

        $divisions = [];

        switch ($conference) {
            case ConferenceConstant::EAST:
                $divisions = [self::ATLANTIC, self::CENTRAL, self::SOUTHEAST];
                break;
            case ConferenceConstant::WEST:
                $divisions = [self::NORTHWEST, self::PACIFIC, self::SOUTHWEST];
                break;
            default:
                $divisions = [];
        }

        return $divisions;
    }

    /**
     * Check if the specified division belongs to the specified conference and return the valid division.
     * If invalid, return empty string.
     * @param string $conference
     * @param string $division
     * @return string
     */
    public static function getValidDivision(string $conference, string $division): string {
        $divisions = self::findByConference($conference);

        if (empty($divisions)) {
            return '';
        }

        return in_array($division, $divisions, true) ? $division : '';
    }

    /**
     * Get division constants.
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
