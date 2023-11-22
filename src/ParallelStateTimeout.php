<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ParallelStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;

    public string|null $branchExecTimeOut = null;
}
