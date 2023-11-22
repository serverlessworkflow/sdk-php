<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class SleepStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;
}
