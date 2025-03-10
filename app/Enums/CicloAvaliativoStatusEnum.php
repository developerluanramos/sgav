<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static INICIADO()
 * @method static static ENCERRADO()
 * @method static static RASCUNHO()
 */
final class CicloAvaliativoStatusEnum extends Enum
{
    const INICIADO = 'iniciado';
    const ENCERRADO = 'encerrado';
    const RASCUNHO = 'rascunho';
}
