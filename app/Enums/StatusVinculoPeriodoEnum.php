<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static APROVADO()
 * @method static static REPROVADO()
 * @method static static APROVADO_COM_RESSALVAS()
 */
final class StatusVinculoPeriodoEnum extends Enum
{
    const APROVADO = 0; // Aprovado
    const REPROVADO = 1; // Reprovado
    const APROVADO_COM_RESSALVAS = 2; // Aprovado com ressalvas
}
