<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class ForEachState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public bool|End|null $end = null;

    public string|null $inputCollection = null;

    public string|null $outputCollection = null;

    public string|null $iterationParam = null;

    public int|string|null $batchSize = null;

    /** @var Action[]|null */
    public array|null $actions = null;

    public ForEachStateTimeOut|null $timeouts = null;

    public StateDataFilter|null $stateDataFilter = null;

    /** @var Error[]|null */
    public array|null $onErrors = null;

    public string|Transition|null $transition = null;

    public string|null $compensatedBy = null;

    public bool|null $usedForCompensation = null;

    public string|null $mode = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->usedForCompensation ??= false;
        $this->mode ??= 'parallel';
        $this->type ??= 'foreach';
    }
}
