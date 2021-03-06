<?php

declare(strict_types=1);

namespace App\Domains\QualiQuiz\Repository;

use App\Domains\QualiQuiz\Models\Questao;
use Illuminate\Support\Collection;

/**
 * Conjunto de consultas para a tabela Quiz.
 *
 * @category QualiQuiz
 *
 * @author  Chicão Thiago <fthiagogv@gmail.com>
 * @license GPL3 http://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @link https://github.com/EscolaDeSaudePublica/isus-api
 */
class QuestaoRepository
{
    /**
     * Buscar questões através de uma lista de Ids.
     *
     * @param $idsQuestao array
     *
     * @return Collection
     */
    public function buscarQuestao(array $idsQuestao): Collection
    {
        return (new Questao())
            ->select('id', 'questao')
            ->whereIn('id', $idsQuestao)
            ->get();
    }
}
