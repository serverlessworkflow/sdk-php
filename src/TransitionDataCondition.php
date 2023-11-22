<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class TransitionDataCondition extends BaseObject
{
    public string|null $name = null;

    public string|null $condition = null;

    public string|Transition|null $transition = null;

    public Metadata|null $metadata = null;
}
