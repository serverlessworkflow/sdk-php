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

final class EventBasedSwitchState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public StateDataFilter|null $stateDataFilter = null;

    public EventBasedSwitchStateTimeOut|null $timeouts = null;

    /** @var TransitionEventCondition[]|EndEventCondition[]|null */
    public array|null $eventConditions = null;  // Eventcondition

    /** @var Error[]|null */
    public array|null $onErrors = null;

    public DefaultConditionDef|null $defaultCondition = null;

    public string|null $compensatedBy = null;

    public bool|null $usedForCompensation = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->usedForCompensation ??= false;
        $this->type ??= 'switch';
    }
}
