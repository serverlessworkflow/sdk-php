<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class BasicPropsDef extends BaseObject
{
    public string|null $username = null;

    public string|null $password = null;

    public Metadata|null $metadata = null;
}
