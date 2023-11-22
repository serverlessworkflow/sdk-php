<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EventRef extends BaseObject
{
    public string|null $triggerEventRef = null;

    public string|null $resultEventRef = null;

    public string|null $resultEventTimeOut = null;

    /** @var mixed[] */
    public string|array|null $data = null;

    /** @var mixed[] */
    public array|null $contextAttributes = null;

    public string|null $invoke = null;
}
