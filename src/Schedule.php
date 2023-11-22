<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Schedule extends BaseObject
{
    public string|null $interval = null;

    public string|CronDef|null $cron = null;

    public string|null $timezone = null;
}
