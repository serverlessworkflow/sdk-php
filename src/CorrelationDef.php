<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class CorrelationDef extends BaseObject
{
    public string|null $contextAttributeName = null;

    public string|null $contextAttributeValue = null;
}
