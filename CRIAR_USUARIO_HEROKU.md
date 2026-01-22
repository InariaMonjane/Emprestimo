# Como Criar Usuário no Sistema Hospedado no Heroku

## Método 1: Usando Tinker (Mais Rápido e Direto)

### Passo a Passo:

1. **Acessar o Tinker no Heroku:**
```bash
heroku run php artisan tinker
```

2. **Criar o usuário diretamente:**
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// Verificar se os perfis existem
DB::table('perfils')->count();

// Se não existirem, criar os perfis primeiro
DB::table('perfils')->insert([
    ['acesso' => 'Gestor', 'created_at' => now()],
    ['acesso' => 'Operador', 'created_at' => now()]
]);

// Criar o usuário
$user = User::create([
    'nome' => 'Seu Nome',
    'apelido' => 'Seu Apelido',
    'email' => 'seu-email@exemplo.com',
    'password' => Hash::make('sua-senha-segura'),
    'perfil_id' => 1, // 1 = Gestor, 2 = Operador
]);

echo "Usuário criado com sucesso! ID: " . $user->id;
exit
```

3. **Criar também o colaborador associado (se necessário):**
```php
// Verificar se existe filiação
$filiacao = DB::table('filiacaos')->first();

// Se não existir, criar
if (!$filiacao) {
    $filiacaoId = DB::table('filiacaos')->insertGetId([
        'localizacao' => 'Principal',
        'saldo' => 0.00,
        'created_at' => now()
    ]);
} else {
    $filiacaoId = $filiacao->id;
}

// Criar colaborador
DB::table('colaboradors')->insert([
    'user_id' => $user->id,
    'filiacao_id' => $filiacaoId,
    'created_at' => now()
]);

echo "Colaborador criado com sucesso!";
exit
```

## Método 2: Usando Seeder (Recomendado para Produção)

### Criar um Seeder Específico:

1. **Criar o seeder:**
```bash
heroku run php artisan make:seeder AdminUserSeeder
```

2. **Editar o seeder** (você precisaria fazer isso localmente e fazer deploy):

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Colaborador;
use App\Models\Filiacao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Criar perfis se não existirem
        if (DB::table('perfils')->count() == 0) {
            DB::table('perfils')->insert([
                ['acesso' => 'Gestor', 'created_at' => now()],
                ['acesso' => 'Operador', 'created_at' => now()]
            ]);
        }

        // Criar filiação se não existir
        $filiacao = Filiacao::first();
        if (!$filiacao) {
            $filiacao = Filiacao::create([
                'localizacao' => 'Principal',
                'saldo' => 0.00
            ]);
        }

        // Criar usuário admin
        $user = User::create([
            'nome' => 'Administrador',
            'apelido' => 'Sistema',
            'email' => 'admin@exemplo.com',
            'password' => Hash::make('senha-segura-aqui'),
            'perfil_id' => 1, // Gestor
        ]);

        // Criar colaborador associado
        Colaborador::create([
            'user_id' => $user->id,
            'filiacao_id' => $filiacao->id
        ]);

        echo "Usuário admin criado com sucesso!\n";
    }
}
```

3. **Executar o seeder:**
```bash
heroku run php artisan db:seed --class=AdminUserSeeder
```

## Método 3: Usando Comando Artisan Customizado (Mais Profissional)

### Criar o comando:

1. **Criar o comando:**
```bash
heroku run php artisan make:command CreateAdminUser
```

2. **Editar o comando** (fazer localmente e deploy):

```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Colaborador;
use App\Models\Filiacao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateAdminUser extends Command
{
    protected $signature = 'user:create {--nome=} {--apelido=} {--email=} {--senha=} {--perfil=1}';
    protected $description = 'Criar um novo usuário no sistema';

    public function handle()
    {
        // Verificar perfis
        if (DB::table('perfils')->count() == 0) {
            DB::table('perfils')->insert([
                ['acesso' => 'Gestor', 'created_at' => now()],
                ['acesso' => 'Operador', 'created_at' => now()]
            ]);
            $this->info('Perfis criados!');
        }

        // Verificar filiação
        $filiacao = Filiacao::first();
        if (!$filiacao) {
            $filiacao = Filiacao::create([
                'localizacao' => 'Principal',
                'saldo' => 0.00
            ]);
            $this->info('Filiação criada!');
        }

        // Criar usuário
        $user = User::create([
            'nome' => $this->option('nome') ?: $this->ask('Nome'),
            'apelido' => $this->option('apelido') ?: $this->ask('Apelido'),
            'email' => $this->option('email') ?: $this->ask('Email'),
            'password' => Hash::make($this->option('senha') ?: $this->secret('Senha')),
            'perfil_id' => $this->option('perfil'),
        ]);

        // Criar colaborador
        Colaborador::create([
            'user_id' => $user->id,
            'filiacao_id' => $filiacao->id
        ]);

        $this->info("Usuário criado com sucesso! ID: {$user->id}");
        return 0;
    }
}
```

