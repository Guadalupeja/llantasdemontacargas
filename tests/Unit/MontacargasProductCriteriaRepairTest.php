<?php

namespace Tests\Unit;

use App\Services\MontacargasProductSearchService;
use ReflectionClass;
use Tests\TestCase;

class MontacargasProductCriteriaRepairTest extends TestCase
{
    private function repair(array $criteria): array
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'repairMisclassifiedModelCriteria'
        );

        $method->setAccessible(true);

        return $method->invoke(
            $service,
            $criteria
        );
    }

    public function test_ps1000_suffix_misclassified_as_function_is_restored_to_model(): void
    {
        $result = $this->repair([
            'model' => 'PS1000',
            'function' => 'SM FL MP',
            'tread' => 'lisa',
        ]);

        $this->assertSame(
            'PS1000 SM FL MP',
            $result['model']
        );

        $this->assertArrayNotHasKey(
            'function',
            $result
        );

        $this->assertSame(
            'lisa',
            $result['tread']
        );
    }

    public function test_valid_operational_function_is_not_absorbed_into_model(): void
    {
        $criteria = [
            'model' => 'XP1000',
            'function' => 'no_manchante',
        ];

        $this->assertSame(
            $criteria,
            $this->repair($criteria)
        );
    }

    public function test_standard_function_is_not_absorbed_into_model(): void
    {
        $criteria = [
            'model' => 'PS1000',
            'function' => 'estandar',
        ];

        $this->assertSame(
            $criteria,
            $this->repair($criteria)
        );
    }

    public function test_unknown_or_technical_terms_are_not_inferred_as_model_suffixes(): void
    {
        foreach ([
            'ProHD',
            'Multipurpose',
            'Heatshield',
            'algo inventado',
        ] as $function) {
            $criteria = [
                'model' => 'PS1000',
                'function' => $function,
            ];

            $this->assertSame(
                $criteria,
                $this->repair($criteria)
            );
        }
    }
}