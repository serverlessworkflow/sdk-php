<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Transition extends BaseObject
{
    public string|null $nextState = null;

    /** @var ProduceEventDef[]|null */
    public array|null $produceEvents = null;

    public bool|null $compensate = null;
}
