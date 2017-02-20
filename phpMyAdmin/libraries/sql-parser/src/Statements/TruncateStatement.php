<?php

/**
 * `TRUNCATE` statement.
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
 * `TRUNCATE` statement.
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
class TruncateStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Options for `TRUNCATE` statements.
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD
        'TABLE'                         => 1,
=======
        'TABLE' => 1,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * The name of the truncated table.
     *
     * @var Expression
     */
    public $table;
}
