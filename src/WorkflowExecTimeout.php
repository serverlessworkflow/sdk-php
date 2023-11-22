<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class WorkflowExecTimeOut extends BaseObject
{
    public string|null $duration = null;

    public bool|null $interrupt = null;

    public string|null $runBefore = null;
}
