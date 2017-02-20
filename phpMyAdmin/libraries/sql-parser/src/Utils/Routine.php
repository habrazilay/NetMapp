<?php

/**
 * Routine utilities.
<<<<<<< HEAD
 *
 * @package    SqlParser
 * @subpackage Utils
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser\Utils;

use SqlParser\Lexer;
use SqlParser\Parser;
use SqlParser\Components\DataType;
use SqlParser\Components\ParameterDefinition;
use SqlParser\Statements\CreateStatement;

/**
 * Routine utilities.
 *
 * @category   Routines
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Utils
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class Routine
{
<<<<<<< HEAD

    /**
     * Parses a parameter of a routine.
     *
     * @param string $param Parameter's definition.
=======
    /**
     * Parses a parameter of a routine.
     *
     * @param string $param parameter's definition
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getReturnType($param)
    {
        $lexer = new Lexer($param);

        // A dummy parser is used for error reporting.
        $type = DataType::parse(new Parser(), $lexer->list);

        if ($type === null) {
            return array('', '', '', '', '');
        }

        $options = array();
        foreach ($type->options->options as $opt) {
            $options[] = is_string($opt) ? $opt : $opt['value'];
        }

        return array(
            '',
            '',
            $type->name,
            implode(',', $type->parameters),
<<<<<<< HEAD
            implode(' ', $options)
=======
            implode(' ', $options),
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        );
    }

    /**
     * Parses a parameter of a routine.
     *
<<<<<<< HEAD
     * @param string $param Parameter's definition.
=======
     * @param string $param parameter's definition
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getParameter($param)
    {
        $lexer = new Lexer('(' . $param . ')');

        // A dummy parser is used for error reporting.
        $param = ParameterDefinition::parse(new Parser(), $lexer->list);

        if (empty($param[0])) {
            return array('', '', '', '', '');
        }

        $param = $param[0];

        $options = array();
        foreach ($param->type->options->options as $opt) {
            $options[] = is_string($opt) ? $opt : $opt['value'];
        }

        return array(
            empty($param->inOut) ? '' : $param->inOut,
            $param->name,
            $param->type->name,
            implode(',', $param->type->parameters),
<<<<<<< HEAD
            implode(' ', $options)
=======
            implode(' ', $options),
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        );
    }

    /**
     * Gets the parameters of a routine from the parse tree.
     *
<<<<<<< HEAD
     * @param CreateStatement $statement The statement to be processed.
=======
     * @param CreateStatement $statement the statement to be processed
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getParameters($statement)
    {
        $retval = array(
            'num' => 0,
            'dir' => array(),
            'name' => array(),
            'type' => array(),
            'length' => array(),
            'length_arr' => array(),
            'opts' => array(),
        );

        if (!empty($statement->parameters)) {
            $idx = 0;
            foreach ($statement->parameters as $param) {
                $retval['dir'][$idx] = $param->inOut;
                $retval['name'][$idx] = $param->name;
                $retval['type'][$idx] = $param->type->name;
                $retval['length'][$idx] = implode(',', $param->type->parameters);
                $retval['length_arr'][$idx] = $param->type->parameters;
                $retval['opts'][$idx] = array();
                foreach ($param->type->options->options as $opt) {
                    $retval['opts'][$idx][] = is_string($opt) ?
                        $opt : $opt['value'];
                }
                $retval['opts'][$idx] = implode(' ', $retval['opts'][$idx]);
                ++$idx;
            }

            $retval['num'] = $idx;
        }

        return $retval;
    }
}
