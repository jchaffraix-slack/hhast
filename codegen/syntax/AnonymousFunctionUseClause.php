<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9fe504aeb304116de9b5da44f7ba8dbd>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class AnonymousFunctionUseClause extends EditableNode {

  private EditableNode $_keyword;
  private EditableNode $_left_paren;
  private EditableNode $_variables;
  private EditableNode $_right_paren;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $variables,
    EditableNode $right_paren,
  ) {
    parent::__construct('anonymous_function_use_clause');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_variables = $variables;
    $this->_right_paren = $right_paren;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_use_keyword'],
      $position,
      $source,
    );
    $position += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_use_left_paren'],
      $position,
      $source,
    );
    $position += $left_paren->getWidth();
    $variables = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_use_variables'],
      $position,
      $source,
    );
    $position += $variables->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_use_right_paren'],
      $position,
      $source,
    );
    $position += $right_paren->getWidth();
    return new self($keyword, $left_paren, $variables, $right_paren);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    yield 'keyword' => $this->_keyword;
    yield 'left_paren' => $this->_left_paren;
    yield 'variables' => $this->_variables;
    yield 'right_paren' => $this->_right_paren;
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?Traversable<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $variables = $this->_variables->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $variables === $this->_variables &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new self($keyword, $left_paren, $variables, $right_paren);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self(
      $value,
      $this->_left_paren,
      $this->_variables,
      $this->_right_paren,
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns UseToken
   */
  public function getKeyword(): UseToken {
    return TypeAssert\instance_of(UseToken::class, $this->_keyword);
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  public function withLeftParen(EditableNode $value): this {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return
      new self($this->_keyword, $value, $this->_variables, $this->_right_paren);
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  public function getVariablesUNTYPED(): EditableNode {
    return $this->_variables;
  }

  public function withVariables(EditableNode $value): this {
    if ($value === $this->_variables) {
      return $this;
    }
    return new self(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
    );
  }

  public function hasVariables(): bool {
    return !$this->_variables->isMissing();
  }

  /**
   * @returns EditableList
   */
  public function getVariables(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_variables);
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  public function withRightParen(EditableNode $value): this {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return
      new self($this->_keyword, $this->_left_paren, $this->_variables, $value);
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParen(): RightParenToken {
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }
}
