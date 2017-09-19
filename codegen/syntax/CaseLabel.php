<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9338aa0879cb0019ab61f94110bf0bd2>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class CaseLabel extends EditableNode {

  private EditableNode $_keyword;
  private EditableNode $_expression;
  private EditableNode $_colon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $expression,
    EditableNode $colon,
  ) {
    parent::__construct('case_label');
    $this->_keyword = $keyword;
    $this->_expression = $expression;
    $this->_colon = $colon;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['case_keyword'],
      $position,
      $source,
    );
    $position += $keyword->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['case_expression'],
      $position,
      $source,
    );
    $position += $expression->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['case_colon'],
      $position,
      $source,
    );
    $position += $colon->getWidth();
    return new self($keyword, $expression, $colon);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    yield 'keyword' => $this->_keyword;
    yield 'expression' => $this->_expression;
    yield 'colon' => $this->_colon;
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?Traversable<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $expression === $this->_expression &&
      $colon === $this->_colon
    ) {
      return $this;
    }
    return new self($keyword, $expression, $colon);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self($value, $this->_expression, $this->_colon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns CaseToken
   */
  public function getKeyword(): CaseToken {
    return TypeAssert\instance_of(CaseToken::class, $this->_keyword);
  }

  public function getExpressionUNTYPED(): EditableNode {
    return $this->_expression;
  }

  public function withExpression(EditableNode $value): this {
    if ($value === $this->_expression) {
      return $this;
    }
    return new self($this->_keyword, $value, $this->_colon);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @returns LiteralExpression | ScopeResolutionExpression |
   * VariableExpression | PrefixUnaryExpression | QualifiedNameExpression |
   * FunctionCallExpression | ArrayIntrinsicExpression | InstanceofExpression
   */
  public function getExpression(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_expression);
  }

  public function getColonUNTYPED(): EditableNode {
    return $this->_colon;
  }

  public function withColon(EditableNode $value): this {
    if ($value === $this->_colon) {
      return $this;
    }
    return new self($this->_keyword, $this->_expression, $value);
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @returns ColonToken | SemicolonToken
   */
  public function getColon(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_colon);
  }
}
