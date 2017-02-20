<?php

/**
 * `CALL` statement.
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
use SqlParser\Components\FunctionCall;

/**
 * `CALL` statement.
 *
 * CALL sp_name([parameter[,...]])
 *
 * or
 *
 * CALL sp_name[()]
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
class CallStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The name of the function and its parameters.
     *
     * @var FunctionCall
     */
    public $call;
}
