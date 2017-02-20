<?php

/**
 * Maintenance statement.
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
use SqlParser\Components\Expression;
use SqlParser\Components\OptionsArray;

/**
 * Maintenance statement.
 *
 * They follow the syntax:
 *     STMT [some options] tbl_name [, tbl_name] ... [some more options]
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
class MaintenanceStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Tables maintained.
     *
     * @var Expression[]
     */
    public $tables;

    /**
     * Function called after the token was processed.
     *
     * Parses the additional options from the end.
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
    public function after(Parser $parser, TokensList $list, Token $token)
    {
        // [some options] is going to be parsed first.
        //
        // There is a parser specified in `Parser::$KEYWORD_PARSERS`
        // which parses the name of the tables.
        //
        // Finally, we parse here [some more options] and that's all.
        ++$list->idx;
        $this->options->merge(
            OptionsArray::parse(
                $parser,
                $list,
                static::$OPTIONS
            )
        );
    }
}
