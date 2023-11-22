<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class OnEvents extends BaseObject
{
    /** @var string[]|null */
    public array|null $eventRefs = null;

    public string|null $actionMode = null;

    /** @var Action[]|null */
    public array|null $actions = null;

    public EventDataFilter|null $eventDataFilter = null;
}
