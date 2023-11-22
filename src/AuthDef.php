<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class AuthDef extends BaseObject
{
    public string|null $name = null;

    public string|null $scheme = null;

    public string|BasicPropsDef|BearerPropsDef|OAuth2PropsDef|null $properties = null;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->scheme ??= 'basic';
    }
}
