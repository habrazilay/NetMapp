<?php

/**
 * Parses the create definition of a partition.
 *
 * Used for parsing `CREATE TABLE` statement.
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
 * Parses the create definition of a partition.
 *
 * Used for parsing `CREATE TABLE` statement.
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
class PartitionDefinition extends Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * All field options.
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD
        'STORAGE ENGINE'                => array(1, 'var'),
        'ENGINE'                        => array(1, 'var'),
        'COMMENT'                       => array(2, 'var'),
        'DATA DIRECTORY'                => array(3, 'var'),
        'INDEX DIRECTORY'               => array(4, 'var'),
        'MAX_ROWS'                      => array(5, 'var'),
        'MIN_ROWS'                      => array(6, 'var'),
        'TABLESPACE'                    => array(7, 'var'),
        'NODEGROUP'                     => array(8, 'var'),
=======
        'STORAGE ENGINE' => array(1, 'var'),
        'ENGINE' => array(1, 'var'),
        'COMMENT' => array(2, 'var'),
        'DATA DIRECTORY' => array(3, 'var'),
        'INDEX DIRECTORY' => array(4, 'var'),
        'MAX_ROWS' => array(5, 'var'),
        'MIN_ROWS' => array(6, 'var'),
        'TABLESPACE' => array(7, 'var'),
        'NODEGROUP' => array(8, 'var'),
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * Whether this entry is a subpartition or a partition.
     *
     * @var bool
     */
    public $isSubpartition;

    /**
     * The name of this partition.
     *
     * @var string
     */
    public $name;

    /**
     * The type of this partition (what follows the `VALUES` keyword).
     *
     * @var string
     */
    public $type;

    /**
     * The expression used to defined this partition.
     *
     * @var Expression|string
     */
    public $expr;

    /**
     * The subpartitions of this partition.
     *
     * @var PartitionDefinition[]
     */
    public $subpartitions;

    /**
     * The options of this field.
     *
     * @var OptionsArray
     */
    public $options;

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
     * @return PartitionDefinition
     */
    public static function parse(Parser $parser, TokensList $list, array $options = array())
    {
<<<<<<< HEAD
        $ret = new PartitionDefinition();
=======
        $ret = new self();
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 -------------[ PARTITION | SUBPARTITION ]------------> 1
         *
         *      1 -----------------------[ name ]----------------------> 2
         *
         *      2 ----------------------[ VALUES ]---------------------> 3
         *
         *      3 ---------------------[ LESS THAN ]-------------------> 4
         *      3 ------------------------[ IN ]-----------------------> 4
         *
         *      4 -----------------------[ expr ]----------------------> 5
         *
         *      5 ----------------------[ options ]--------------------> 6
         *
         *      6 ------------------[ subpartitions ]------------------> (END)
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
                $ret->isSubpartition = ($token->type === Token::TYPE_KEYWORD) && ($token->value === 'SUBPARTITION');
                $state = 1;
            } elseif ($state === 1) {
                $ret->name = $token->value;

                // Looking ahead for a 'VALUES' keyword.
                $idx = $list->idx;
                $list->getNext();
                $nextToken = $list->getNext();
                $list->idx = $idx;

                $state = ($nextToken->type === Token::TYPE_KEYWORD)
                    && ($nextToken->value === 'VALUES')
                    ? 2 : 5;
            } elseif ($state === 2) {
                $state = 3;
            } elseif ($state === 3) {
                $ret->type = $token->value;
                $state = 4;
            } elseif ($state === 4) {
                if ($token->value === 'MAXVALUE') {
                    $ret->expr = $token->value;
                } else {
                    $ret->expr = Expression::parse(
                        $parser,
                        $list,
                        array(
                            'parenthesesDelimited' => true,
                            'breakOnAlias' => true,
                        )
                    );
                }
                $state = 5;
            } elseif ($state === 5) {
                $ret->options = OptionsArray::parse($parser, $list, static::$OPTIONS);
                $state = 6;
            } elseif ($state === 6) {
                if (($token->type === Token::TYPE_OPERATOR) && ($token->value === '(')) {
                    $ret->subpartitions = ArrayObj::parse(
                        $parser,
                        $list,
                        array(
<<<<<<< HEAD
                            'type' => 'SqlParser\\Components\\PartitionDefinition'
=======
                            'type' => 'SqlParser\\Components\\PartitionDefinition',
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                        )
                    );
                    ++$list->idx;
                }
                break;
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
     * @param PartitionDefinition|PartitionDefinition[] $component The component to be built.
     * @param array                                     $options   Parameters for building.
=======
     * @param PartitionDefinition|PartitionDefinition[] $component the component to be built
     * @param array                                     $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        if (is_array($component)) {
            return "(\n" . implode(",\n", $component) . "\n)";
        } else {
            if ($component->isSubpartition) {
                return trim('SUBPARTITION ' . $component->name . ' ' . $component->options);
            } else {
                $subpartitions = empty($component->subpartitions)
<<<<<<< HEAD
                    ? '' : ' ' . PartitionDefinition::build($component->subpartitions);
=======
                    ? '' : ' ' . self::build($component->subpartitions);

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                return trim(
                    'PARTITION ' . $component->name
                    . (empty($component->type) ? '' : ' VALUES ' . $component->type . ' ' . $component->expr . ' ')
                    . $component->options . $subpartitions
                );
            }
        }
    }
}
