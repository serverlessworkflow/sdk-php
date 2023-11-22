<?php

declare(strict_types=1);

namespace Serverless\Workflow;

use Symfony\Component\Yaml\Yaml;

final class Workflow extends BaseObject
{
    public string|null $id = null;

    public string|null $key = null;

    public string|null $name = null;

    public string|null $description = null;

    public string|null $version = null;

    /** @var string[]|null */
    public array|null $annotations = null;

    public string|DataInputSchema|null $dataInputSchema = null;

    public string|null $secrets = null;

    /** @var mixed[] */
    public string|array|null $constants = null;

    public string|StartDef|null $start = null;

    public string|null $specVersion = null;

    public string|null $expressionLang = null;

    public string|WorkflowTimeOut|null $timeouts = null;

    /** @var mixed[] */
    public string|array|null $errors = null;

    public bool|null $keepActive = null;

    public Metadata|null $metadata = null;

    /** @var mixed[] */
    public string|array|null $events = null;

    /** @var string|FunctionDef[]|null */
    public string|array|null $functions = null;

    public bool|null $autoRetries = null;

    /** @var mixed[] */
    public string|array|null $retries = null;

    /** @var mixed[] */
    public string|array|null $auth = null;

    /** @var State[]|null */
    public array|null $states = null;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->keepActive ??= true;
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        $convertObjectsToArray = static function ($input) use (&$convertObjectsToArray) {
            if (is_object($input)) {
                $input = get_object_vars($input);
            }
            if (is_array($input)) {
                $input = array_filter($input, static fn ($value): bool => $value !== null);

                foreach ($input as $key => $value) {
                    $input[$key] = $convertObjectsToArray($value);
                }
            }
            return $input;
        };

        return $convertObjectsToArray($this);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT) ?: '';
    }

    public static function fromJson(string $json): self
    {
        return new self(json_decode($json, true, 512, JSON_THROW_ON_ERROR));
    }

    public function toYaml(): string
    {
        return Yaml::dump($this->toArray(), 100, 2, Yaml::DUMP_OBJECT_AS_MAP);
    }

    public static function fromYaml(string $yaml): self
    {
        return new self(Yaml::parse($yaml));
    }
}
