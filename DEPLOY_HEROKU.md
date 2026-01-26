# 🚀 Guia Completo - Deploy Laravel no Heroku

## ⚠️ IMPORTANTE - Informação sobre Custos

Desde novembro de 2022, o Heroku **não oferece mais plano gratuito**. Os planos começam em **$5/mês** por dyno. Você precisa de **cartão de crédito** cadastrado.

### Custos Estimados:
- **Dyno Eco:** $5/mês
- **PostgreSQL Essential-0:** $5/mês
- **MySQL (ClearDB Ignite):** Grátis (mas muito limitado)
- **Total mínimo:** ~$5-10/mês

---

## 📋 PASSO 1: Instalar Heroku CLI

### macOS:
```bash
brew tap heroku/brew && brew install heroku
```

### Verificar instalação:
```bash
heroku --version
```

---

## 📋 PASSO 2: Login no Heroku

```bash
heroku login
```

Isso abrirá o navegador para autenticação. Faça login com sua conta Heroku.

---

## 📋 PASSO 3: Preparar o Projeto

### 3.1. Verificar Procfile

O arquivo `Procfile` já está criado e correto:
```
web: vendor/bin/heroku-php-apache2 public/
```

✅ **Já está pronto!**

### 3.2. Verificar Git

```bash
cd /Users/apple/Documents/Code2025/Emprestimo

# Se ainda não tiver git inicializado
git init

# Verificar se está tudo commitado
git status
```

---

## 📋 PASSO 4: Criar Aplicação no Heroku

```bash
# Na pasta do projeto
cd /Users/apple/Documents/Code2025/Emprestimo

# Criar app (substitua 'emprestimo-app' pelo nome que quiser)
heroku create emprestimo-app

# Ou deixar o Heroku gerar nome aleatório
heroku create
```

### Definir Buildpack do PHP:

```bash
heroku buildpacks:set heroku/php
```

### Adicionar Buildpack do Node.js (para compilar assets):

```bash
heroku buildpacks:add heroku/nodejs
```

⚠️ **IMPORTANTE:** O buildpack do PHP deve ser o **primeiro** (principal).

---

## 📋 PASSO 5: Adicionar Banco de Dados

### Opção A: PostgreSQL (Recomendado - $5/mês)

```bash
# Adicionar PostgreSQL
heroku addons:create heroku-postgresql:essential-0

# Ver credenciais
heroku config:get DATABASE_URL
```

### Opção B: MySQL via ClearDB (Grátis, mas limitado)

```bash
# Adicionar MySQL gratuito
heroku addons:create cleardb:ignite

# Ver credenciais
heroku config:get CLEARDB_DATABASE_URL
```

⚠️ **ClearDB Ignite é grátis mas tem limites:**
- 5 MB de espaço
- 10 conexões simultâneas
- Pode não ser suficiente para produção

---

## 📋 PASSO 6: Configurar Variáveis de Ambiente

### 6.1. Gerar APP_KEY

```bash
# Gerar chave localmente
php artisan key:generate --show

# Copie a chave gerada (algo como: base64:...)
```

### 6.2. Configurar no Heroku

```bash
# Configurar APP_KEY (cole a chave gerada)
heroku config:set APP_KEY="base64:sua-chave-aqui"

# Outras configurações essenciais
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set APP_URL="https://emprestimo-app.herokuapp.com"
```

⚠️ **Substitua `emprestimo-app` pelo nome do seu app!**

### 6.3. Configurar Banco de Dados

**Se usar PostgreSQL:**
```bash
heroku config:set DB_CONNECTION=pgsql
```

**Se usar MySQL (ClearDB):**
```bash
heroku config:set DB_CONNECTION=mysql
```

### 6.4. Outras Variáveis Recomendadas:

```bash
heroku config:set LOG_CHANNEL=errorlog
heroku config:set LOG_LEVEL=error
heroku config:set SESSION_DRIVER=database
heroku config:set CACHE_DRIVER=file
heroku config:set QUEUE_CONNECTION=sync
```

---

## 📋 PASSO 7: Verificar Configuração do Banco

O arquivo `config/database.php` já foi atualizado para suportar `DATABASE_URL` do Heroku automaticamente!

✅ **Já está configurado!**

O Laravel vai:
- Detectar automaticamente se é PostgreSQL ou MySQL
- Extrair credenciais da URL automaticamente
- Funcionar sem configuração manual adicional

---

## 📋 PASSO 8: Fazer Deploy

### 8.1. Adicionar e Commitar Arquivos

```bash
# Adicionar todos os arquivos
git add .

# Fazer commit
git commit -m "Deploy inicial para Heroku"
```

### 8.2. Fazer Push para Heroku

```bash
# Push para Heroku (isso inicia o deploy)
git push heroku main

# Se sua branch principal é master:
git push heroku master
```

⏳ **Aguarde alguns minutos** enquanto o Heroku:
- Instala dependências do Composer
- Instala dependências do NPM
- Compila assets
- Faz deploy

---

## 📋 PASSO 9: Executar Migrations e Seeders

```bash
# Executar migrations
heroku run php artisan migrate --force

# Executar seeders
heroku run php artisan db:seed --force
```

---

## 📋 PASSO 10: Criar Storage Link

```bash
# Criar link simbólico do storage
heroku run php artisan storage:link
```

---

## 📋 PASSO 11: Criar Usuário Administrador

```bash
# Acessar Tinker
heroku run php artisan tinker
```

Dentro do Tinker:

