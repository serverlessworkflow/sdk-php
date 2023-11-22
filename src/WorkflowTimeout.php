<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class WorkflowTimeOut extends BaseObject
{
    public WorkflowExecTimeOut|null $workflowExecTimeOut = null;

    public StateExecTimeOut|null $stateExecTimeOut = null;

    public string|null $actionExecTimeOut = null;

    public string|null $branchExecTimeOut = null;

    public string|null $eventTimeOut = null;
}
