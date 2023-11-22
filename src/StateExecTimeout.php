<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class StateExecTimeOut extends BaseObject
{
    public string|null $single = null;

    public string|null $total = null;
}
