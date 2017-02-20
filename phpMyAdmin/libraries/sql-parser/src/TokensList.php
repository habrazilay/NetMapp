<?php

/**
 * Defines an array of tokens and utility functions to iterate through it.
<<<<<<< HEAD
 *
 * @package SqlParser
 */
=======
 */

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
namespace SqlParser;

/**
 * A structure representing a list of tokens.
 *
 * @category Tokens
<<<<<<< HEAD
 * @package  SqlParser
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license  https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class TokensList implements \ArrayAccess
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * The array of tokens.
     *
     * @var array
     */
    public $tokens = array();

    /**
     * The count of tokens.
     *
     * @var int
     */
    public $count = 0;

    /**
     * The index of the next token to be returned.
     *
     * @var int
     */
    public $idx = 0;

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param array $tokens The initial array of tokens.
     * @param int   $count  The count of tokens in the initial array.
=======
     * @param array $tokens the initial array of tokens
     * @param int   $count  the count of tokens in the initial array
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function __construct(array $tokens = array(), $count = -1)
    {
        if (!empty($tokens)) {
            $this->tokens = $tokens;
            if ($count === -1) {
                $this->count = count($tokens);
            }
        }
    }

    /**
     * Builds an array of tokens by merging their raw value.
     *
<<<<<<< HEAD
     * @param string|Token[]|TokensList $list The tokens to be built.
=======
     * @param string|Token[]|TokensList $list the tokens to be built
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function build($list)
    {
        if (is_string($list)) {
            return $list;
        }

<<<<<<< HEAD
        if ($list instanceof TokensList) {
=======
        if ($list instanceof self) {
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
            $list = $list->tokens;
        }

        $ret = '';
        if (is_array($list)) {
            foreach ($list as $tok) {
                $ret .= $tok->token;
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }

    /**
     * Adds a new token.
     *
<<<<<<< HEAD
     * @param Token $token Token to be added in list.
     *
     * @return void
=======
     * @param Token $token token to be added in list
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function add(Token $token)
    {
        $this->tokens[$this->count++] = $token;
    }

    /**
     * Gets the next token. Skips any irrelevant token (whitespaces and
     * comments).
     *
     * @return Token
     */
    public function getNext()
    {
        for (; $this->idx < $this->count; ++$this->idx) {
            if (($this->tokens[$this->idx]->type !== Token::TYPE_WHITESPACE)
                && ($this->tokens[$this->idx]->type !== Token::TYPE_COMMENT)
            ) {
                return $this->tokens[$this->idx++];
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return null;
    }

    /**
     * Gets the next token.
     *
<<<<<<< HEAD
     * @param int $type The type.
=======
     * @param int $type the type
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return Token
     */
    public function getNextOfType($type)
    {
        for (; $this->idx < $this->count; ++$this->idx) {
            if ($this->tokens[$this->idx]->type === $type) {
                return $this->tokens[$this->idx++];
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return null;
    }

    /**
     * Gets the next token.
     *
<<<<<<< HEAD
     * @param int    $type  The type of the token.
     * @param string $value The value of the token.
=======
     * @param int    $type  the type of the token
     * @param string $value the value of the token
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return Token
     */
    public function getNextOfTypeAndValue($type, $value)
    {
        for (; $this->idx < $this->count; ++$this->idx) {
            if (($this->tokens[$this->idx]->type === $type)
                && ($this->tokens[$this->idx]->value === $value)
            ) {
                return $this->tokens[$this->idx++];
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return null;
    }

    /**
     * Sets an value inside the container.
     *
<<<<<<< HEAD
     * @param int   $offset The offset to be set.
     * @param Token $value  The token to be saved.
     *
     * @return void
=======
     * @param int   $offset the offset to be set
     * @param Token $value  the token to be saved
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->tokens[$this->count++] = $value;
        } else {
            $this->tokens[$offset] = $value;
        }
    }

    /**
     * Gets a value from the container.
     *
<<<<<<< HEAD
     * @param int $offset The offset to be returned.
=======
     * @param int $offset the offset to be returned
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return Token
     */
    public function offsetGet($offset)
    {
        return $offset < $this->count ? $this->tokens[$offset] : null;
    }

    /**
     * Checks if an offset was previously set.
     *
<<<<<<< HEAD
     * @param int $offset The offset to be checked.
=======
     * @param int $offset the offset to be checked
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $offset < $this->count;
    }

    /**
     * Unsets the value of an offset.
     *
<<<<<<< HEAD
     * @param int $offset The offset to be unset.
     *
     * @return void
=======
     * @param int $offset the offset to be unset
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public function offsetUnset($offset)
    {
        unset($this->tokens[$offset]);
        --$this->count;
        for ($i = $offset; $i < $this->count; ++$i) {
            $this->tokens[$i] = $this->tokens[$i + 1];
        }
        unset($this->tokens[$this->count]);
    }
}