```php
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
$filiacao = Filiacao::first();
if (!$filiacao) {
    $filiacao = Filiacao::create([
        'localizacao' => 'Principal',
        'saldo' => 0.00
    ]);
}

// Criar usuário
$user = User::create([
    'nome' => 'Administrador',
    'apelido' => 'Sistema',
    'email' => 'admin@exemplo.com',
    'password' => Hash::make('SuaSenhaSegura123!'),
    'perfil_id' => 1
]);

// Criar colaborador
Colaborador::create([
    'user_id' => $user->id,
    'filiacao_id' => $filiacao->id
]);

echo "Usuário criado! Email: admin@exemplo.com";
exit
```

---

## 📋 PASSO 12: Otimizar para Produção

```bash
# Cache de configuração
heroku run php artisan config:cache

# Cache de rotas
heroku run php artisan route:cache

# Cache de views
heroku run php artisan view:cache
```

---

## 📋 PASSO 13: Verificar e Abrir Aplicação

```bash
# Ver logs em tempo real
heroku logs --tail

# Abrir aplicação no navegador
heroku open

# Ver informações do app
heroku info
```

🎉 **Sua aplicação está online!**

---

## 🔧 Comandos Úteis do Heroku

### Ver Variáveis de Ambiente:
```bash
heroku config
```

### Adicionar Variável:
```bash
heroku config:set NOME_VARIAVEL=valor
```

### Remover Variável:
```bash
heroku config:unset NOME_VARIAVEL
```

### Ver Logs:
```bash
# Logs em tempo real
heroku logs --tail

# Últimas 100 linhas
heroku logs --num 100
```

### Executar Comandos Artisan:
```bash
heroku run php artisan comando
```

### Acessar Tinker:
```bash
heroku run php artisan tinker
```

### Reiniciar Aplicação:
```bash
heroku restart
```

### Ver Dynos:
```bash
heroku ps
```

### Ver Informações do Banco:
```bash
# PostgreSQL
heroku pg:info

# MySQL (ClearDB)
heroku config:get CLEARDB_DATABASE_URL
```

### Backup do Banco:
```bash
# PostgreSQL
heroku pg:backups:capture
heroku pg:backups:download

# MySQL (ClearDB não tem backup automático)
```

---

## 🚨 Troubleshooting

### Erro: "No web processes running"

```bash
heroku ps:scale web=1
```

### Erro 500 - Internal Server Error

1. **Ver logs:**
```bash
heroku logs --tail
```

2. **Verificar APP_KEY:**
```bash
heroku config:get APP_KEY

# Se não existir, gerar novo:
php artisan key:generate --show
heroku config:set APP_KEY="base64:sua-chave-aqui"
```

3. **Limpar cache:**
```bash
heroku run php artisan config:clear
heroku run php artisan cache:clear
heroku run php artisan route:clear
heroku run php artisan view:clear
```

### Assets não carregam

1. **Verificar se assets foram compilados:**
```bash
heroku run ls -la public/css
heroku run ls -la public/js
```

2. **Forçar rebuild:**
```bash
# Fazer push novamente
git commit --allow-empty -m "Force rebuild"
git push heroku main
```

### Problemas com Storage

⚠️ **IMPORTANTE:** O Heroku usa filesystem **efêmero**. Arquivos salvos em `storage/` serão perdidos quando o dyno reiniciar.

**Soluções:**
1. Usar serviços externos (S3, Cloudinary)
2. Usar banco de dados para pequenos arquivos
3. Aceitar que arquivos são temporários

### Erro de Conexão com Banco

1. **Verificar variáveis:**
```bash
heroku config:get DATABASE_URL
heroku config:get DB_CONNECTION
```

2. **Testar conexão:**
```bash
heroku run php artisan tinker
# Dentro do tinker:
DB::connection()->getPdo();
```

### Build Falha

1. **Ver logs do build:**
```bash
heroku logs --tail
```

2. **Verificar buildpacks:**
```bash
heroku buildpacks
# Deve mostrar:
# 1. heroku/php
# 2. heroku/nodejs
```

---

## 🔄 Deploy Automático via GitHub

### Conectar ao GitHub:

1. Acesse: https://dashboard.heroku.com
2. Escolha seu app
3. Vá em **"Deploy"**
4. Em **"Deployment method"**, escolha **"GitHub"**
5. Conecte seu repositório: `InariaMonjane/Emprestimo`
6. Marque **"Wait for CI to pass before deploy"** (opcional)
7. Marque **"Enable Automatic Deploys"**
8. Clique em **"Deploy Branch"**

Agora, **sempre que você fizer push no GitHub**, o Heroku fará deploy automático!

---

## 📝 Checklist Final

- [ ] Heroku CLI instalado
- [ ] Login no Heroku feito
- [ ] App criado no Heroku
- [ ] Buildpacks configurados (PHP + Node.js)
- [ ] Banco de dados adicionado
- [ ] Variáveis de ambiente configuradas
- [ ] APP_KEY gerado e configurado
- [ ] APP_URL configurado
- [ ] Git push realizado
- [ ] Migrations executadas
- [ ] Seeders executados
- [ ] Storage link criado
- [ ] Usuário admin criado
- [ ] Cache otimizado
- [ ] Aplicação acessível

---

## 💰 Monitorar Custos

1. Acesse: https://dashboard.heroku.com/account/billing
2. Veja uso atual
3. Configure alertas de billing
4. Monitore regularmente

---

## ✅ Pronto!

Seu sistema Laravel está online no Heroku! 🎉

**URL:** `https://emprestimo-app.herokuapp.com`

---

## 💡 Dicas Finais

1. **Monitore os logs** regularmente
2. **Faça backup** do banco periodicamente
3. **Use PostgreSQL** se possível (mais estável)
4. **Configure alertas** de billing
5. **Teste localmente** antes de fazer deploy

---

**Pronto! Seu sistema está 100% configurado no Heroku! 🚀**

Se tiver algum problema, me avise!
