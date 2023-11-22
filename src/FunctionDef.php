<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class FunctionDef extends BaseObject
{
    public string|null $name = null;

    public string|null $operation = null;

    public string|null $type = null;

    public string|null $authRef = null;

    public Metadata|null $metadata = null;
}
