# Serverless Workflow Specification - PHP SDK

Provides the PHP API/SPI for the [Serverless Workflow Specification](https://github.com/serverlessworkflow/specification).

With the SDK you can:
* Programmatically build workflow definitions 
* Parse workflow JSON and YAML definitions
* Validate workflow definitions

### Status

Current SDK version conforms to the [Serverless Workflow specification v0.8](https://github.com/serverlessworkflow/specification/tree/0.8.x).


## Installation

```bash
composer install serverlessworkflow/sdk
```

## Build 

```php
use Serverless\Workflow\Action;
use Serverless\Workflow\ActionDataFilter;
use Serverless\Workflow\FunctionDef;
use Serverless\Workflow\FunctionRef;
use Serverless\Workflow\OperationState;
use Serverless\Workflow\Workflow;

$workflow = new Workflow([
    'id' => 'greeting',
    'name' => 'Greeting Workflow',
    'description' => 'Greet Someone',
    'version' => '1.0',
    'specVersion' => '0.8',
    'start' => 'Greet',
    'states' => [
        new OperationState([
            'name' => 'Greet',
            'type' => 'operation',
            'actions' => [
                new Action([
                    'functionRef' => new FunctionRef([
                        'refName' => 'greetingFunction',
                        'arguments' => [
                            'name' => '${ .person.name }',
                        ],
                    ]),
                    'actionDataFilter' => new ActionDataFilter([
                        'results' => '${ .greeting }',
                    ]),
                ]),
            ],
            'end' => true,
        ]),
    ],
    'functions' => [
        new FunctionDef([
            'name' => 'greetingFunction',
            'operation' => 'file://myapis/greetingapis.json#greeting',
        ]),
    ],
]);
```

## Parse

### Convert from JSON/YAML source

```php
$workflow = Workflow::fromJson(file_get_contents('workflow.json'));

$workflow = Workflow::fromYaml(file_get_contents('workflow.yaml'));
```

### Convert to JSON/YAML

```php
$json = $workflow->toJson();

$yaml = $workflow->toYaml();
```

## Validate

```php
use Serverless\Workflow\WorkflowValidator;

WorkflowValidator::validate($workflow);
```

The `validate` method will raise an exception if the provided workflow does not comply with the specification.
