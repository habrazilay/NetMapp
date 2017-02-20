<?php

/**
 * `ALTER` statement.
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
use SqlParser\Components\AlterOperation;
use SqlParser\Components\Expression;
use SqlParser\Components\OptionsArray;

/**
 * `ALTER` statement.
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
class AlterStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Table affected.
     *
     * @var Expression
     */
    public $table;

    /**
     * Column affected by this statement.
     *
     * @var AlterOperation[]
     */
    public $altered = array();

    /**
     * Options of this statement.
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD
        'ONLINE'                        => 1,
        'OFFLINE'                       => 1,
        'IGNORE'                        => 2,

        'DATABASE'                      => 3,
        'EVENT'                         => 3,
        'FUNCTION'                      => 3,
        'PROCEDURE'                     => 3,
        'SERVER'                        => 3,
        'TABLE'                         => 3,
        'TABLESPACE'                    => 3,
        'VIEW'                          => 3,
    );

    /**
     * @param Parser     $parser The instance that requests parsing.
     * @param TokensList $list   The list of tokens to be parsed.
     *
     * @return void
=======
        'ONLINE' => 1,
        'OFFLINE' => 1,
        'IGNORE' => 2,

        'DATABASE' => 3,
        'EVENT' => 3,
        'FUNCTION' => 3,
        'PROCEDURE' => 3,
        'SERVER' => 3,
        'TABLE' => 3,
        'TABLESPACE' => 3,
        'VIEW' => 3,
    );

    /**
     * @param Parser     $parser the instance that requests parsing
     * @param TokensList $list   the list of tokens to be parsed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function parse(Parser $parser, TokensList $list)
    {
        ++$list->idx; // Skipping `ALTER`.
        $this->options = OptionsArray::parse(
            $parser,
            $list,
            static::$OPTIONS
        );
        ++$list->idx;

        // Parsing affected table.
        $this->table = Expression::parse(
            $parser,
            $list,
            array(
                'parseField' => 'table',
                'breakOnAlias' => true,
            )
        );
        ++$list->idx; // Skipping field.

        /**
         * The state of the parser.
         *
         * Below are the states of the parser.
         *
         *      0 -----------------[ alter operation ]-----------------> 1
         *
         *      1 -------------------------[ , ]-----------------------> 0
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
                $options = array();
                if ($this->options->has('DATABASE')) {
                    $options = AlterOperation::$DB_OPTIONS;
                } elseif ($this->options->has('TABLE')) {
                    $options = AlterOperation::$TABLE_OPTIONS;
                } elseif ($this->options->has('VIEW')) {
                    $options = AlterOperation::$VIEW_OPTIONS;
                }

                $this->altered[] = AlterOperation::parse($parser, $list, $options);
                $state = 1;
            } elseif ($state === 1) {
                if (($token->type === Token::TYPE_OPERATOR) && ($token->value === ',')) {
                    $state = 0;
                }
            }
        }
    }

    /**
     * @return string
     */
    public function build()
    {
        $tmp = array();
        foreach ($this->altered as $altered) {
            $tmp[] = $altered::build($altered);
        }

        return 'ALTER ' . OptionsArray::build($this->options)
            . ' ' . Expression::build($this->table)
            . ' ' . implode(', ', $tmp);
    }
}
