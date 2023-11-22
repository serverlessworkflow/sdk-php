<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ErrorDef extends BaseObject
{
    public string|null $name = null;

    public string|null $code = null;

    public string|null $description = null;
}
