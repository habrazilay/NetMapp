<?php

/**
 * `RENAME` statement.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Statements
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Statements;

use SqlParser\Parser;
use SqlParser\Statement;
use SqlParser\Token;
use SqlParser\TokensList;
use SqlParser\Components\RenameOperation;

/**
 * `RENAME` statement.
 *
 * RENAME TABLE tbl_name TO new_tbl_name
 *  [, tbl_name2 TO new_tbl_name2] ...
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
class RenameStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The old and new names of the tables.
     *
     * @var RenameOperation[]
     */
    public $renames;

    /**
     * Function called before the token is processed.
     *
     * Skips the `TABLE` keyword after `RENAME`.
     *
<<<<<<< HEAD
     * @param Parser     $parser The instance that requests parsing.
     * @param TokensList $list   The list of tokens to be parsed.
     * @param Token      $token  The token that is being parsed.
     *
     * @return void
=======
     * @param Parser     $parser the instance that requests parsing
     * @param TokensList $list   the list of tokens to be parsed
     * @param Token      $token  the token that is being parsed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function before(Parser $parser, TokensList $list, Token $token)
    {
        if (($token->type === Token::TYPE_KEYWORD) && ($token->value === 'RENAME')) {
            // Checking if it is the beginning of the query.
            $list->getNextOfTypeAndValue(Token::TYPE_KEYWORD, 'TABLE');
        }
    }
}
