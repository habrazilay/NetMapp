<?php

/**
 * `DROP` statement.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Statements
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Statements;

use SqlParser\Statement;
use SqlParser\Components\Expression;

/**
 * `DROP` statement.
 *
 * @category   Statements
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Statements
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class DropStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Options of this statement.
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD

        'DATABASE'                      => 1,
        'EVENT'                         => 1,
        'FUNCTION'                      => 1,
        'INDEX'                         => 1,
        'LOGFILE'                       => 1,
        'PROCEDURE'                     => 1,
        'SCHEMA'                        => 1,
        'SERVER'                        => 1,
        'TABLE'                         => 1,
        'VIEW'                          => 1,
        'TABLESPACE'                    => 1,
        'TRIGGER'                       => 1,

        'TEMPORARY'                     => 2,
        'IF EXISTS'                     => 3,
=======
        'DATABASE' => 1,
        'EVENT' => 1,
        'FUNCTION' => 1,
        'INDEX' => 1,
        'LOGFILE' => 1,
        'PROCEDURE' => 1,
        'SCHEMA' => 1,
        'SERVER' => 1,
        'TABLE' => 1,
        'VIEW' => 1,
        'TABLESPACE' => 1,
        'TRIGGER' => 1,

        'TEMPORARY' => 2,
        'IF EXISTS' => 3,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * The clauses of this statement, in order.
     *
     * @see Statement::$CLAUSES
     *
     * @var array
     */
    public static $CLAUSES = array(
<<<<<<< HEAD
        'DROP'                          => array('DROP',        2),
        // Used for options.
        '_OPTIONS'                      => array('_OPTIONS',    1),
        // Used for select expressions.
        'DROP_'                         => array('DROP',        1),
        'ON'                            => array('ON',          3),
=======
        'DROP' => array('DROP',        2),
        // Used for options.
        '_OPTIONS' => array('_OPTIONS',    1),
        // Used for select expressions.
        'DROP_' => array('DROP',        1),
        'ON' => array('ON',          3),
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * Dropped elements.
     *
     * @var Expression[]
     */
    public $fields;

    /**
     * Table of the dropped index.
     *
     * @var Expression
     */
    public $table;
}
