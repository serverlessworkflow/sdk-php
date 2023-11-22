<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ForEachStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;

    public string|null $actionExecTimeOut = null;

    public string|null $eventTimeOut = null;
}
