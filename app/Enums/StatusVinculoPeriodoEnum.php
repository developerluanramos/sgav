<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SEM_REGISTRO()
 * @method static static APROVADO()
 * @method static static REPROVADO()
 * @method static static APROVADO_COM_RESSALVAS()
 */
final class StatusVinculoPeriodoEnum extends Enum
{
    const SR = 0; // Sem Registro
    const APROVADO = 1; // Aprovado
    const REPROVADO = 2; // Reprovado
    const APROVADO_COM_RESSALVAS = 3; // Aprovado com ressalvas
}
