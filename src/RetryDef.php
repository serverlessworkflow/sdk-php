<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class RetryDef extends BaseObject
{
    public string|null $name = null;

    public string|null $delay = null;

    public string|null $maxDelay = null;

    public string|null $increment = null;

    public int|string|null $multiplier = null;

    public int|string|null $maxAttempts = null;

    public int|string|null $jitter = null;
}
