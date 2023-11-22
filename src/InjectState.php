<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class InjectState extends State
{
    public string|null $id = null;

    public string|null $name = null;

    public string|null $type = null;

    public bool|End|null $end = null;

    /** @var mixed[] */
    public string|array|null $data = null;

    public InjectStateTimeOut|null $timeouts = null;

    public StateDataFilter|null $stateDataFilter = null;

    public string|Transition|null $transition = null;

    public string|null $compensatedBy = null;

    public bool|null $usedForCompensation = null;

    public Metadata|null $metadata = null;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->usedForCompensation ??= false;
        $this->type ??= 'inject';
    }
}
