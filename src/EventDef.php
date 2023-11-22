<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class EventDef extends BaseObject
{
    public string|null $name = null;

    public string|null $source = null;

    public string|null $type = null;

    public string|null $kind = null;

    /** @var CorrelationDef|CorrelationDef[]|null */
    public CorrelationDef|array|null $correlation = null;

    public bool|null $dataOnly = null;

    public Metadata|null $metadata = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->kind ??= 'consumed';
        $this->dataOnly ??= true;
    }
}
