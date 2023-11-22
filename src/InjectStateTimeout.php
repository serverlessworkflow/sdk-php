<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class InjectStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;
}
