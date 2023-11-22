<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class TransitionEventCondition extends BaseObject
{
    public string|null $name = null;

    public string|null $eventRef = null;

    public string|Transition|null $transition = null;

    public EventDataFilter|null $eventDataFilter = null;

    public Metadata|null $metadata = null;
}
