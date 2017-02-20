<?php

/**
 * `INTO` keyword parser.
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
 * `INTO` keyword parser.
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
class IntoKeyword extends Component
{
<<<<<<< HEAD
=======
    /**
     * FIELDS/COLUMNS Options for `SELECT...INTO` statements.
     *
     * @var array
     */
    public static $FIELDS_OPTIONS = array(
        'TERMINATED BY' => array(1, 'expr'),
        'OPTIONALLY' => 2,
        'ENCLOSED BY' => array(3, 'expr'),
        'ESCAPED BY' => array(4, 'expr'),
    );

    /**
     * LINES Options for `SELECT...INTO` statements.
     *
     * @var array
     */
    public static $LINES_OPTIONS = array(
        'STARTING BY' => array(1, 'expr'),
        'TERMINATED BY' => array(2, 'expr'),
    );
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

    /**
     * Type of target (OUTFILE or SYMBOL).
     *
     * @var string
     */
    public $type;

    /**
     * The destination, which can be a table or a file.
     *
     * @var string|Expression
     */
    public $dest;

    /**
     * The name of the columns.
     *
     * @var array
     */
    public $columns;

    /**
<<<<<<< HEAD
     * The values to be selected into (SELECT .. INTO @var1)
=======
     * The values to be selected into (SELECT .. INTO @var1).
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @var ExpressionArray
     */
    public $values;

    /**
<<<<<<< HEAD
     * @param Parser     $parser  The parser that serves as context.
     * @param TokensList $list    The list of tokens that are being parsed.
     * @param array      $options Parameters for parsing.
=======
     * Options for FIELDS/COLUMNS keyword.
     *
     * @var OptionsArray
     *
     * @see static::$FIELDS_OPTIONS
     */
    public $fields_options;

    /**
     * Whether to use `FIELDS` or `COLUMNS` while building.
     *
     * @var bool
     */
    public $fields_keyword;

    /**
     * Options for OPTIONS keyword.
     *
     * @var OptionsArray
     *
     * @see static::$LINES_OPTIONS
     */
    public $lines_options;

    /**
     * @param Parser     $parser  the parser that serves as context
     * @param TokensList $list    the list of tokens that are being parsed
     * @param array      $options parameters for parsing
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return IntoKeyword
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
<<<<<<< HEAD
        $ret = new IntoKeyword();
=======
        $ret = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 -----------------------[ name ]----------------------> 1
         *      0 ---------------------[ OUTFILE ]---------------------> 2
         *
         *      1 ------------------------[ ( ]------------------------> (END)
         *
         *      2 ---------------------[ filename ]--------------------> 1
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

            if (($token->type === Token::TYPE_KEYWORD) && ($token->flags & Token::FLAG_KEYWORD_RESERVED)) {
                if (($state === 0) && ($token->value === 'OUTFILE')) {
                    $ret->type = 'OUTFILE';
                    $state = 2;
                    continue;
                }

<<<<<<< HEAD
                // No other keyword is expected.
                break;
=======
                // No other keyword is expected except for $state = 4, which expects `LINES`
                if ($state !== 4) {
                    break;
                }
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
            }

            if ($state === 0) {
                if ((isset($options['fromInsert'])
                    && $options['fromInsert'])
                    || (isset($options['fromReplace'])
                    && $options['fromReplace'])
                ) {
                    $ret->dest = Expression::parse(
                        $parser,
                        $list,
                        array(
                            'parseField' => 'table',
                            'breakOnAlias' => true,
                        )
                    );
                } else {
                    $ret->values = ExpressionArray::parse($parser, $list);
                }
                $state = 1;
            } elseif ($state === 1) {
                if (($token->type === Token::TYPE_OPERATOR) && ($token->value === '(')) {
                    $ret->columns = ArrayObj::parse($parser, $list)->values;
                    ++$list->idx;
                }
                break;
            } elseif ($state === 2) {
                $ret->dest = $token->value;
<<<<<<< HEAD
                ++$list->idx;
                break;
=======

                $state = 3;
            } elseif ($state == 3) {
                $ret->parseFileOptions($parser, $list, $token->value);
                $state = 4;
            } elseif ($state == 4) {
                if ($token->type === Token::TYPE_KEYWORD && $token->value !== 'LINES') {
                    break;
                }

                $ret->parseFileOptions($parser, $list, $token->value);
                $state = 5;
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
            }
        }

        --$list->idx;
<<<<<<< HEAD
        return $ret;
    }

    /**
     * @param IntoKeyword $component The component to be built.
     * @param array       $options   Parameters for building.
=======

        return $ret;
    }

    public function parseFileOptions(Parser $parser, TokensList $list, $keyword = 'FIELDS')
    {
        ++$list->idx;

        if ($keyword === 'FIELDS' || $keyword === 'COLUMNS') {
            // parse field options
            $this->fields_options = OptionsArray::parse(
                $parser,
                $list,
                static::$FIELDS_OPTIONS
            );

            if ($keyword === 'FIELDS') {
                $this->fields_keyword = true;
            } else {
                $this->fields_keyword = false;
            }
        } else {
            // parse line options
            $this->lines_options = OptionsArray::parse(
                $parser,
                $list,
                static::$LINES_OPTIONS
            );
        }
    }

    /**
     * @param IntoKeyword $component the component to be built
     * @param array       $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        if ($component->dest instanceof Expression) {
            $columns = !empty($component->columns) ?
                '(`' . implode('`, `', $component->columns) . '`)' : '';
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
            return $component->dest . $columns;
        } elseif (isset($component->values)) {
            return ExpressionArray::build($component->values);
        } else {
<<<<<<< HEAD
            return 'OUTFILE "' . $component->dest . '"';
        }
    }
}
=======
            $ret = 'OUTFILE "' . $component->dest . '"';

            $fields_options_str = OptionsArray::build($component->fields_options);
            if (trim($fields_options_str) !== '') {
                $ret .= ($component->fields_keyword) ? ' FIELDS' : ' COLUMNS';
                $ret .= ' ' . $fields_options_str;
            }

            $lines_options_str = OptionsArray::build($component->lines_options, array('expr' => true));
            if (trim($lines_options_str) !== '') {
                $ret .= ' LINES ' . $lines_options_str;
            }

            return $ret;
        }
    }
}
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
