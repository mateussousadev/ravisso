<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $problems = [
            [
                'title' => 'API de autenticação com Laravel',
                'description' => 'Implementei autenticação JWT usando o pacote tymon/jwt-auth, protegendo rotas e gerenciando tokens.'
            ],
            [
                'title' => 'Upload de arquivos grandes',
                'description' => 'Utilizei chunk upload no frontend e processamento em fila no backend para lidar com arquivos acima de 100MB.'
            ],
            [
                'title' => 'Otimização de consultas Eloquent',
                'description' => 'Usei eager loading e índices no banco para reduzir queries N+1 e melhorar performance.'
            ],
            [
                'title' => 'Deploy automatizado com GitHub Actions',
                'description' => 'Configurei pipeline CI/CD para rodar testes, build e deploy automático em produção.'
            ],
            [
                'title' => 'Integração com API de terceiros',
                'description' => 'Implementei integração robusta com tratamento de erros e retries usando Guzzle.'
            ],
            [
                'title' => 'Sistema de notificações em tempo real',
                'description' => 'Utilizei Laravel Echo e websockets para enviar notificações instantâneas para os usuários.'
            ],
            [
                'title' => 'Validação de formulários complexos',
                'description' => 'Criei Form Requests customizados para regras de validação avançadas e mensagens personalizadas.'
            ],
            [
                'title' => 'Cache de consultas pesadas',
                'description' => 'Implementei cache Redis para resultados de queries demoradas, reduzindo o tempo de resposta.'
            ],
            [
                'title' => 'Paginação eficiente de grandes volumes',
                'description' => 'Usei cursor pagination para melhorar a performance em listas com milhares de registros.'
            ],
            [
                'title' => 'Envio de e-mails em massa',
                'description' => 'Configurei filas para envio assíncrono de e-mails, evitando sobrecarga no servidor.'
            ],
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }
    }
}
