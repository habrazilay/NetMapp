<?php

/**
 * Defines a component that is later extended to parse specialized components or
 * keywords.
 *
 * There is a small difference between *Component and *Keyword classes: usually,
 * *Component parsers can be reused in multiple  situations and *Keyword parsers
 * count on the *Component classes to do their job.
<<<<<<< HEAD
 *
 * @package SqlParser
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser;

require_once 'common.php';

/**
 * A component (of a statement) is a part of a statement that is common to
 * multiple query types.
 *
 * @category Components
<<<<<<< HEAD
 * @package  SqlParser
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license  https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
abstract class Component
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Parses the tokens contained in the given list in the context of the given
     * parser.
     *
<<<<<<< HEAD
     * @param Parser     $parser  The parser that serves as context.
     * @param TokensList $list    The list of tokens that are being parsed.
     * @param array      $options Parameters for parsing.
     *
     * @throws \Exception Not implemented yet.
=======
     * @param Parser     $parser  the parser that serves as context
     * @param TokensList $list    the list of tokens that are being parsed
     * @param array      $options parameters for parsing
     *
     * @throws \Exception not implemented yet
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return mixed
     */
    public static function parse(
        Parser $parser,
        TokensList $list,
        array $options = array()
    ) {
        // This method should be abstract, but it can't be both static and
        // abstract.
        throw new \Exception(\__('Not implemented yet.'));
    }

    /**
     * Builds the string representation of a component of this type.
     *
     * In other words, this function represents the inverse function of
     * `static::parse`.
     *
<<<<<<< HEAD
     * @param mixed $component The component to be built.
     * @param array $options   Parameters for building.
     *
     * @throws \Exception Not implemented yet.
=======
     * @param mixed $component the component to be built
     * @param array $options   parameters for building
     *
     * @throws \Exception not implemented yet
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($component, array $options = array())
    {
        // This method should be abstract, but it can't be both static and
        // abstract.
        throw new \Exception(\__('Not implemented yet.'));
    }

    /**
     * Builds the string representation of a component of this type.
     *
     * @see static::build
     *
     * @return string
     */
    public function __toString()
    {
        return static::build($this);
    }
}
