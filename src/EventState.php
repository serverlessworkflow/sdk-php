<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EventState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public bool|null $exclusive = null;

    /** @var OnEvents[]|null */
    public array|null $onEvents = null;

    public EventStateTimeOut|null $timeouts = null;

    public StateDataFilter|null $stateDataFilter = null;

    /** @var Error[]|null */
    public array|null $onErrors = null;

    public string|Transition|null $transition = null;

    public bool|End|null $end = null;

    public string|null $compensatedBy = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->exclusive ??= true;
        $this->type ??= 'event';
    }
}
