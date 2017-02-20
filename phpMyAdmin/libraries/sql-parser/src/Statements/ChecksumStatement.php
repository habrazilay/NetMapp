<?php

/**
 * `CHECKSUM` statement.
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
 * `CHECKSUM` statement.
 *
 * CHECKSUM TABLE tbl_name [, tbl_name] ... [ QUICK | EXTENDED ]
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
class ChecksumStatement extends MaintenanceStatement
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

        'QUICK'                         => 2,
        'EXTENDED'                      => 3,
=======
        'TABLE' => 1,

        'QUICK' => 2,
        'EXTENDED' => 3,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );
}
