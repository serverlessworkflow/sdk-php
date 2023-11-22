<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class BearerPropsDef extends BaseObject
{
    public string|null $token = null;

    public Metadata|null $metadata = null;
}
