<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ProduceEventDef extends BaseObject
{
    public string|null $eventRef = null;

    /** @var mixed[] */
    public string|array|null $data = null;

    /** @var mixed[] */
    public array|null $contextAttributes = null;
}
