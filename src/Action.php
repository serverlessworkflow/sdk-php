<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class Action extends BaseObject
{
    public string|null $id = null;

    public string|null $name = null;

    public string|FunctionRef|null $functionRef = null;

    public EventRef|null $eventRef = null;

    public string|SubFlowRef|null $subFlowRef = null;

    public Sleep|null $sleep = null;

    public string|null $retryRef = null;

    /** @var string[]|null */
    public array|null $nonRetryableErrors = null;

    /** @var string[]|null */
    public array|null $retryableErrors = null;

    public ActionDataFilter|null $actionDataFilter = null;

    public string|null $condition = null;
}
