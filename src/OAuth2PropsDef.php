<?php

declare(strict_types=1);

namespace Serverless\Workflow;

final class OAuth2PropsDef extends BaseObject
{
    public string|null $authority = null;

    public string|null $grantType = null;

    public string|null $clientId = null;

    public string|null $clientSecret = null;

    /** @var string[] */
    public array|null $scopes = null;

    public string|null $username = null;

    public string|null $password = null;

    /** @var string[] */
    public array|null $audiences = null;

    public string|null $subjectToken = null;

    public string|null $requestedSubject = null;

    public string|null $requestedIssuer = null;

    public Metadata|null $metadata = null;
}
