<?php

/**
 * `ANALYZE` statement.
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
 * `ANALYZE` statement.
 *
 * ANALYZE [NO_WRITE_TO_BINLOG | LOCAL] TABLE
 *  tbl_name [, tbl_name] ...
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
class AnalyzeStatement extends Statement
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

        'TABLE'                         => 1,

        'NO_WRITE_TO_BINLOG'            => 2,
        'LOCAL'                         => 3,
=======
        'TABLE' => 1,

        'NO_WRITE_TO_BINLOG' => 2,
        'LOCAL' => 3,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * Analyzed tables.
     *
     * @var Expression[]
     */
    public $tables;
}
