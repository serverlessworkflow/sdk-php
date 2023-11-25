<?php

declare(strict_types=1);

/**
 * Copyright 2020-Present The Serverless Workflow Specification Authors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
