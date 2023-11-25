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

class State extends BaseObject
{
    public string|null $type = null;

    public function isEventState(): bool
    {
        return $this->type === 'event';
    }

    public function isOperationState(): bool
    {
        return $this->type === 'operation';
    }

    public function isSwitchState(): bool
    {
        return $this->type === 'switch';
    }

    public function isSleepState(): bool
    {
        return $this->type === 'sleep';
    }

    public function isParallelState(): bool
    {
        return $this->type === 'parallel';
    }

    public function isInjectState(): bool
    {
        return $this->type === 'inject';
    }

    public function isForeachState(): bool
    {
        return $this->type === 'foreach';
    }

    public function isCallbackState(): bool
    {
        return $this->type === 'callback';
    }
}
