<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Branch extends BaseObject
{
    public string|null $name = null;

    public BranchTimeOut|null $timeouts = null;

    /** @var Action[]|null */
    public array|null $actions = null;
}
