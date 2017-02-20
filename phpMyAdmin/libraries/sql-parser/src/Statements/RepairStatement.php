<?php

/**
 * `REPAIR` statement.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Statements
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Statements;

/**
 * `REPAIR` statement.
 *
 * REPAIR [NO_WRITE_TO_BINLOG | LOCAL] TABLE
 *  tbl_name [, tbl_name] ...
 *  [QUICK] [EXTENDED] [USE_FRM]
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
class RepairStatement extends MaintenanceStatement
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

        'QUICK'                         => 4,
        'EXTENDED'                      => 5,
        'USE_FRM'                       => 6,
=======
        'TABLE' => 1,

        'NO_WRITE_TO_BINLOG' => 2,
        'LOCAL' => 3,

        'QUICK' => 4,
        'EXTENDED' => 5,
        'USE_FRM' => 6,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );
}
