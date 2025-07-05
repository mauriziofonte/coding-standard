<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard\Ruleset;

final class CmsRuleset extends AbstractRuleset
{
    protected $name = 'mfonte-csrs-cms';

    /**
     * @psalm-var array<string, bool|array>
     */
    protected $rules = [

        /* -----------------------------------------------------------------
         |  Baseline presets
         * ----------------------------------------------------------------- */

        // PSR-12 core
        // before: function foo(){}  after: function foo() {}
        '@PSR12' => true,

        // Symfony safe rules
        '@Symfony' => true,

        // Symfony risky rules
        '@Symfony:risky' => true,

        /* -----------------------------------------------------------------
         |  Array & list style
         * ----------------------------------------------------------------- */

        // Enforce short [] syntax
        // before: $a = array(1, 2);  after: $a = [1, 2];
        'array_syntax' => ['syntax' => 'short'],

        // Space around binary operators, align =>
        // before: $a=1; $b =>2;  after: $a = 1; $b => 2;
        'binary_operator_spaces' => [
            'default'   => 'single_space',
            'operators' => ['=>' => null],
        ],

        /* -----------------------------------------------------------------
         |  Blank-line conventions
         * ----------------------------------------------------------------- */

        // One blank line after namespace
        // before: namespace Foo; class Bar {}  after: namespace Foo;\n\nclass Bar {}
        'blank_line_after_namespace' => true,

        // One blank line after opening <?php tag
        // before: <?php echo 1;  after: <?php\n\necho 1;
        'blank_line_after_opening_tag' => true,

        // Blank line before return
        // before: if($x){return;}  after: if ($x) {\n    return;\n}
        'blank_line_before_statement' => ['statements' => ['return']],

        /* -----------------------------------------------------------------
         |  Braces & structure
         * ----------------------------------------------------------------- */

        // Mandatory braces, K&R style
        // before: if($a) echo 1;  after: if ($a) {\n    echo 1;\n}
        'braces' => true,

        // Cast must be followed by a single space
        // before: (int)$x  after: (int) $x
        'cast_spaces' => true,

        // Separate class elements (1 blank line between methods)
        // ---
        'class_attributes_separation' => [
            'elements' => [
                'method'       => 'one',
                'trait_import' => 'none',
            ],
        ],

        // Normalize definition spacing
        // before: class  Foo{}  after: class Foo {}
        'class_definition' => true,

        /* -----------------------------------------------------------------
         |  DECLARE & strict types
         * ----------------------------------------------------------------- */

        // Spaces around equals in declare
        // before: declare(strict_types=1);  after: declare(strict_types = 1);
        'declare_equal_normalize' => true,

        // Add declare(strict_types=1) at top
        // before: <?php echo 1;  after: <?php declare(strict_types=1);\n\necho 1;
        'declare_strict_types' => true,

        /* -----------------------------------------------------------------
         |  Control keywords & casing
         * ----------------------------------------------------------------- */

        // else if  ➜  elseif
        'elseif' => true,

        // UTF-8, no BOM
        'encoding' => true,

        // Use long <?php tag only
        'full_opening_tag' => true,

        // Reduce fully-qualified names in type hints
        'fully_qualified_strict_types' => true,

        // Function declaration formatting
        'function_declaration' => true,

        // Space between typehint and variable
        'function_typehint_space' => true,

        // heredoc ➜ nowdoc if no interpolation
        'heredoc_to_nowdoc' => true,

        // include/require formatting
        'include' => true,

        // i++ (post) instead of ++i
        'increment_style' => ['style' => 'post'],

        // 4-space indentation
        'indentation_type' => true,

        // Linebreak right after <?php
        'linebreak_after_opening_tag' => true,

        // LF endings
        'line_ending' => true,

        // (int) in lowercase
        'lowercase_cast' => true,

        // true / false / null lowercase
        'constant_case' => ['case' => 'lower'],

        // if, else, etc. lowercase
        'lowercase_keywords' => true,

        // self/static/parent lowercase
        'lowercase_static_reference' => true,

        // __construct not __CONSTRUCT
        'magic_method_casing' => true,

        // __DIR__ not __dir__
        'magic_constant_casing' => true,

        // Spaces in argument lists
        'method_argument_space' => true,

        // strtolower not STRTOLOWER
        'native_function_casing' => true,

        // trim() not chop() (risky)
        'no_alias_functions' => true,

        /* -----------------------------------------------------------------
         |  Whitespace cleanup
         * ----------------------------------------------------------------- */

        // Removes redundant blank lines (here after throw/use blocks, and anywhere “extra”)
        // before: use Foo\A;\n\n\nuse Foo\B;   after: use Foo\A;\nuse Foo\B;
        'no_extra_blank_lines' => [
            'tokens' => ['extra', 'throw', 'use'],
        ],

        // Disallow a blank line right after “class Foo {”
        // before: class Foo {\n\n    public function bar() {}   after: class Foo {\n    public function bar() {}
        'no_blank_lines_after_class_opening' => true,

        // Disallow blank lines between a PHPDoc block and the code it documents
        // before: /** ... */\n\nfunction foo() {}   after: /** ... */\nfunction foo() {}
        'no_blank_lines_after_phpdoc' => true,

        // Forbid closing PHP tag in PHP-only files
        // before: ... QUESTION_MARK>   after: ... (tag removed)
        'no_closing_tag' => true,

        // Remove empty /** */ blocks
        // before: /** */   after: (deleted)
        'no_empty_phpdoc' => true,

        // Delete empty statements “;”
        // before: if ($x) { ; }   after: if ($x) { }
        'no_empty_statement' => true,

        // Remove leading backslash in “use \Foo\Bar;”
        // before: use \Foo\Bar;   after: use Foo\Bar;
        'no_leading_import_slash' => true,

        // Strip spaces before first namespace segment
        // before: <?php\n \nnamespace Foo;   after: <?php\nnamespace Foo;
        'no_leading_namespace_whitespace' => true,

        // Echo preferred over print
        // before: print "x";   after: echo "x";
        'no_mixed_echo_print' => ['use' => 'echo'],

        // Ban spaces around “=>” on separate lines
        // before: [ 1  =>\n 2 ]   after: [ 1 =>\n 2 ]
        'no_multiline_whitespace_around_double_arrow' => true,

        // No line-ending spaces before “;” in multiline statements
        // before: $a = 1\n    ;   after: $a = 1\n;
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],

