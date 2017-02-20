<?php

/**
 * Table utilities.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Utils
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Utils;

use SqlParser\Statements\CreateStatement;

/**
 * Table utilities.
 *
 * @category   Statement
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Utils
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class Table
{
<<<<<<< HEAD

    /**
     * Gets the foreign keys of the table.
     *
     * @param CreateStatement $statement The statement to be processed.
=======
    /**
     * Gets the foreign keys of the table.
     *
     * @param CreateStatement $statement the statement to be processed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getForeignKeys($statement)
    {
        if ((empty($statement->fields))
            || (!is_array($statement->fields))
            || (!$statement->options->has('TABLE'))
        ) {
            return array();
        }

        $ret = array();

        foreach ($statement->fields as $field) {
            if ((empty($field->key)) || ($field->key->type !== 'FOREIGN KEY')) {
                continue;
            }

            $columns = array();
            foreach ($field->key->columns as $column) {
                $columns[] = $column['name'];
            }

            $tmp = array(
                'constraint' => $field->name,
                'index_list' => $columns,
            );

            if (!empty($field->references)) {
                $tmp['ref_db_name'] = $field->references->table->database;
                $tmp['ref_table_name'] = $field->references->table->table;
                $tmp['ref_index_list'] = $field->references->columns;

                if (($opt = $field->references->options->has('ON UPDATE'))) {
                    $tmp['on_update'] = str_replace(' ', '_', $opt);
                }

                if (($opt = $field->references->options->has('ON DELETE'))) {
                    $tmp['on_delete'] = str_replace(' ', '_', $opt);
                }

                // if (($opt = $field->references->options->has('MATCH'))) {
                //     $tmp['match'] = str_replace(' ', '_', $opt);
                // }
            }

            $ret[] = $tmp;
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        }

        return $ret;
    }

    /**
     * Gets fields of the table.
     *
<<<<<<< HEAD
     * @param CreateStatement $statement The statement to be processed.
=======
     * @param CreateStatement $statement the statement to be processed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getFields($statement)
    {
        if ((empty($statement->fields))
            || (!is_array($statement->fields))
            || (!$statement->options->has('TABLE'))
        ) {
            return array();
        }

        $ret = array();

        foreach ($statement->fields as $field) {
            // Skipping keys.
            if (empty($field->type)) {
                continue;
            }

            $ret[$field->name] = array(
                'type' => $field->type->name,
                'timestamp_not_null' => false,
            );

            if ($field->options) {
                if ($field->type->name === 'TIMESTAMP') {
                    if ($field->options->has('NOT NULL')) {
                        $ret[$field->name]['timestamp_not_null'] = true;
                    }
                }

                if (($option = $field->options->has('DEFAULT'))) {
                    $ret[$field->name]['default_value'] = $option;
                    if ($option === 'CURRENT_TIMESTAMP') {
                        $ret[$field->name]['default_current_timestamp'] = true;
                    }
                }

                if (($option = $field->options->has('ON UPDATE'))) {
                    if ($option === 'CURRENT_TIMESTAMP') {
                        $ret[$field->name]['on_update_current_timestamp'] = true;
                    }
                }

                if (($option = $field->options->has('AS'))) {
                    $ret[$field->name]['generated'] = true;
                    $ret[$field->name]['expr'] = $option;
                }
            }
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        }

        return $ret;
    }
}
