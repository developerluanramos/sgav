<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static FINALIZADO()
 * @method static static EM_ANDAMENTO()
 * @method static static NAO_INICIADO()
 */
final class StatusCicloEnum extends Enum
{
    const FINALIZADO = 0;
    const EM_ANDAMENTO = 1;
    const NAO_INICIADO = 2;
}
