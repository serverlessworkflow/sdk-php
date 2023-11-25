<?php

declare(strict_types=1);

/**
* Copyright 2020-Present The Serverless Workflow Specification Authors
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\AssignmentInConditionSniff;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\StaticLambdaFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoEmptyReturnFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer;
use Symplify\CodingStandard\Fixer\LineLength\DocBlockLineLengthFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([SetList::PSR_12, SetList::SYMPLIFY, SetList::COMMON, SetList::CLEAN_CODE]);

    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $ecsConfig->ruleWithConfiguration(NoSuperfluousPhpdocTagsFixer::class, [
        'allow_mixed' => true,
    ]);

    $ecsConfig->ruleWithConfiguration(GeneralPhpdocAnnotationRemoveFixer::class, [
        'annotations' => [
            'throw',
            'throws',
            'author',
            'authors',
            'package',
            'group',
            'required',
            'phpstan-ignore-line',
            'phpstan-ignore-next-line',
        ],
    ]);

    $ecsConfig->rule(StaticLambdaFixer::class);

    $ecsConfig->skip([
        '*/Source/*',
        '*/Fixture/*',
        '*/Expected/*',

        // buggy - @todo fix on Symplify master
        DocBlockLineLengthFixer::class,

        PhpdocTypesFixer::class => [
            // double to Double false positive
            __DIR__ . '/rules/Php74/Rector/Double/RealToFloatTypeCastRector.php',
            // skip for enum types
            __DIR__ . '/rules/Php70/Rector/MethodCall/ThisCallOnStaticMethodToStaticCallRector.php',
        ],

        // breaking and handled better by Rector PHPUnit code quality set, removed in symplify dev-main
        PhpUnitStrictFixer::class,

        // skip add space on &$variable
        FunctionTypehintSpaceFixer::class => [
            __DIR__ . '/src/PhpParser/Printer/BetterStandardPrinter.php',
            __DIR__ . '/src/DependencyInjection/Loader/Configurator/RectorServiceConfigurator.php',
            __DIR__ . '/rules/Php70/EregToPcreTransformer.php',
        ],

        AssignmentInConditionSniff::class . '.FoundInWhileCondition',

        // null on purpose as no change
        PhpdocNoEmptyReturnFixer::class => [
            __DIR__ . '/rules/DeadCode/Rector/ConstFetch/RemovePhpVersionIdCheckRector.php',
        ],
    ]);
};