<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ContinueAsDef extends BaseObject
{
    public string|null $workflowId = null;

    public string|null $version = null;

    /** @var mixed[] */
    public array|null $data = null;

    public WorkflowExecTimeOut|null $workflowExecTimeOut = null;
}
