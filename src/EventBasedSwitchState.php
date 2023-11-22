<?php

declare(strict_types=1);

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
