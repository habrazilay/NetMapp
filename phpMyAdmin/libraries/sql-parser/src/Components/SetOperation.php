<?php

/**
 * `SET` keyword parser.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Components
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Components;

use SqlParser\Component;
use SqlParser\Parser;
use SqlParser\Token;
use SqlParser\TokensList;

/**
 * `SET` keyword parser.
 *
 * @category   Keywords
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Components
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class SetOperation extends Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The name of the column that is being updated.
     *
     * @var string
     */
    public $column;

    /**
     * The new value.
     *
     * @var string
     */
    public $value;

    /**
<<<<<<< HEAD
     * @param Parser     $parser  The parser that serves as context.
     * @param TokensList $list    The list of tokens that are being parsed.
     * @param array      $options Parameters for parsing.
=======
     * @param Parser     $parser  the parser that serves as context
     * @param TokensList $list    the list of tokens that are being parsed
     * @param array      $options parameters for parsing
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return SetOperation[]
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
        $ret = array();

<<<<<<< HEAD
        $expr = new SetOperation();
=======
        $expr = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 -------------------[ column name ]-------------------> 1
         *
         *      1 ------------------------[ , ]------------------------> 0
         *      1 ----------------------[ value ]----------------------> 1
         *
<<<<<<< HEAD
         * @var int $state
=======
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $state = 0;

        for (; $list->idx < $list->count; ++$list->idx) {
            /**
             * Token parsed at this moment.
             *
<<<<<<< HEAD
             * @var Token $token
=======
             * @var Token
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
             */
            $token = $list->tokens[$list->idx];

            // End of statement.
            if ($token->type === Token::TYPE_DELIMITER) {
                break;
            }

            // Skipping whitespaces and comments.
            if (($token->type === Token::TYPE_WHITESPACE) || ($token->type === Token::TYPE_COMMENT)) {
                continue;
            }

            // No keyword is expected.
            if (($token->type === Token::TYPE_KEYWORD)
                && ($token->flags & Token::FLAG_KEYWORD_RESERVED)
                && ($state == 0)
            ) {
                break;
            }

            if ($state === 0) {
                if ($token->token === '=') {
                    $state = 1;
                } elseif ($token->value !== ',') {
                    $expr->column .= $token->token;
                }
            } elseif ($state === 1) {
                $tmp = Expression::parse(
                    $parser,
                    $list,
                    array(
                        'breakOnAlias' => true,
                    )
                );
                if ($tmp == null) {
<<<<<<< HEAD
=======
                    $parser->error(__('Missing expression.'), $token);
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                    break;
                }
                $expr->column = trim($expr->column);
                $expr->value = $tmp->expr;
                $ret[] = $expr;
<<<<<<< HEAD
                $expr = new SetOperation();
=======
                $expr = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                $state = 0;
            }
        }

        --$list->idx;
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }

    /**
<<<<<<< HEAD
     * @param SetOperation|SetOperation[] $component The component to be built.
     * @param array                       $options   Parameters for building.
=======
     * @param SetOperation|SetOperation[] $component the component to be built
     * @param array                       $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        if (is_array($component)) {
            return implode(', ', $component);
        } else {
            return $component->column . ' = ' . $component->value;
        }
    }
}
