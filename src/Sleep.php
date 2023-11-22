<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Sleep extends BaseObject
{
    public string|null $before = null;

    public string|null $after = null;
}
