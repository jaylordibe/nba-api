<?php


namespace App\Utils;


class RepositoryUtil {

    /**
     * Compose raw like sql query.
     * @param array $fields
     * @param string $search
     * @return string
     */
    public static function composeRawLikeSqlQuery(array $fields, string $search): string {
        $search = '"%' . $search . '%" ESCAPE "!"';
        $query = '';

        foreach ($fields as $field) {
            if (!empty($query)) {
                $query .= ' OR ';
            }

            $query .= ($field . ' LIKE ' . $search);
        }

        return '(' . $query . ')';
    }

    /**
     * Compose raw find in set sql query.
     * @param array $values
     * @param string $field
     * @return string
     */
    public static function composeRawFindInSetSqlQuery(array $values, string $field): string {
        $query = '';

        foreach ($values as $value) {
            if (!empty($query)) {
                $query .= ' OR ';
            }

            $query .= ('FIND_IN_SET("' . $value . '", ' . $field . ')');
        }

        return '(' . $query . ')';
    }
}
