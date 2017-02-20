<?php

/**
 * Exception thrown by the lexer.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Exceptions
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Exceptions;

/**
 * Exception thrown by the lexer.
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
class LexerException extends \Exception
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The character that produced this error.
     *
     * @var string
     */
    public $ch;

    /**
     * The index of the character that produced this error.
     *
     * @var int
     */
    public $pos;

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string $msg  The message of this exception.
     * @param string $ch   The character that produced this exception.
     * @param int    $pos  The position of the character.
     * @param int    $code The code of this error.
=======
     * @param string $msg  the message of this exception
     * @param string $ch   the character that produced this exception
     * @param int    $pos  the position of the character
     * @param int    $code the code of this error
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct($msg = '', $ch = '', $pos = 0, $code = 0)
    {
        parent::__construct($msg, $code);
        $this->ch = $ch;
        $this->pos = $pos;
    }
}
