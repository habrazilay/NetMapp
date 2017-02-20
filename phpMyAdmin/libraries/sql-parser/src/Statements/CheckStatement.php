<?php

/**
 * `CHECK` statement.
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
 * `CHECK` statement.
 *
 * CHECK TABLE tbl_name [, tbl_name] ... [option] ...
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
class CheckStatement extends MaintenanceStatement
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

        'FOR UPGRADE'                   => 2,
        'QUICK'                         => 3,
        'FAST'                          => 4,
        'MEDIUM'                        => 5,
        'EXTENDED'                      => 6,
        'CHANGED'                       => 7,
=======
        'TABLE' => 1,

        'FOR UPGRADE' => 2,
        'QUICK' => 3,
        'FAST' => 4,
        'MEDIUM' => 5,
        'EXTENDED' => 6,
        'CHANGED' => 7,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );
}
