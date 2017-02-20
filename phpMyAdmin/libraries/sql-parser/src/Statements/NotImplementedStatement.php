<?php

/**
 * Not implemented (yet) statements.
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

/**
 * Not implemented (yet) statements.
 *
 * The `after` function makes the parser jump straight to the first delimiter.
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
class NotImplementedStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The part of the statement that can't be parsed.
     *
     * @var Token[]
     */
    public $unknown = array();

    /**
     * @return string
     */
    public function build()
    {
        // Building the parsed part of the query (if any).
        $query = parent::build() . ' ';

        // Rebuilding the unknown part from tokens.
        foreach ($this->unknown as $token) {
            $query .= $token->token;
        }

        return $query;
    }

    /**
<<<<<<< HEAD
     * @param Parser     $parser The instance that requests parsing.
     * @param TokensList $list   The list of tokens to be parsed.
     *
     * @return void
=======
     * @param Parser     $parser the instance that requests parsing
     * @param TokensList $list   the list of tokens to be parsed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function parse(Parser $parser, TokensList $list)
    {
        for (; $list->idx < $list->count; ++$list->idx) {
            if ($list->tokens[$list->idx]->type === Token::TYPE_DELIMITER) {
                break;
            }
            $this->unknown[] = $list->tokens[$list->idx];
        }
    }
}
