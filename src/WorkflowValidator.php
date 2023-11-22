<?php

declare(strict_types=1);

namespace Serverless\Workflow;

use Swaggest\JsonSchema\Schema;

final class WorkflowValidator
{
    public const SCHEMAS_WORKFLOW_JSON = 'https://serverlessworkflow.io/schemas/0.8/workflow.json';

    public static function validate(Workflow $workflow): void
    {
        $schemaContract = Schema::import(self::SCHEMAS_WORKFLOW_JSON);
        $schemaContract->in(json_decode((string) $workflow->toJson(), null, 512, JSON_THROW_ON_ERROR));
    }
}
