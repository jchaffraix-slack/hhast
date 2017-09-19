<?hh // strict
/**
 * Copyright (c) 2016, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same
 * directory.
 *
 */

namespace Facebook\HHAST\Linters;

use type Facebook\HHAST\EditableNode;
use namespace Facebook\HHAST;

abstract class AutoFixingASTLinter<Tnode as EditableNode>
extends ASTLinter<Tnode>
implements AutoFixingLinter<ASTLintError<Tnode, this>>{

  abstract public function getFixedNode(Tnode $node): Tnode;

  final public function getCodeWithFixedLintErrors(
    Traversable<ASTLintError<Tnode, this>> $errors,
  ): string {
    $ast = $this->getAST();
    foreach ($errors as $error) {
      invariant(
        $error->getFile() === $this->getFile(),
        "Can't fix errors in another file",
      );
      invariant(
        $error->getLinter() === $this,
        "Can't fix errors from another linter",
      );
      $old = $error->getBlameNode();
      $new = $this->getFixedNode($old);
      $ast = $ast->replace($new, $old);
    }
    return $ast->getCode();
  }
}
