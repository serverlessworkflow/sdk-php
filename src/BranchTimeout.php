<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class BranchTimeOut extends BaseObject
{
    public string|null $actionExecTimeOut = null;

    public string|null $branchExecTimeOut = null;
}