        // Force explicit casts instead of (bool) shortcuts
        // before: (boolean) $x   after: (bool) $x
        'no_short_bool_cast' => true,

        // Disallow trailing spaces before “;” on single line
        // before: $x = 1 ;   after: $x = 1;
        'no_singleline_whitespace_before_semicolons' => true,

        // No space between function name and “(”
        // before: foo ()   after: foo()
        'no_spaces_after_function_name' => true,

        // Prevent spaces around array offsets
        // before: $a[ 0 ]   after: $a[0]
        'no_spaces_around_offset' => true,

        // No interior spaces: foo( $x ) → foo($x)
        'no_spaces_inside_parenthesis' => true,

        // Disallow trailing comma in list() calls
        // before: list($a, ) = $b;   after: list($a) = $b;
        'no_trailing_comma_in_list_call' => true,

        // Disallow trailing comma in single-line arrays
        // before: [1,2,]   after: [1,2]
        'no_trailing_comma_in_singleline_array' => true,

        // Remove end-of-line spaces
        // before: "foo  \n"   after: "foo\n"
        'no_trailing_whitespace' => true,

        // Remove trailing whitespace inside comments
        // before: // foo␠\n   after: // foo\n
        'no_trailing_whitespace_in_comment' => true,

        // Drop useless parentheses around control conditions
        // before: if (($a)) {}   after: if ($a) {}
        'no_unneeded_control_parentheses' => true,

        // Remove unreachable default argument values
        // before: function foo($a = 1, $b = 2) {} foo(1);   after: function foo($a, $b = 2) {} foo(1);
        'no_unreachable_default_argument_value' => true,

        // Remove “return;” at end of void functions
        // before: function x() { return; }   after: function x() {}
        'no_useless_return' => true,

        // No space before comma ­in arrays
        // before: [1 ,2]   after: [1, 2]
        'no_whitespace_before_comma_in_array' => true,

