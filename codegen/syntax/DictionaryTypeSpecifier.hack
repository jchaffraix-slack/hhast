/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<68fcb6f18c2c3d761138aaf93aa833b7>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

<<__ConsistentConstruct>>
final class DictionaryTypeSpecifier
  extends EditableNode
  implements ITypeSpecifier {

  const string SYNTAX_KIND = 'dictionary_type_specifier';

  private EditableNode $_keyword;
  private EditableNode $_left_angle;
  private EditableNode $_members;
  private EditableNode $_right_angle;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_angle,
    EditableNode $members,
    EditableNode $right_angle,
    ?__Private\SourceRef $source_ref = null,
  ) {
    $this->_keyword = $keyword;
    $this->_left_angle = $left_angle;
    $this->_members = $members;
    $this->_right_angle = $right_angle;
    parent::__construct($source_ref);
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    string $file,
    int $initial_offset,
    string $source,
  ): this {
    $offset = $initial_offset;
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_type_keyword'],
      $file,
      $offset,
      $source,
    );
    $offset += $keyword->getWidth();
    $left_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_type_left_angle'],
      $file,
      $offset,
      $source,
    );
    $offset += $left_angle->getWidth();
    $members = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_type_members'],
      $file,
      $offset,
      $source,
    );
    $offset += $members->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_type_right_angle'],
      $file,
      $offset,
      $source,
    );
    $offset += $right_angle->getWidth();
    $source_ref = shape(
      'file' => $file,
      'source' => $source,
      'offset' => $initial_offset,
      'width' => $offset - $initial_offset,
    );
    return new static(
      $keyword,
      $left_angle,
      $members,
      $right_angle,
      $source_ref,
    );
  }

  <<__Override>>
  public function getChildren(): dict<string, EditableNode> {
    return dict[
      'keyword' => $this->_keyword,
      'left_angle' => $this->_left_angle,
      'members' => $this->_members,
      'right_angle' => $this->_right_angle,
    ];
  }

  <<__Override>>
  public function rewriteChildren(
    self::TRewriter $rewriter,
    vec<EditableNode> $parents = vec[],
  ): this {
    $parents[] = $this;
    $keyword = $rewriter($this->_keyword, $parents);
    $left_angle = $rewriter($this->_left_angle, $parents);
    $members = $rewriter($this->_members, $parents);
    $right_angle = $rewriter($this->_right_angle, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_angle === $this->_left_angle &&
      $members === $this->_members &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($keyword, $left_angle, $members, $right_angle);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static(
      $value,
      $this->_left_angle,
      $this->_members,
      $this->_right_angle,
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return DictToken
   */
  public function getKeyword(): DictToken {
    return TypeAssert\instance_of(DictToken::class, $this->_keyword);
  }

  /**
   * @return DictToken
   */
  public function getKeywordx(): DictToken {
    return $this->getKeyword();
  }

  public function getLeftAngleUNTYPED(): EditableNode {
    return $this->_left_angle;
  }

  public function withLeftAngle(EditableNode $value): this {
    if ($value === $this->_left_angle) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_members,
      $this->_right_angle,
    );
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAngle(): LessThanToken {
    return TypeAssert\instance_of(LessThanToken::class, $this->_left_angle);
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAnglex(): LessThanToken {
    return $this->getLeftAngle();
  }

  public function getMembersUNTYPED(): EditableNode {
    return $this->_members;
  }

  public function withMembers(EditableNode $value): this {
    if ($value === $this->_members) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $value,
      $this->_right_angle,
    );
  }

  public function hasMembers(): bool {
    return !$this->_members->isMissing();
  }

  /**
   * @return EditableList<ITypeSpecifier> | EditableList<SimpleTypeSpecifier>
   */
  public function getMembers(): EditableList<ITypeSpecifier> {
    return TypeAssert\instance_of(EditableList::class, $this->_members);
  }

  /**
   * @return EditableList<ITypeSpecifier> | EditableList<SimpleTypeSpecifier>
   */
  public function getMembersx(): EditableList<ITypeSpecifier> {
    return $this->getMembers();
  }

  public function getRightAngleUNTYPED(): EditableNode {
    return $this->_right_angle;
  }

  public function withRightAngle(EditableNode $value): this {
    if ($value === $this->_right_angle) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $this->_members,
      $value,
    );
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @return GreaterThanToken
   */
  public function getRightAngle(): GreaterThanToken {
    return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
  }

  /**
   * @return GreaterThanToken
   */
  public function getRightAnglex(): GreaterThanToken {
    return $this->getRightAngle();
  }
}
