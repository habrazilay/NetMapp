<?php

/**
 * Transaction statement.
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
use SqlParser\TokensList;
use SqlParser\Components\OptionsArray;

/**
 * Transaction statement.
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
class TransactionStatement extends Statement
{
<<<<<<< HEAD

    /**
     * START TRANSACTION and BEGIN
     *
     * @var int
     */
    const TYPE_BEGIN                    = 1;

    /**
     * COMMIT and ROLLBACK
     *
     * @var int
     */
    const TYPE_END                      = 2;
=======
    /**
     * START TRANSACTION and BEGIN.
     *
     * @var int
     */
    const TYPE_BEGIN = 1;

    /**
     * COMMIT and ROLLBACK.
     *
     * @var int
     */
    const TYPE_END = 2;
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584

    /**
     * The type of this query.
     *
     * @var int
     */
    public $type;

    /**
     * The list of statements in this transaction.
     *
     * @var Statement[]
     */
    public $statements;

    /**
     * The ending transaction statement which may be a `COMMIT` or a `ROLLBACK`.
     *
     * @var TransactionStatement
     */
    public $end;

    /**
     * Options for this query.
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD
        'START TRANSACTION'             => 1,
        'BEGIN'                         => 1,
        'COMMIT'                        => 1,
        'ROLLBACK'                      => 1,
        'WITH CONSISTENT SNAPSHOT'      => 2,
        'WORK'                          => 2,
        'AND NO CHAIN'                  => 3,
        'AND CHAIN'                     => 3,
        'RELEASE'                       => 4,
        'NO RELEASE'                    => 4,
    );

    /**
     * @param Parser     $parser The instance that requests parsing.
     * @param TokensList $list   The list of tokens to be parsed.
     *
     * @return void
=======
        'START TRANSACTION' => 1,
        'BEGIN' => 1,
        'COMMIT' => 1,
        'ROLLBACK' => 1,
        'WITH CONSISTENT SNAPSHOT' => 2,
        'WORK' => 2,
        'AND NO CHAIN' => 3,
        'AND CHAIN' => 3,
        'RELEASE' => 4,
        'NO RELEASE' => 4,
    );

    /**
     * @param Parser     $parser the instance that requests parsing
     * @param TokensList $list   the list of tokens to be parsed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function parse(Parser $parser, TokensList $list)
    {
        parent::parse($parser, $list);

        // Checks the type of this query.
        if (($this->options->has('START TRANSACTION'))
            || ($this->options->has('BEGIN'))
        ) {
<<<<<<< HEAD
            $this->type = TransactionStatement::TYPE_BEGIN;
        } elseif (($this->options->has('COMMIT'))
            || ($this->options->has('ROLLBACK'))
        ) {
            $this->type = TransactionStatement::TYPE_END;
=======
            $this->type = self::TYPE_BEGIN;
        } elseif (($this->options->has('COMMIT'))
            || ($this->options->has('ROLLBACK'))
        ) {
            $this->type = self::TYPE_END;
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        }
    }

    /**
     * @return string
     */
    public function build()
    {
        $ret = OptionsArray::build($this->options);
<<<<<<< HEAD
        if ($this->type === TransactionStatement::TYPE_BEGIN) {
            foreach ($this->statements as $statement) {
                /**
=======
        if ($this->type === self::TYPE_BEGIN) {
            foreach ($this->statements as $statement) {
                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * @var SelectStatement $statement
                 */
                $ret .= ';' . $statement->build();
            }
            $ret .= ';' . $this->end->build();
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }
}
