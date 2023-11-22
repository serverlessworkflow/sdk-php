<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class DefaultConditionDef extends BaseObject
{
    public string|Transition|null $transition = null;

    public bool|End|null $end = null;
}
