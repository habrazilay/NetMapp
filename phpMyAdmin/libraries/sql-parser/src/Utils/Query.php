<?php

/**
 * Statement utilities.
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
use SqlParser\Statement;
use SqlParser\Token;
use SqlParser\TokensList;
use SqlParser\Components\Expression;
use SqlParser\Statements\AlterStatement;
use SqlParser\Statements\AnalyzeStatement;
use SqlParser\Statements\CallStatement;
use SqlParser\Statements\CheckStatement;
use SqlParser\Statements\ChecksumStatement;
use SqlParser\Statements\CreateStatement;
use SqlParser\Statements\DeleteStatement;
use SqlParser\Statements\DropStatement;
use SqlParser\Statements\ExplainStatement;
use SqlParser\Statements\InsertStatement;
use SqlParser\Statements\OptimizeStatement;
use SqlParser\Statements\RenameStatement;
use SqlParser\Statements\RepairStatement;
use SqlParser\Statements\ReplaceStatement;
use SqlParser\Statements\SelectStatement;
use SqlParser\Statements\ShowStatement;
use SqlParser\Statements\TruncateStatement;
use SqlParser\Statements\UpdateStatement;

/**
 * Statement utilities.
 *
 * @category   Statement
<<<<<<< HEAD
 * @package    SqlParser
 * @subpackage Utils
=======
 *
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
 * @license    https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 */
class Query
{
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    /**
     * Functions that set the flag `is_func`.
     *
     * @var array
     */
    public static $FUNCTIONS = array(
<<<<<<< HEAD
        'SUM', 'AVG', 'STD', 'STDDEV', 'MIN', 'MAX', 'BIT_OR', 'BIT_AND'
=======
        'SUM', 'AVG', 'STD', 'STDDEV', 'MIN', 'MAX', 'BIT_OR', 'BIT_AND',
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
    );

    /**
     * Gets an array with flags this statement has.
     *
<<<<<<< HEAD
     * @param Statement|null $statement The statement to be processed.
     * @param bool           $all       If `false`, false values will not be included.
=======
     * @param Statement|null $statement the statement to be processed
     * @param bool           $all       if `false`, false values will not be included
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getFlags($statement, $all = false)
    {
        $flags = array();
        if ($all) {
            $flags = array(
<<<<<<< HEAD

                /**
                 * select ... DISTINCT ...
                 */
                'distinct'      => false,

                /**
=======
                /*
                 * select ... DISTINCT ...
                 */
                'distinct' => false,

                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * drop ... DATABASE ...
                 */
                'drop_database' => false,

<<<<<<< HEAD
                /**
                 * ... GROUP BY ...
                 */
                'group'         => false,

                /**
                 * ... HAVING ...
                 */
                'having'        => false,

                /**
=======
                /*
                 * ... GROUP BY ...
                 */
                'group' => false,

                /*
                 * ... HAVING ...
                 */
                'having' => false,

                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * INSERT ...
                 * or
                 * REPLACE ...
                 * or
                 * DELETE ...
                 */
<<<<<<< HEAD
                'is_affected'   => false,

                /**
                 * select ... PROCEDURE ANALYSE( ... ) ...
                 */
                'is_analyse'    => false,

                /**
                 * select COUNT( ... ) ...
                 */
                'is_count'      => false,

                /**
                 * DELETE ...
                 */
                'is_delete'     => false, // @deprecated; use `querytype`

                /**
                 * EXPLAIN ...
                 */
                'is_explain'    => false, // @deprecated; use `querytype`

                /**
                 * select ... INTO OUTFILE ...
                 */
                'is_export'     => false,

                /**
                 * select FUNC( ... ) ...
                 */
                'is_func'       => false,

                /**
=======
                'is_affected' => false,

                /*
                 * select ... PROCEDURE ANALYSE( ... ) ...
                 */
                'is_analyse' => false,

                /*
                 * select COUNT( ... ) ...
                 */
                'is_count' => false,

