<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EndEventCondition extends BaseObject
{
    public string|null $name = null;

    public string|null $eventRef = null;

    public bool|End|null $end = null;

    public EventDataFilter|null $eventDataFilter = null;

    public Metadata|null $metadata = null;
}
