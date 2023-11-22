<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class End extends BaseObject
{
    public bool|null $terminate = null;

    /** @var ProduceEventDef[]|null */
    public array|null $produceEvents = null;

    public bool|null $compensate = null;

    public string|ContinueAsDef|null $continueAs = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->terminate ??= false;
        $this->compensate ??= false;
    }
}
