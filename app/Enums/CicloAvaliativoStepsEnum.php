<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CicloAvaliativoStepsEnum extends Enum
{
    const PERIODICIDADE = 'periodicidade';
    const INCIDENCIA = 'incidencia';
    const TEMPLATE = 'template';
    const CONCLUSAO = 'conclusao';
}
