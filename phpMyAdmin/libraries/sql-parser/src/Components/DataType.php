<?php

/**
 * Parses a data type.
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
 * Parses a data type.
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
class DataType extends Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * All data type options.
     *
     * @var array
     */
    public static $DATA_TYPE_OPTIONS = array(
<<<<<<< HEAD
        'BINARY'                        => 1,
        'CHARACTER SET'                 => array(2, 'var'),
        'CHARSET'                       => array(2, 'var'),
        'COLLATE'                       => array(3, 'var'),
        'UNSIGNED'                      => 4,
        'ZEROFILL'                      => 5,
=======
        'BINARY' => 1,
        'CHARACTER SET' => array(2, 'var'),
        'CHARSET' => array(2, 'var'),
        'COLLATE' => array(3, 'var'),
        'UNSIGNED' => 4,
        'ZEROFILL' => 5,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * The name of the data type.
     *
     * @var string
     */
    public $name;

    /**
     * The parameters of this data type.
     *
     * Some data types have no parameters.
     * Numeric types might have parameters for the maximum number of digits,
     * precision, etc.
     * String types might have parameters for the maximum length stored.
     * `ENUM` and `SET` have parameters for possible values.
     *
     * For more information, check the MySQL manual.
     *
     * @var array
     */
    public $parameters = array();

    /**
     * The options of this data type.
     *
     * @var OptionsArray
     */
    public $options;

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string       $name       The name of this data type.
     * @param array        $parameters The parameters (size or possible values).
     * @param OptionsArray $options    The options of this data type.
=======
     * @param string       $name       the name of this data type
     * @param array        $parameters the parameters (size or possible values)
     * @param OptionsArray $options    the options of this data type
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct(
        $name = null,
        array $parameters = array(),
        $options = null
    ) {
        $this->name = $name;
        $this->parameters = $parameters;
        $this->options = $options;
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
     * @return DataType
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
<<<<<<< HEAD
        $ret = new DataType();
=======
        $ret = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 -------------------[ data type ]--------------------> 1
         *
         *      1 ----------------[ size and options ]----------------> 2
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

            // Skipping whitespaces and comments.
            if (($token->type === Token::TYPE_WHITESPACE) || ($token->type === Token::TYPE_COMMENT)) {
                continue;
            }

            if ($state === 0) {
                $ret->name = strtoupper($token->value);
                if (($token->type !== Token::TYPE_KEYWORD) || (!($token->flags & Token::FLAG_KEYWORD_DATA_TYPE))) {
                    $parser->error(__('Unrecognized data type.'), $token);
                }
                $state = 1;
            } elseif ($state === 1) {
                if (($token->type === Token::TYPE_OPERATOR) && ($token->value === '(')) {
                    $parameters = ArrayObj::parse($parser, $list);
                    ++$list->idx;
                    $ret->parameters = (($ret->name === 'ENUM') || ($ret->name === 'SET')) ?
                        $parameters->raw : $parameters->values;
                }
                $ret->options = OptionsArray::parse($parser, $list, static::$DATA_TYPE_OPTIONS);
                ++$list->idx;
                break;
            }
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        }

        if (empty($ret->name)) {
            return null;
        }

        --$list->idx;
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }

    /**
<<<<<<< HEAD
     * @param DataType $component The component to be built.
     * @param array    $options   Parameters for building.
=======
     * @param DataType $component the component to be built
     * @param array    $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        $name = (empty($options['lowercase'])) ?
            $component->name : strtolower($component->name);

        $parameters = '';
        if (!empty($component->parameters)) {
            $parameters = '(' . implode(',', $component->parameters) . ')';
        }

        return trim($name . $parameters . ' ' . $component->options);
    }
}
