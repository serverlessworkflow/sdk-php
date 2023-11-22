<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ActionDataFilter extends BaseObject
{
    public string|null $fromStateData = null;

    public bool|null $useResults = null;

    public string|null $results = null;

    public string|null $toStateData = null;
}
