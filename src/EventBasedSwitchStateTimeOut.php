<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EventBasedSwitchStateTimeOut extends BaseObject
{
    public StateExecTimeOut|null $stateExecTimeOut = null;

    public string|null $eventTimeOut = null;
}