                /*
                 * DELETE ...
                 */
                'is_delete' => false, // @deprecated; use `querytype`

                /*
                 * EXPLAIN ...
                 */
                'is_explain' => false, // @deprecated; use `querytype`

                /*
                 * select ... INTO OUTFILE ...
                 */
                'is_export' => false,

                /*
                 * select FUNC( ... ) ...
                 */
                'is_func' => false,

                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * select ... GROUP BY ...
                 * or
                 * select ... HAVING ...
                 */
<<<<<<< HEAD
                'is_group'      => false,

                /**
=======
                'is_group' => false,

                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * INSERT ...
                 * or
                 * REPLACE ...
                 * or
                 * TODO: LOAD DATA ...
                 */
<<<<<<< HEAD
                'is_insert'     => false,

                /**
=======
                'is_insert' => false,

                /*
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                 * ANALYZE ...
                 * or
                 * CHECK ...
                 * or
                 * CHECKSUM ...
                 * or
                 * OPTIMIZE ...
                 * or
                 * REPAIR ...
                 */
<<<<<<< HEAD
                'is_maint'      => false,

                /**
                 * CALL ...
                 */
                'is_procedure'  => false,

                /**
                 * REPLACE ...
                 */
                'is_replace'    => false, // @deprecated; use `querytype`

                /**
                 * SELECT ...
                 */
                'is_select'     => false, // @deprecated; use `querytype`

                /**
                 * SHOW ...
                 */
                'is_show'       => false, // @deprecated; use `querytype`

                /**
                 * Contains a subquery.
                 */
                'is_subquery'   => false,

                /**
                 * ... JOIN ...
                 */
                'join'          => false,

                /**
                 * ... LIMIT ...
                 */
                'limit'         => false,

                /**
                 * TODO
                 */
                'offset'        => false,

                /**
                 * ... ORDER ...
                 */
                'order'         => false,

                /**
                 * The type of the query (which is usually the first keyword of
                 * the statement).
                 */
                'querytype'     => false,

                /**
                 * Whether a page reload is required.
                 */
                'reload'        => false,

                /**
                 * SELECT ... FROM ...
                 */
                'select_from'   => false,

                /**
                 * ... UNION ...
                 */
                'union'         => false
=======
                'is_maint' => false,

                /*
                 * CALL ...
                 */
                'is_procedure' => false,

                /*
                 * REPLACE ...
                 */
                'is_replace' => false, // @deprecated; use `querytype`

                /*
                 * SELECT ...
                 */
                'is_select' => false, // @deprecated; use `querytype`

                /*
                 * SHOW ...
                 */
                'is_show' => false, // @deprecated; use `querytype`

                /*
                 * Contains a subquery.
                 */
                'is_subquery' => false,

                /*
                 * ... JOIN ...
                 */
                'join' => false,

                /*
                 * ... LIMIT ...
                 */
                'limit' => false,

                /*
                 * TODO
                 */
                'offset' => false,

                /*
                 * ... ORDER ...
                 */
                'order' => false,

                /*
                 * The type of the query (which is usually the first keyword of
                 * the statement).
                 */
                'querytype' => false,

                /*
                 * Whether a page reload is required.
                 */
                'reload' => false,

                /*
                 * SELECT ... FROM ...
                 */
                'select_from' => false,

