<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ESTAGIO_PROBATORIO()
 * @method static static EVOLUCAO_FUNCIONAL()
 */
final class FinalidadeModeloAvaliacaoEnum extends Enum
{
    const ESTAGIO_PROBATORIO = 'Estágio Probatório';
    const EVOLUCAO_FUNCIONAL = 'Evolução Funcional';
}
