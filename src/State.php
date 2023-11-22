<?php

declare(strict_types=1);

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
