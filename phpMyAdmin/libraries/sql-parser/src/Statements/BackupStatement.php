<?php

/**
 * `BACKUP` statement.
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
 * `BACKUP` statement.
 *
 * BACKUP TABLE tbl_name [, tbl_name] ... TO '/path/to/backup/directory'
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
class BackupStatement extends MaintenanceStatement
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

        'TO'                            => array(4, 'var'),
=======
        'TABLE' => 1,

        'NO_WRITE_TO_BINLOG' => 2,
        'LOCAL' => 3,

        'TO' => array(4, 'var'),
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );
}
