<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EventDataFilter extends BaseObject
{
    public bool|null $useData = null;

    public string|null $data = null;

    public string|null $toStateData = null;
}
