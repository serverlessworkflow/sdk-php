<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class OperationState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public bool|End|null $end = null;

    public StateDataFilter|null $stateDataFilter = null;

    public string|null $actionMode = null;

    /** @var Action[]|null */
    public array|null $actions = null;

    public OperationStateTimeOut|null $timeouts = null;

    /** @var Error[]|null */
    public array|null $onErrors = null;

    public string|Transition|null $transition = null;

    public string|null $compensatedBy = null;

    public bool|null $usedForCompensation = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->type ??= 'operation';
        $this->actionMode ??= 'sequential';
        $this->usedForCompensation ??= false;
    }
}