                /*
                 * ... UNION ...
                 */
                'union' => false,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
            );
        }

        if ($statement instanceof AlterStatement) {
            $flags['querytype'] = 'ALTER';
            $flags['reload'] = true;
        } elseif ($statement instanceof CreateStatement) {
            $flags['querytype'] = 'CREATE';
            $flags['reload'] = true;
        } elseif ($statement instanceof AnalyzeStatement) {
            $flags['querytype'] = 'ANALYZE';
            $flags['is_maint'] = true;
        } elseif ($statement instanceof CheckStatement) {
            $flags['querytype'] = 'CHECK';
            $flags['is_maint'] = true;
        } elseif ($statement instanceof ChecksumStatement) {
            $flags['querytype'] = 'CHECKSUM';
            $flags['is_maint'] = true;
        } elseif ($statement instanceof OptimizeStatement) {
            $flags['querytype'] = 'OPTIMIZE';
            $flags['is_maint'] = true;
        } elseif ($statement instanceof RepairStatement) {
            $flags['querytype'] = 'REPAIR';
            $flags['is_maint'] = true;
        } elseif ($statement instanceof CallStatement) {
            $flags['querytype'] = 'CALL';
            $flags['is_procedure'] = true;
        } elseif ($statement instanceof DeleteStatement) {
            $flags['querytype'] = 'DELETE';
            $flags['is_delete'] = true;
            $flags['is_affected'] = true;
        } elseif ($statement instanceof DropStatement) {
            $flags['querytype'] = 'DROP';
            $flags['reload'] = true;

            if (($statement->options->has('DATABASE')
                || ($statement->options->has('SCHEMA')))
            ) {
                $flags['drop_database'] = true;
            }
        } elseif ($statement instanceof ExplainStatement) {
            $flags['querytype'] = 'EXPLAIN';
            $flags['is_explain'] = true;
        } elseif ($statement instanceof InsertStatement) {
            $flags['querytype'] = 'INSERT';
            $flags['is_affected'] = true;
            $flags['is_insert'] = true;
        } elseif ($statement instanceof ReplaceStatement) {
            $flags['querytype'] = 'REPLACE';
            $flags['is_affected'] = true;
            $flags['is_replace'] = true;
            $flags['is_insert'] = true;
        } elseif ($statement instanceof SelectStatement) {
            $flags['querytype'] = 'SELECT';
            $flags['is_select'] = true;

            if (!empty($statement->from)) {
                $flags['select_from'] = true;
            }

            if ($statement->options->has('DISTINCT')) {
                $flags['distinct'] = true;
            }

            if ((!empty($statement->group)) || (!empty($statement->having))) {
                $flags['is_group'] = true;
            }

            if ((!empty($statement->into))
                && ($statement->into->type === 'OUTFILE')
            ) {
                $flags['is_export'] = true;
            }

            $expressions = $statement->expr;
            if (!empty($statement->join)) {
                foreach ($statement->join as $join) {
                    $expressions[] = $join->expr;
                }
            }

            foreach ($expressions as $expr) {
                if (!empty($expr->function)) {
                    if ($expr->function === 'COUNT') {
                        $flags['is_count'] = true;
                    } elseif (in_array($expr->function, static::$FUNCTIONS)) {
                        $flags['is_func'] = true;
                    }
                }
                if (!empty($expr->subquery)) {
                    $flags['is_subquery'] = true;
                }
            }

            if ((!empty($statement->procedure))
                && ($statement->procedure->name === 'ANALYSE')
            ) {
                $flags['is_analyse'] = true;
            }

            if (!empty($statement->group)) {
                $flags['group'] = true;
            }

            if (!empty($statement->having)) {
                $flags['having'] = true;
            }

            if (!empty($statement->union)) {
                $flags['union'] = true;
            }

            if (!empty($statement->join)) {
                $flags['join'] = true;
            }
<<<<<<< HEAD

=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        } elseif ($statement instanceof ShowStatement) {
            $flags['querytype'] = 'SHOW';
            $flags['is_show'] = true;
        } elseif ($statement instanceof UpdateStatement) {
            $flags['querytype'] = 'UPDATE';
            $flags['is_affected'] = true;
        }

        if (($statement instanceof SelectStatement)
            || ($statement instanceof UpdateStatement)
            || ($statement instanceof DeleteStatement)
        ) {
            if (!empty($statement->limit)) {
                $flags['limit'] = true;
            }
            if (!empty($statement->order)) {
                $flags['order'] = true;
            }
        }

        return $flags;
    }

    /**
     * Parses a query and gets all information about it.
     *
<<<<<<< HEAD
     * @param string $query The query to be parsed.
     *
     * @return array The array returned is the one returned by
     *               `static::getFlags()`, with the following keys added:
     *                 - parser - the parser used to analyze the query;
     *                 - statement - the first statement resulted from parsing;
     *                 - select_tables - the real name of the tables selected;
     *                       if there are no table names in the `SELECT`
     *                       expressions, the table names are fetched from the
     *                       `FROM` expressions
     *                 - select_expr - selected expressions
=======
     * @param string $query the query to be parsed
     *
     * @return array The array returned is the one returned by
     *               `static::getFlags()`, with the following keys added:
     *               - parser - the parser used to analyze the query;
     *               - statement - the first statement resulted from parsing;
     *               - select_tables - the real name of the tables selected;
     *               if there are no table names in the `SELECT`
     *               expressions, the table names are fetched from the
     *               `FROM` expressions
     *               - select_expr - selected expressions
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public static function getAll($query)
    {
        $parser = new Parser($query);

        if (empty($parser->statements[0])) {
            return static::getFlags(null, true);
        }

        $statement = $parser->statements[0];

        $ret = static::getFlags($statement, true);

        $ret['parser'] = $parser;
        $ret['statement'] = $statement;

        if ($statement instanceof SelectStatement) {
            $ret['select_tables'] = array();
            $ret['select_expr'] = array();

            // Finding tables' aliases and their associated real names.
            $tableAliases = array();
            foreach ($statement->from as $expr) {
                if ((isset($expr->table)) && ($expr->table !== '')
                    && (isset($expr->alias)) && ($expr->alias !== '')
                ) {
                    $tableAliases[$expr->alias] = array(
                        $expr->table,
<<<<<<< HEAD
                        isset($expr->database) ? $expr->database : null
=======
                        isset($expr->database) ? $expr->database : null,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                    );
                }
            }

            // Trying to find selected tables only from the select expression.
            // Sometimes, this is not possible because the tables aren't defined
            // explicitly (e.g. SELECT * FROM film, SELECT film_id FROM film).
            foreach ($statement->expr as $expr) {
                if ((isset($expr->table)) && ($expr->table !== '')) {
                    if (isset($tableAliases[$expr->table])) {
                        $arr = $tableAliases[$expr->table];
                    } else {
                        $arr = array(
                            $expr->table,
                            ((isset($expr->database)) && ($expr->database !== '')) ?
<<<<<<< HEAD
                                $expr->database : null
=======
                                $expr->database : null,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                        );
                    }
                    if (!in_array($arr, $ret['select_tables'])) {
                        $ret['select_tables'][] = $arr;
                    }
                } else {
                    $ret['select_expr'][] = $expr->expr;
                }
            }

            // If no tables names were found in the SELECT clause or if there
            // are expressions like * or COUNT(*), etc. tables names should be
            // extracted from the FROM clause.
            if (empty($ret['select_tables'])) {
                foreach ($statement->from as $expr) {
                    if ((isset($expr->table)) && ($expr->table !== '')) {
                        $arr = array(
                            $expr->table,
                            ((isset($expr->database)) && ($expr->database !== '')) ?
<<<<<<< HEAD
                                $expr->database : null
=======
                                $expr->database : null,
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                        );
                        if (!in_array($arr, $ret['select_tables'])) {
                            $ret['select_tables'][] = $arr;
                        }
                    }
                }
            }
        }

        return $ret;
    }

    /**
     * Gets a list of all tables used in this statement.
     *
<<<<<<< HEAD
     * @param Statement $statement Statement to be scanned.
=======
     * @param Statement $statement statement to be scanned
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return array
     */
    public static function getTables($statement)
    {
        $expressions = array();

        if (($statement instanceof InsertStatement)
            || ($statement instanceof ReplaceStatement)
        ) {
            $expressions = array($statement->into->dest);
        } elseif ($statement instanceof UpdateStatement) {
            $expressions = $statement->tables;
        } elseif (($statement instanceof SelectStatement)
            || ($statement instanceof DeleteStatement)
        ) {
            $expressions = $statement->from;
        } elseif (($statement instanceof AlterStatement)
            || ($statement instanceof TruncateStatement)
        ) {
            $expressions = array($statement->table);
        } elseif ($statement instanceof DropStatement) {
            if (!$statement->options->has('TABLE')) {
                // No tables are dropped.
                return array();
            }
            $expressions = $statement->fields;
        } elseif ($statement instanceof RenameStatement) {
            foreach ($statement->renames as $rename) {
                $expressions[] = $rename->old;
            }
        }

        $ret = array();
        foreach ($expressions as $expr) {
            if (!empty($expr->table)) {
                $expr->expr = null; // Force rebuild.
                $expr->alias = null; // Aliases are not required.
                $ret[] = Expression::build($expr);
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
        return $ret;
    }

    /**
     * Gets a specific clause.
     *
<<<<<<< HEAD
     * @param Statement  $statement The parsed query that has to be modified.
     * @param TokensList $list      The list of tokens.
     * @param string     $clause    The clause to be returned.
     * @param int|string $type      The type of the search.
     *                              If int,
     *                                -1 for everything that was before
     *                                 0 only for the clause
     *                                 1 for everything after
     *                              If string, the name of the first clause that
     *                              should not be included.
     * @param bool       $skipFirst Whether to skip the first keyword in clause.
=======
     * @param Statement  $statement the parsed query that has to be modified
     * @param TokensList $list      the list of tokens
     * @param string     $clause    the clause to be returned
     * @param int|string $type      The type of the search.
     *                              If int,
     *                              -1 for everything that was before
     *                              0 only for the clause
     *                              1 for everything after
     *                              If string, the name of the first clause that
     *                              should not be included.
     * @param bool       $skipFirst whether to skip the first keyword in clause
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function getClause($statement, $list, $clause, $type = 0, $skipFirst = true)
    {
<<<<<<< HEAD

        /**
         * The index of the current clause.
         *
         * @var int $currIdx
=======
        /**
         * The index of the current clause.
         *
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $currIdx = 0;

        /**
         * The count of brackets.
         * We keep track of them so we won't insert the clause in a subquery.
         *
<<<<<<< HEAD
         * @var int $brackets
=======
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $brackets = 0;

        /**
         * The string to be returned.
         *
<<<<<<< HEAD
         * @var string $ret
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $ret = '';

        /**
         * The clauses of this type of statement and their index.
         *
<<<<<<< HEAD
         * @var array $clauses
=======
         * @var array
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $clauses = array_flip(array_keys($statement->getClauses()));

        /**
         * Lexer used for lexing the clause.
         *
<<<<<<< HEAD
         * @var Lexer $lexer
=======
         * @var Lexer
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $lexer = new Lexer($clause);

        /**
         * The type of this clause.
         *
<<<<<<< HEAD
         * @var string $clauseType
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $clauseType = $lexer->list->getNextOfType(Token::TYPE_KEYWORD)->value;

        /**
         * The index of this clause.
         *
<<<<<<< HEAD
         * @var int $clauseIdx
=======
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $clauseIdx = $clauses[$clauseType];

        $firstClauseIdx = $clauseIdx;
        $lastClauseIdx = $clauseIdx + 1;

        // Determining the behavior of this function.
        if ($type === -1) {
            $firstClauseIdx = -1; // Something small enough.
            $lastClauseIdx = $clauseIdx - 1;
        } elseif ($type === 1) {
            $firstClauseIdx = $clauseIdx + 1;
            $lastClauseIdx = 10000; // Something big enough.
        } elseif (is_string($type)) {
            if ($clauses[$type] > $clauseIdx) {
                $firstClauseIdx = $clauseIdx + 1;
                $lastClauseIdx = $clauses[$type] - 1;
            } else {
                $firstClauseIdx = $clauses[$type] + 1;
                $lastClauseIdx = $clauseIdx - 1;
            }
        }

        // This option is unavailable for multiple clauses.
        if ($type !== 0) {
            $skipFirst = false;
        }

        for ($i = $statement->first; $i <= $statement->last; ++$i) {
            $token = $list->tokens[$i];

            if ($token->type === Token::TYPE_COMMENT) {
                continue;
            }

            if ($token->type === Token::TYPE_OPERATOR) {
                if ($token->value === '(') {
                    ++$brackets;
                } elseif ($token->value === ')') {
                    --$brackets;
                }
            }

            if ($brackets == 0) {
                // Checking if the section was changed.
                if (($token->type === Token::TYPE_KEYWORD)
                    && (isset($clauses[$token->value]))
                    && ($clauses[$token->value] >= $currIdx)
                ) {
                    $currIdx = $clauses[$token->value];
                    if (($skipFirst) && ($currIdx == $clauseIdx)) {
                        // This token is skipped (not added to the old
                        // clause) because it will be replaced.
                        continue;
                    }
                }
            }

            if (($firstClauseIdx <= $currIdx) && ($currIdx <= $lastClauseIdx)) {
                $ret .= $token->token;
            }
        }

        return trim($ret);
    }

    /**
     * Builds a query by rebuilding the statement from the tokens list supplied
     * and replaces a clause.
     *
     * It is a very basic version of a query builder.
     *
<<<<<<< HEAD
     * @param Statement  $statement The parsed query that has to be modified.
     * @param TokensList $list      The list of tokens.
=======
     * @param Statement  $statement the parsed query that has to be modified
     * @param TokensList $list      the list of tokens
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     * @param string     $old       The type of the clause that should be
     *                              replaced. This can be an entire clause.
     * @param string     $new       The new clause. If this parameter is omitted
     *                              it is considered to be equal with `$old`.
<<<<<<< HEAD
     * @param bool       $onlyType  Whether only the type of the clause should
     *                              be replaced or the entire clause.
=======
     * @param bool       $onlyType  whether only the type of the clause should
     *                              be replaced or the entire clause
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return string
     */
    public static function replaceClause($statement, $list, $old, $new = null, $onlyType = false)
    {
        // TODO: Update the tokens list and the statement.

        if ($new === null) {
            $new = $old;
        }

        if ($onlyType) {
            return static::getClause($statement, $list, $old, -1, false) . ' ' .
                $new . ' ' . static::getClause($statement, $list, $old, 0) . ' ' .
                static::getClause($statement, $list, $old, 1, false);
        }

        return static::getClause($statement, $list, $old, -1, false) . ' ' .
            $new . ' ' . static::getClause($statement, $list, $old, 1, false);
    }

    /**
     * Builds a query by rebuilding the statement from the tokens list supplied
     * and replaces multiple clauses.
     *
<<<<<<< HEAD
     * @param Statement  $statement The parsed query that has to be modified.
     * @param TokensList $list      The list of tokens.
=======
     * @param Statement  $statement the parsed query that has to be modified
     * @param TokensList $list      the list of tokens
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     * @param array      $ops       Clauses to be replaced. Contains multiple
     *                              arrays having two values: array($old, $new).
     *                              Clauses must be sorted.
     *
     * @return string
     */
    public static function replaceClauses($statement, $list, array $ops)
    {
        $count = count($ops);

        // Nothing to do.
        if ($count === 0) {
            return '';
        }

        /**
         * Value to be returned.
         *
<<<<<<< HEAD
         * @var string $ret
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $ret = '';

        // If there is only one clause, `replaceClause()` should be used.
        if ($count === 1) {
            return static::replaceClause(
                $statement,
                $list,
                $ops[0][0],
                $ops[0][1]
            );
        }

        // Adding everything before first replacement.
        $ret .= static::getClause($statement, $list, $ops[0][0], -1) . ' ';

        // Doing replacements.
        for ($i = 0; $i < $count; ++$i) {
            $ret .= $ops[$i][1] . ' ';

            // Adding everything between this and next replacement.
            if ($i + 1 !== $count) {
                $ret .= static::getClause($statement, $list, $ops[$i][0], $ops[$i + 1][0]) . ' ';
            }
        }

        // Adding everything after the last replacement.
        $ret .= static::getClause($statement, $list, $ops[$count - 1][0], 1);

        return $ret;
    }

    /**
     * Gets the first full statement in the query.
     *
<<<<<<< HEAD
     * @param string $query     The query to be analyzed.
     * @param string $delimiter The delimiter to be used.
     *
     * @return array                Array containing the first full query, the
     *                              remaining part of the query and the last
     *                              delimiter.
=======
     * @param string $query     the query to be analyzed
     * @param string $delimiter the delimiter to be used
     *
     * @return array array containing the first full query, the
     *               remaining part of the query and the last
     *               delimiter
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     */
    public static function getFirstStatement($query, $delimiter = null)
    {
        $lexer = new Lexer($query, false, $delimiter);
        $list = $lexer->list;

        /**
         * Whether a full statement was found.
         *
<<<<<<< HEAD
         * @var bool $fullStatement
=======
         * @var bool
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $fullStatement = false;

        /**
         * The first full statement.
         *
<<<<<<< HEAD
         * @var string $statement
=======
         * @var string
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $statement = '';

        for ($list->idx = 0; $list->idx < $list->count; ++$list->idx) {
            $token = $list->tokens[$list->idx];

            if ($token->type === Token::TYPE_COMMENT) {
                continue;
            }

            $statement .= $token->token;

            if (($token->type === Token::TYPE_DELIMITER) && (!empty($token->token))) {
                $delimiter = $token->token;
                $fullStatement = true;
                break;
            }
        }

        // No statement was found so we return the entire query as being the
        // remaining part.
        if (!$fullStatement) {
            return array(null, $query, $delimiter);
        }

        // At least one query was found so we have to build the rest of the
        // remaining query.
        $query = '';
        for (++$list->idx; $list->idx < $list->count; ++$list->idx) {
            $query .= $list->tokens[$list->idx]->token;
        }

        return array(trim($statement), $query, $delimiter);
    }

    /**
     * Gets a starting offset of a specific clause.
     *
<<<<<<< HEAD
     * @param Statement  $statement The parsed query that has to be modified.
     * @param TokensList $list      The list of tokens.
     * @param string     $clause    The clause to be returned.
=======
     * @param Statement  $statement the parsed query that has to be modified
     * @param TokensList $list      the list of tokens
     * @param string     $clause    the clause to be returned
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
     *
     * @return int
     */
    public static function getClauseStartOffset($statement, $list, $clause)
    {
        /**
         * The count of brackets.
         * We keep track of them so we won't insert the clause in a subquery.
         *
<<<<<<< HEAD
         * @var int $brackets
=======
         * @var int
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $brackets = 0;

        /**
         * The clauses of this type of statement and their index.
         *
<<<<<<< HEAD
         * @var array $clauses
=======
         * @var array
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
         */
        $clauses = array_flip(array_keys($statement->getClauses()));

        for ($i = $statement->first; $i <= $statement->last; ++$i) {
            $token = $list->tokens[$i];

            if ($token->type === Token::TYPE_COMMENT) {
                continue;
            }

            if ($token->type === Token::TYPE_OPERATOR) {
                if ($token->value === '(') {
                    ++$brackets;
                } elseif ($token->value === ')') {
                    --$brackets;
                }
            }

            if ($brackets == 0) {
                if (($token->type === Token::TYPE_KEYWORD)
                    && (isset($clauses[$token->value]))
                    && ($clause === $token->value)
                ) {
                    return $i;
<<<<<<< HEAD
=======
                } elseif ($token->value === 'UNION') {
                    return -1;
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
                }
            }
        }

        return -1;
    }
}