3. **Usar o comando:**
```bash
# Modo interativo
heroku run php artisan user:create

# Ou com parâmetros
heroku run php artisan user:create --nome="João" --apelido="Silva" --email="joao@exemplo.com" --senha="senha123" --perfil=1
```

## Método 4: Script Rápido (Copiar e Colar)

Execute este comando completo de uma vez:

```bash
heroku run php artisan tinker --execute="
use App\Models\User;
use App\Models\Colaborador;
use App\Models\Filiacao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// Criar perfis se não existirem
if (DB::table('perfils')->count() == 0) {
    DB::table('perfils')->insert([
        ['acesso' => 'Gestor', 'created_at' => now()],
        ['acesso' => 'Operador', 'created_at' => now()]
    ]);
}

// Criar filiação se não existir
\$filiacao = Filiacao::first();
if (!\$filiacao) {
    \$filiacao = Filiacao::create(['localizacao' => 'Principal', 'saldo' => 0.00]);
}

// Criar usuário
\$user = User::create([
    'nome' => 'Admin',
    'apelido' => 'Sistema',
    'email' => 'admin@exemplo.com',
    'password' => Hash::make('senha123'),
    'perfil_id' => 1
]);

// Criar colaborador
Colaborador::create([
    'user_id' => \$user->id,
    'filiacao_id' => \$filiacao->id
]);

echo 'Usuário criado! Email: ' . \$user->email;
"
```

## Verificar Usuários Existentes

```bash
heroku run php artisan tinker --execute="
use App\Models\User;
\$users = User::all(['id', 'nome', 'apelido', 'email', 'perfil_id']);
foreach (\$users as \$user) {
    echo \$user->id . ' - ' . \$user->nome . ' ' . \$user->apelido . ' (' . \$user->email . ')' . PHP_EOL;
}
"
```

## Alterar Senha de Usuário Existente

```bash
heroku run php artisan tinker --execute="
use App\Models\User;
use Illuminate\Support\Facades\Hash;
\$user = User::where('email', 'admin@exemplo.com')->first();
\$user->password = Hash::make('nova-senha');
\$user->save();
echo 'Senha alterada com sucesso!';
"
```

## Dicas Importantes

1. **Perfis:**
   - `perfil_id = 1` = Gestor (acesso completo)
   - `perfil_id = 2` = Operador (acesso limitado)

2. **Segurança:**
   - Use senhas fortes em produção
   - Altere a senha padrão imediatamente
   - Não compartilhe credenciais

3. **Primeiro Acesso:**
   - Certifique-se de que os perfis existem
   - Certifique-se de que existe uma filiação
   - O usuário precisa ter um colaborador associado para acessar o sistema

## Exemplo Completo - Criar Primeiro Usuário Admin

Execute este comando completo (substitua os valores):

```bash
heroku run php artisan tinker --execute="
use App\Models\User;
use App\Models\Colaborador;
use App\Models\Filiacao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// 1. Criar perfis
if (DB::table('perfils')->count() == 0) {
    DB::table('perfils')->insert([
        ['acesso' => 'Gestor', 'created_at' => now()],
        ['acesso' => 'Operador', 'created_at' => now()]
    ]);
    echo 'Perfis criados!' . PHP_EOL;
}

// 2. Criar filiação
\$filiacao = Filiacao::first();
if (!\$filiacao) {
    \$filiacao = Filiacao::create([
        'localizacao' => 'Principal',
        'saldo' => 0.00
    ]);
    echo 'Filiação criada!' . PHP_EOL;
}

// 3. Criar usuário
\$user = User::create([
    'nome' => 'Administrador',
    'apelido' => 'Sistema',
    'email' => 'admin@seu-dominio.com',
    'password' => Hash::make('SuaSenhaSegura123!'),
    'perfil_id' => 1
]);
echo 'Usuário criado! ID: ' . \$user->id . PHP_EOL;

// 4. Criar colaborador
Colaborador::create([
    'user_id' => \$user->id,
    'filiacao_id' => \$filiacao->id
]);
echo 'Colaborador criado!' . PHP_EOL;
echo PHP_EOL . '=== CREDENCIAIS ===' . PHP_EOL;
echo 'Email: admin@seu-dominio.com' . PHP_EOL;
echo 'Senha: SuaSenhaSegura123!' . PHP_EOL;
"
```
