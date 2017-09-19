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

namespace Facebook\HHAST\__Private\Resolution;

use type Facebook\HHAST\{
  EditableNode,
  NamespaceDeclaration,
  NamespaceEmptyBody
};
use namespace Facebook\TypeAssert;
use namespace HH\Lib\{C, Str, Vec};

function get_current_namespace(
  EditableNode $node,
  vec<EditableNode> $parents,
): ?string {
  $parents = vec($parents);

  $namespaces = Vec\filter(
    $parents,
    $parent ==> $parent instanceof NamespaceDeclaration,
  );

  invariant(
    C\count($namespaces) <= 1,
    "Can't nest namespace blocks",
  );

  if (C\is_empty($namespaces)) {
    $namespaces = $parents
      |> C\firstx($$)
      |> $$->getDescendantsOfType(NamespaceDeclaration::class)
      |> Vec\filter(
        $$,
        $ns ==> {
          $body = $ns->getBody();
          return $body->isMissing() || $body instanceof NamespaceEmptyBody;
        },
      );
    invariant(
      C\count($namespaces) <= 1,
      "Can't have multiple namespace declarations",
    );
    if (C\is_empty($namespaces)) {
      return null;
    }
    return C\firstx($namespaces)
      ->getNameUNTYPED()->getCode()
      |> Str\strip_prefix($$, '\\')
      |> Str\trim($$);
  }

  if (C\is_empty($namespaces)) {
    return null;
  }

  return $namespaces
    |> C\firstx($$)
    |> TypeAssert\instance_of(NamespaceDeclaration::class, $$)
    |> $$->getNameUNTYPED()->getCode()
    |> Str\strip_prefix($$, '\\')
    |> Str\trim($$)
    |> $$ === '' ? null : $$;
}
