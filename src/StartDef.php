<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class StartDef extends BaseObject
{
    public string|null $stateName = null;

    public string|Schedule|null $schedule = null;
}
