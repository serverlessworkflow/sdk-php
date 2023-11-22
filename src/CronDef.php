<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class CronDef extends BaseObject
{
    public string|null $expression = null;

    public string|null $validUntil = null;
}
