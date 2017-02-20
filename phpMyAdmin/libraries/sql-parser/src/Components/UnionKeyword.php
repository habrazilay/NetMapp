<?php

/**
 * `UNION` keyword builder.
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
use SqlParser\Statements\SelectStatement;

/**
 * `UNION` keyword builder.
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
class UnionKeyword extends Component
{
<<<<<<< HEAD

    /**
     * @param SelectStatement[] $component The component to be built.
     * @param array             $options   Parameters for building.
=======
    /**
     * @param SelectStatement[] $component the component to be built
     * @param array             $options   parameters for building
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        $tmp = array();
        foreach ($component as $component) {
            $tmp[] = $component[0] . ' ' . $component[1];
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return implode(' ', $tmp);
    }
}
