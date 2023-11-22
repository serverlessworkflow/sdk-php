<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class StateDataFilter extends BaseObject
{
    public string|null $input = null;

    public string|null $output = null;
}
