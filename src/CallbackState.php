<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class CallbackState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public Action|null $action = null;

    public string|null $eventRef = null;

    public CallbackStateTimeOut|null $timeouts = null;

    public EventDataFilter|null $eventDataFilter = null;

    public StateDataFilter|null $stateDataFilter = null;

    /** @var Error[]|null */
    public array|null $onErrors = null;

    public string|Transition|null $transition = null;

    public bool|End|null $end = null;

    public string|null $compensatedBy = null;

    public bool|null $usedForCompensation = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->usedForCompensation ??= false;
        $this->type ??= 'callback';
    }
}
