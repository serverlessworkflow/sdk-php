<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class FunctionRef extends BaseObject
{
    public string|null $refName = null;

    /** @var mixed[] */
    public array|null $arguments = null;

    public string|null $selectionSet = null;

    public string|null $invoke = null;
}
