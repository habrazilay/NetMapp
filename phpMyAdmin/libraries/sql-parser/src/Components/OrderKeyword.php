<?php

/**
 * `ORDER BY` keyword parser.
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
 * `ORDER BY` keyword parser.
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
class OrderKeyword extends Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The expression that is used for ordering.
     *
     * @var Expression
     */
    public $expr;

    /**
     * The order type.
     *
     * @var string
     */
    public $type;

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param Expression $expr The expression that we are sorting by.
     * @param string     $type The sorting type.
=======
     * @param Expression $expr the expression that we are sorting by
     * @param string     $type the sorting type
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct($expr = null, $type = 'ASC')
    {
        $this->expr = $expr;
        $this->type = $type;
    }

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
     * @return OrderKeyword[]
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
        $ret = array();

<<<<<<< HEAD
        $expr = new OrderKeyword();
=======
        $expr = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 --------------------[ expression ]-------------------> 1
         *
         *      1 ------------------------[ , ]------------------------> 0
         *      1 -------------------[ ASC / DESC ]--------------------> 1
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

            if ($state === 0) {
                $expr->expr = Expression::parse($parser, $list);
                $state = 1;
            } elseif ($state === 1) {
                if (($token->type === Token::TYPE_KEYWORD)
                    && (($token->value === 'ASC') || ($token->value === 'DESC'))
                ) {
                    $expr->type = $token->value;
                } elseif (($token->type === Token::TYPE_OPERATOR)
                    && ($token->value === ',')
                ) {
                    if (!empty($expr->expr)) {
                        $ret[] = $expr;
                    }
<<<<<<< HEAD
                    $expr = new OrderKeyword();
=======
                    $expr = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                    $state = 0;
                } else {
                    break;
                }
            }
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        }

        // Last iteration was not processed.
        if (!empty($expr->expr)) {
            $ret[] = $expr;
        }

        --$list->idx;
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }

    /**
<<<<<<< HEAD
     * @param OrderKeyword|OrderKeyword[] $component The component to be built.
     * @param array                       $options   Parameters for building.
=======
     * @param OrderKeyword|OrderKeyword[] $component the component to be built
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
            return $component->expr . ' ' . $component->type;
        }
    }
}
