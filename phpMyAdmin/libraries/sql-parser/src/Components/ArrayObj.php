<?php

/**
 * Parses an array.
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
 * Parses an array.
 *
 * @category   Components
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Components
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class ArrayObj extends Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The array that contains the unprocessed value of each token.
     *
     * @var array
     */
    public $raw = array();

    /**
     * The array that contains the processed value of each token.
     *
     * @var array
     */
    public $values = array();

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param array $raw    The unprocessed values.
     * @param array $values The processed values.
=======
     * @param array $raw    the unprocessed values
     * @param array $values the processed values
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct(array $raw = array(), array $values = array())
    {
        $this->raw = $raw;
        $this->values = $values;
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
     * @return ArrayObj|Component[]
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
<<<<<<< HEAD
        $ret = empty($options['type']) ? new ArrayObj() : array();
=======
        $ret = empty($options['type']) ? new self() : array();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The last raw expression.
         *
<<<<<<< HEAD
         * @var string $lastRaw
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $lastRaw = '';

        /**
         * The last value.
         *
<<<<<<< HEAD
         * @var string $lastValue
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $lastValue = '';

        /**
         * Counts brackets.
         *
<<<<<<< HEAD
         * @var int $brackets
=======
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $brackets = 0;

        /**
         * Last separator (bracket or comma).
         *
<<<<<<< HEAD
         * @var boolean $isCommaLast
=======
         * @var bool
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $isCommaLast = false;

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
            if (($token->type === Token::TYPE_WHITESPACE)
                || ($token->type === Token::TYPE_COMMENT)
            ) {
                $lastRaw .= $token->token;
                $lastValue = trim($lastValue) . ' ';
                continue;
            }

            if (($brackets === 0)
                && (($token->type !== Token::TYPE_OPERATOR)
                || ($token->value !== '('))
            ) {
                $parser->error(__('An opening bracket was expected.'), $token);
                break;
            }

            if ($token->type === Token::TYPE_OPERATOR) {
                if ($token->value === '(') {
                    if (++$brackets === 1) { // 1 is the base level.
                        continue;
                    }
                } elseif ($token->value === ')') {
                    if (--$brackets === 0) { // Array ended.
                        break;
                    }
                } elseif ($token->value === ',') {
                    if ($brackets === 1) {
                        $isCommaLast = true;
                        if (empty($options['type'])) {
                            $ret->raw[] = trim($lastRaw);
                            $ret->values[] = trim($lastValue);
                            $lastRaw = $lastValue = '';
                        }
                    }
                    continue;
                }
            }

            if (empty($options['type'])) {
                $lastRaw .= $token->token;
                $lastValue .= $token->value;
            } else {
                $ret[] = $options['type']::parse(
                    $parser,
                    $list,
                    empty($options['typeOptions']) ? array() : $options['typeOptions']
                );
            }
        }

        // Handling last element.
        //
        // This is treated differently to treat the following cases:
        //
        //           => array()
        //      (,)  => array('', '')
        //      ()   => array()
        //      (a,) => array('a', '')
        //      (a)  => array('a')
        //
        $lastRaw = trim($lastRaw);
        if ((empty($options['type']))
            && ((strlen($lastRaw) > 0) || ($isCommaLast))
        ) {
            $ret->raw[] = $lastRaw;
            $ret->values[] = trim($lastValue);
        }

        return $ret;
    }

    /**
<<<<<<< HEAD
     * @param ArrayObj|ArrayObj[] $component The component to be built.
     * @param array               $options   Parameters for building.
=======
     * @param ArrayObj|ArrayObj[] $component the component to be built
     * @param array               $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        if (is_array($component)) {
            return implode(', ', $component);
        } elseif (!empty($component->raw)) {
            return '(' . implode(', ', $component->raw) . ')';
        } else {
            return '(' . implode(', ', $component->values) . ')';
        }
    }
}
