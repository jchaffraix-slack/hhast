<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<06a60674130edf89cd35c2a0e4f1581f>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class TraitUse extends EditableNode {

  private EditableNode $_keyword;
  private EditableNode $_names;
  private EditableNode $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $names,
    EditableNode $semicolon,
  ) {
    parent::__construct('trait_use');
    $this->_keyword = $keyword;
    $this->_names = $names;
    $this->_semicolon = $semicolon;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_keyword'],
      $position,
      $source,
    );
    $position += $keyword->getWidth();
    $names = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_names'],
      $position,
      $source,
    );
    $position += $names->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_semicolon'],
      $position,
      $source,
    );
    $position += $semicolon->getWidth();
    return new self($keyword, $names, $semicolon);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    yield 'keyword' => $this->_keyword;
    yield 'names' => $this->_names;
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
    $names = $this->_names->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $names === $this->_names &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new self($keyword, $names, $semicolon);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self($value, $this->_names, $this->_semicolon);
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

  public function getNamesUNTYPED(): EditableNode {
    return $this->_names;
  }

  public function withNames(EditableNode $value): this {
    if ($value === $this->_names) {
      return $this;
    }
    return new self($this->_keyword, $value, $this->_semicolon);
  }

  public function hasNames(): bool {
    return !$this->_names->isMissing();
  }

  /**
   * @returns EditableList
   */
  public function getNames(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_names);
  }

  public function getSemicolonUNTYPED(): EditableNode {
    return $this->_semicolon;
  }

  public function withSemicolon(EditableNode $value): this {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new self($this->_keyword, $this->_names, $value);
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
