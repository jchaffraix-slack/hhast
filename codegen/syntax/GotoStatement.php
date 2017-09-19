<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<35465b9c9c7e9e9d0af4c15aa3fd88b9>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class GotoStatement extends EditableNode {

  private EditableNode $_keyword;
  private EditableNode $_label_name;
  private EditableNode $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $label_name,
    EditableNode $semicolon,
  ) {
    parent::__construct('goto_statement');
    $this->_keyword = $keyword;
    $this->_label_name = $label_name;
    $this->_semicolon = $semicolon;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['goto_statement_keyword'],
      $position,
      $source,
    );
    $position += $keyword->getWidth();
    $label_name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['goto_statement_label_name'],
      $position,
      $source,
    );
    $position += $label_name->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['goto_statement_semicolon'],
      $position,
      $source,
    );
    $position += $semicolon->getWidth();
    return new self($keyword, $label_name, $semicolon);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    yield 'keyword' => $this->_keyword;
    yield 'label_name' => $this->_label_name;
    yield 'semicolon' => $this->_semicolon;
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?Traversable<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $label_name = $this->_label_name->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $label_name === $this->_label_name &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new self($keyword, $label_name, $semicolon);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self($value, $this->_label_name, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns GotoToken
   */
  public function getKeyword(): GotoToken {
    return TypeAssert\instance_of(GotoToken::class, $this->_keyword);
  }

  public function getLabelNameUNTYPED(): EditableNode {
    return $this->_label_name;
  }

  public function withLabelName(EditableNode $value): this {
    if ($value === $this->_label_name) {
      return $this;
    }
    return new self($this->_keyword, $value, $this->_semicolon);
  }

  public function hasLabelName(): bool {
    return !$this->_label_name->isMissing();
  }

  /**
   * @returns NameToken
   */
  public function getLabelName(): NameToken {
    return TypeAssert\instance_of(NameToken::class, $this->_label_name);
  }

  public function getSemicolonUNTYPED(): EditableNode {
    return $this->_semicolon;
  }

  public function withSemicolon(EditableNode $value): this {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new self($this->_keyword, $this->_label_name, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }
}
