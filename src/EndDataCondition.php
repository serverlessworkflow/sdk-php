<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EndDataCondition extends BaseObject
{
    public string|null $name = null;

    public string|null $condition = null;

    public bool|End|null $end = null;

    public Metadata|null $metadata = null;
}
