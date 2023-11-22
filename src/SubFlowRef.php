<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class SubFlowRef extends BaseObject
{
    public string|null $workflowId = null;

    public string|null $version = null;

    public string|null $onParentComplete = null;

    public string|null $invoke = null;
}
