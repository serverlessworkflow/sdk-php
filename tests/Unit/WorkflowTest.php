<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Serverless\Workflow\Action;
use Serverless\Workflow\ActionDataFilter;
use Serverless\Workflow\FunctionDef;
use Serverless\Workflow\FunctionRef;
use Serverless\Workflow\OperationState;
use Serverless\Workflow\Workflow;
use Serverless\Workflow\WorkflowValidator;

final class WorkflowTest extends TestCase
{
    public string $json;

    public string $yaml;

    public Workflow $workflow;

    protected function setUp(): void
    {
        $this->json = file_get_contents(__DIR__ . '/../Fixtures/workflow.json');
        $this->yaml = file_get_contents(__DIR__ . '/../Fixtures/workflow.yaml');
        $this->workflow = Workflow::fromYaml($this->yaml);
    }

    public function testBuild(): void
    {
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
        $this->assertEquals($this->workflow, $workflow);
    }

    public function testToJson(): void
    {
        $this->assertSame($this->json, $this->workflow->toJson());
    }

    public function testFromJson(): void
    {
        $workflow = Workflow::fromJson($this->json);
        $this->assertEquals($this->workflow, $workflow);
    }

    public function testToYaml(): void
    {
        $this->assertSame($this->yaml, $this->workflow->toYaml());
    }

    public function testFromYaml(): void
    {
        $workflow = Workflow::fromYaml($this->yaml);
        $this->assertEquals($this->workflow, $workflow);
    }

    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();
        WorkflowValidator::validate($this->workflow);
    }
}
