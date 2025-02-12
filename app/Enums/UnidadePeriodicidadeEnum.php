<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static dias()
 * @method static static semanas()
 * @method static static meses()
 * @method static static semestres()
 * @method static static anos()
 *
 */
final class UnidadePeriodicidadeEnum extends Enum
{
    const DIAS = 'dias';
    const SEMANAS = 'semanas';
    const MESES = 'meses';
    const SEMESTRES = 'semestres';
    const ANOS = 'anos';

    static function unitForCarbon($key)
    {
        //dd($key);
        $carbonUnits = [
            self::DIAS => 'days',
            self::SEMANAS => 'weeks',
            self::MESES => 'months',
            self::SEMESTRES => 'semesters',
            self::ANOS => 'years'
        ];

        return $carbonUnits[$key];
    }
}