        // Line with only spaces becomes empty
        // before: "foo\n␠␠\nbar"   after: "foo\n\nbar"
        'no_whitespace_in_blank_line' => true,

        // Use [] not {} for array index on strings
        // before: $s{0}   after: $s[0]
        'normalize_index_brace' => true,

        // Force space after “!” (not) operator
        // before: if(!$x)   after: if (! $x)
        'not_operator_with_successor_space' => true,

        // No whitespace before “->”
        // before: $obj ->method();   after: $obj->method();
        'object_operator_without_whitespace' => true,

        /* -----------------------------------------------------------------
         |  Imports & ordering
         * ----------------------------------------------------------------- */

        // use Alpha\A; use Beta\B;
        'ordered_imports' => ['sort_algorithm' => 'alpha'],

        /* -----------------------------------------------------------------
         |  PHPDoc
         * ----------------------------------------------------------------- */

        // Indent PHPDoc one level deeper than code it documents
        // before:
        // function foo() {
        ///** Doc */
        // }
        // after:
        // function foo() {
        /** Doc */
        // }
        'phpdoc_indent' => true,

        // Convert inline tags to canonical form
        // before: {@link  URL}   after: {@see URL}
        'phpdoc_inline_tag_normalizer' => true,

        // Remove @access tags (public/protected/private)
        // before: /** @access public */   after: /** */
        'phpdoc_no_access' => true,

        // Delete @package/@subpackage tags
        // before: /** @package MyLib */   after: /** */
        'phpdoc_no_package' => true,

        // Drop useless {@inheritdoc} when it’s the only content
        // before: /** {@inheritdoc} */   after: /** */
        'phpdoc_no_useless_inheritdoc' => true,

        // Convert int/bool to full names
        // before: @param int $x  after: @param integer $x
        'phpdoc_scalar' => true,

        // Enforce one space between var name and description
        // before: @var string  foo   after: @var string foo
        'phpdoc_single_line_var_spacing' => true,

        // Ensure first sentence ends with a period
        // before: /** Do stuff */  after: /** Do stuff. */
        'phpdoc_summary' => true,

        // Change empty PHPDoc into /* */ comment
        // before: /**  */   after: /*  */
        'phpdoc_to_comment' => true,

        // Strip leading/trailing blank lines inside block
        // before: /**\n *\n * Desc\n */   after: /**\n * Desc\n */
        'phpdoc_trim' => true,

        // Normalize type lists (int|string → string|int) & remove duplicates
        // before: @param int|int|string $a   after: @param int|string $a
        'phpdoc_types' => true,

        // Remove "$var" name when redundant
        // before: @var int $count   after: @var int
        'phpdoc_var_without_name' => true,

        /* -----------------------------------------------------------------
         |  Autoloading / PSR
         * ----------------------------------------------------------------- */

        // Validate PSR-4/PSR-0 autoloading: file ↔ class name must match
        // before:  src/Model/User.php  contains class  App\Foo\Bar
        // after:   src/Model/User.php  contains class  App\Model\User
        'psr_autoloading' => true,

        // Replace $this->foo() with self::foo() when possible (private / static analysis)
        // before: $this->helper();   after: self::helper();
        'self_accessor' => true,

        /* -----------------------------------------------------------------
        |  Minor language refinements
        * ----------------------------------------------------------------- */

        // Keep disabled: converts “return null;” at the end of a void-returning function
        // before: function foo(): void { return null; }   after: function foo(): void {}
        // (left false because Laravel often relies on `return null` semantics)
        'simplified_null_return' => false,

        /* -----------------------------------------------------------------
        |  Formatting one-liners
        * ----------------------------------------------------------------- */
        
        // Exactly one blank line at EOF
        // before: …}\n\n\n   after: …}\n
        'single_blank_line_at_eof' => true,

        // One blank line before the namespace declaration
        // before: <?php\nnamespace App;   after: <?php\n\nnamespace App;
        'single_blank_line_before_namespace' => true,

        // Only one element (const / property / method) per class statement
        // before: public $a, $b;   after: public $a; \n public $b;
        'single_class_element_per_statement' => true,

        // One “use …;” per line
        // before: use A, B;   after: use A;\nuse B;
        'single_import_per_statement' => true,

