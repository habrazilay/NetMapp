<?php

/**
 * `SHOW` statement.
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
 * `SHOW` statement.
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
class ShowStatement extends NotImplementedStatement
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
        'CREATE'                        => 1,
        'AUTHORS'                       => 2,
        'BINARY'                        => 2,
        'BINLOG'                        => 2,
        'CHARACTER'                     => 2,
        'CODE'                          => 2,
        'COLLATION'                     => 2,
        'COLUMNS'                       => 2,
        'CONTRIBUTORS'                  => 2,
        'DATABASE'                      => 2,
        'DATABASES'                     => 2,
        'ENGINE'                        => 2,
        'ENGINES'                       => 2,
        'ERRORS'                        => 2,
        'EVENT'                         => 2,
        'EVENTS'                        => 2,
        'FUNCTION'                      => 2,
        'GRANTS'                        => 2,
        'HOSTS'                         => 2,
        'INDEX'                         => 2,
        'INNODB'                        => 2,
        'LOGS'                          => 2,
        'MASTER'                        => 2,
        'OPEN'                          => 2,
        'PLUGINS'                       => 2,
        'PRIVILEGES'                    => 2,
        'PROCEDURE'                     => 2,
        'PROCESSLIST'                   => 2,
        'PROFILE'                       => 2,
        'PROFILES'                      => 2,
        'SCHEDULER'                     => 2,
        'SET'                           => 2,
        'SLAVE'                         => 2,
        'STATUS'                        => 2,
        'TABLE'                         => 2,
        'TABLES'                        => 2,
        'TRIGGER'                       => 2,
        'TRIGGERS'                      => 2,
        'VARIABLES'                     => 2,
        'VIEW'                          => 2,
        'WARNINGS'                      => 2,
=======
        'CREATE' => 1,
        'AUTHORS' => 2,
        'BINARY' => 2,
        'BINLOG' => 2,
        'CHARACTER' => 2,
        'CODE' => 2,
        'COLLATION' => 2,
        'COLUMNS' => 2,
        'CONTRIBUTORS' => 2,
        'DATABASE' => 2,
        'DATABASES' => 2,
        'ENGINE' => 2,
        'ENGINES' => 2,
        'ERRORS' => 2,
        'EVENT' => 2,
        'EVENTS' => 2,
        'FUNCTION' => 2,
        'GRANTS' => 2,
        'HOSTS' => 2,
        'INDEX' => 2,
        'INNODB' => 2,
        'LOGS' => 2,
        'MASTER' => 2,
        'OPEN' => 2,
        'PLUGINS' => 2,
        'PRIVILEGES' => 2,
        'PROCEDURE' => 2,
        'PROCESSLIST' => 2,
        'PROFILE' => 2,
        'PROFILES' => 2,
        'SCHEDULER' => 2,
        'SET' => 2,
        'SLAVE' => 2,
        'STATUS' => 2,
        'TABLE' => 2,
        'TABLES' => 2,
        'TRIGGER' => 2,
        'TRIGGERS' => 2,
        'VARIABLES' => 2,
        'VIEW' => 2,
        'WARNINGS' => 2,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );
}
