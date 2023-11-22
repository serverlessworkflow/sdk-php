<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Error extends BaseObject
{
    public string|null $errorRef = null;

    /** @var string[]|null */
    public array|null $errorRefs = null;

    public string|Transition|null $transition = null;

    public bool|End|null $end = null;
}
