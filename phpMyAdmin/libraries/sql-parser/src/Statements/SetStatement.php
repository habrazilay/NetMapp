<?php

/**
 * `SET` statement.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Statements
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Statements;

use SqlParser\Statement;
use SqlParser\Components\SetOperation;
use SqlParser\Components\OptionsArray;

/**
 * `SET` statement.
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
class SetStatement extends Statement
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The clauses of this statement, in order.
     *
     * @see Statement::$CLAUSES
     *
     * @var array
     */
    public static $CLAUSES = array(
<<<<<<< HEAD
        'SET'                           => array('SET',         3),
    );

    /**
     * Possible exceptions in SET statment
=======
        'SET' => array('SET',         3),
    );

    /**
     * Possible exceptions in SET statment.
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @var array
     */
    public static $OPTIONS = array(
<<<<<<< HEAD
        'CHARSET'           => array(3, 'var'),
        'CHARACTER SET'     => array(3, 'var'),
        'NAMES'             => array(3, 'var'),
        'PASSWORD'          => array(3, 'expr'),
    );

    /**
     * Options used in current statement
=======
        'CHARSET' => array(3, 'var'),
        'CHARACTER SET' => array(3, 'var'),
        'NAMES' => array(3, 'var'),
        'PASSWORD' => array(3, 'expr'),
    );

    /**
     * Options used in current statement.
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @var OptionsArray[]
     */
    public $options;

    /**
     * The updated values.
     *
     * @var SetOperation[]
     */
    public $set;

    /**
     * @return string
     */
    public function build()
    {
        return 'SET ' . OptionsArray::build($this->options)
            . ' ' . SetOperation::build($this->set);
    }
}
