<?php

/**
 * Exception thrown by the parser.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Exceptions
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Exceptions;

use SqlParser\Token;

/**
 * Exception thrown by the parser.
 *
 * @category   Exceptions
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Exceptions
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class ParserException extends \Exception
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The token that produced this error.
     *
     * @var Token
     */
    public $token;

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string $msg   The message of this exception.
     * @param Token  $token The token that produced this exception.
     * @param int    $code  The code of this error.
=======
     * @param string $msg   the message of this exception
     * @param Token  $token the token that produced this exception
     * @param int    $code  the code of this error
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct($msg = '', Token $token = null, $code = 0)
    {
        parent::__construct($msg, $code);
        $this->token = $token;
    }
}