        // Require a blank line after the imports block
        // before: use Foo\Bar;\nclass X{}   after: use Foo\Bar;\n\nclass X{}
        'single_line_after_imports' => true,

        // Normalise single-line comments; forbid “#”
        // before: # comment   after: // comment
        'single_line_comment_style' => ['comment_types' => ['hash']],

        // Allow `throw new Foo();` to stay on a single line inside method bodies
        // before: throw\n    new Foo();   after: throw new Foo();
        'single_line_throw' => true,

        // One trait per “use”
        // before: use T1, T2;   after: use T1;\nuse T2;
        'single_trait_insert_per_statement' => true,

        // Require space after “;” except in for(;;)
        // before: for($i=0;$i<10;$i++){}   after: for ($i = 0; $i < 10; $i++) {}
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],

        /* -----------------------------------------------------------------
        |  Operators and comparisons
        * ----------------------------------------------------------------- */

        // ++$i ➜ $i++ / --$i ➜ $i-- for consistency
        // before: ++$i;   after: $i++;
        'standardize_increment' => true,

        // Always use “!=” not “<>”
        // before: if ($a <> $b)   after: if ($a != $b)
        'standardize_not_equals' => true,

        // Convert “case 1;” to “case 1:” in switch
        // before: case 1;   after: case 1:
        'switch_case_semicolon_to_colon' => true,

        // Ensure single space after “case”
        // before: case 1:   after: case 1 :
        'switch_case_space' => true,

        // Ensure spaces around ? and : in ternary
        // before: $a?$b:$c   after: $a ? $b : $c
        'ternary_operator_spaces' => true,

        // Force trailing comma in multi-line arrays
        // before: [\n    1,\n    2\n]   after: [\n    1,\n    2,\n]
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],

        /* -----------------------------------------------------------------
        |  Arrays & expressions
        * ----------------------------------------------------------------- */

        // Remove spaces inside “[ 1, 2 ]”
        // before: [ 1, 2 ]   after: [1, 2]
        'trim_array_spaces' => true,

        // Normalise spaces around unary “! + -”
        // before: if(!$a) — after: if (! $a)
        'unary_operator_spaces' => true,

        /* -----------------------------------------------------------------
        |  Visibility & commas
        * ----------------------------------------------------------------- */

        // Enforce visibility on class members
        // before: function foo(){}   after: public function foo() {}
        'visibility_required' => ['elements' => ['method', 'property']],

        // Enforce space after “,” inside arrays
        // before: [1,2]  after: [1, 2]
        'whitespace_after_comma_in_array' => true,

        /* -----------------------------------------------------------------
        |  “Modern extras”
        * ----------------------------------------------------------------- */

        // Sort constants, properties and methods in a canonical order
        'ordered_class_elements' => true,

        // Move the binary/operator symbol to end-of-line on multiline expressions
        'operator_linebreak' => ['position' => 'end'],

        // Append `: void` to functions that intentionally return nothing
        // before: function log($x) { echo $x; }
        // after:  function log($x): void { echo $x; }
        'void_return' => true,

        // Prefix native constants with a backslash inside namespaces
        // before: namespace App; echo PHP_VERSION;
        // after:  namespace App; echo \PHP_VERSION;
        'native_constant_invocation' => true,

        // Prefix native functions and allow per-class whitelisting
        // before: namespace App; strlen('x');
        // after:  namespace App; \strlen('x');
        'native_function_invocation' => ['include' => ['@all']],

        /* Immutable dates encourage safer code */
        // before: new \DateTime();
        // after:  new \DateTimeImmutable();
        'date_time_immutable' => true,

        // Remove `else`/`elseif` blocks that can never run after a return/throw
        'no_useless_else' => true,

        /* -----------------------------------------------------------------
        |  PHPUnit specific
        * ----------------------------------------------------------------- */

        // Mark test helper classes as @internal to avoid exposing them to users
        // before: class FooTestHelper {}
        // after:  /** @internal */ class FooTestHelper {}
        'php_unit_internal_class' => true,

        // Enforce camelCase for test method names (setUp, testSomething)
        // before: public function test_something() {}
        // after:  public function testSomething() {}
        'php_unit_method_casing' => ['case' => 'camel_case'],
    ];
}
