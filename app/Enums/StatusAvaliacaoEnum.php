<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SEM_REGISTRO()
 * @method static static FINALIZADO()
 * @method static static EM_ANDAMENTO()
 * @method static static NAO_INICIADO()
 */
final class StatusAvaliacaoEnum extends Enum
{
    const SR = 0; // Sem Registro
    const FINALIZADO = 1;
    const EM_ANDAMENTO = 2;
    const NAO_INICIADO = 3;
}
