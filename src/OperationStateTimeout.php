<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class OperationStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;

    public string|null $actionExecTimeOut = null;
}
