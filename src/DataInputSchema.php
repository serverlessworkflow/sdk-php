<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class DataInputSchema extends BaseObject
{
    public string|null $schema = null;

    public bool|null $failOnValidationErrors = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->failOnValidationErrors ??= false;
    }
}
