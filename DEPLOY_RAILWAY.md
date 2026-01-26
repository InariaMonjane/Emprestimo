# 🚀 Guia Completo - Deploy Laravel no Railway (100% Gratuito)

## 📋 O que é o Railway?

- ✅ **Plataforma de deploy** moderna e simples
- ✅ **Plano gratuito** generoso (500 horas/mês)
- ✅ **Detecção automática** de Laravel
- ✅ **Banco de dados MySQL** gratuito incluído
- ✅ **Deploy automático** via GitHub
- ✅ **HTTPS** automático
- ✅ **Sem cartão de crédito** necessário

---

## 🟢 PASSO 1: Criar Conta no Railway

1. Acesse: **https://railway.app**
2. Clique em **"Start a New Project"**
3. Escolha **"Login with GitHub"**
   - Você precisa ter uma conta GitHub
   - Se não tiver, crie em: https://github.com
4. Autorize o Railway a acessar seu GitHub
5. ✅ Conta criada!

---

## 🟢 PASSO 2: Preparar Projeto no GitHub

### Se seu projeto JÁ está no GitHub:

✅ Pule para o Passo 3

### Se seu projeto NÃO está no GitHub:

#### 2.1. Criar Repositório no GitHub

1. Acesse: https://github.com
2. Clique no **"+"** → **"New repository"**
3. Nome: `emprestimo-app` (ou o que preferir)
4. Marque **"Private"** (se quiser privado)
5. **NÃO** marque "Initialize with README"
6. Clique em **"Create repository"**

#### 2.2. Fazer Upload do Projeto

No seu Mac, execute:

```bash
cd /Users/apple/Documents/Code2025/Emprestimo

# Inicializar git (se ainda não tiver)
git init

# Adicionar todos os arquivos
git add .

# Fazer commit
git commit -m "Initial commit - Projeto Laravel Emprestimo"

# Adicionar repositório remoto (substitua SEU_USUARIO)
git remote add origin https://github.com/SEU_USUARIO/emprestimo-app.git

# Fazer push
git branch -M main
git push -u origin main
```

⚠️ **Substitua `SEU_USUARIO`** pelo seu username do GitHub!

---

## 🟢 PASSO 3: Criar Novo Projeto no Railway

1. No Railway, clique em **"New Project"**
2. Escolha **"Deploy from GitHub repo"**
3. Selecione seu repositório `emprestimo-app`
4. Clique em **"Deploy Now"**

⏳ O Railway vai:
- Detectar que é Laravel
- Instalar dependências automaticamente
- Tentar fazer deploy

⚠️ **Ainda vai dar erro** porque falta configurar o banco de dados!

---

## 🟢 PASSO 4: Adicionar Banco de Dados MySQL

1. No projeto Railway, clique em **"+ New"**
2. Selecione **"Database"**
3. Escolha **"Add MySQL"**
4. ⏳ Aguarde alguns segundos para criar

✅ O Railway criará automaticamente:
- Banco de dados MySQL
- Variáveis de ambiente configuradas
- Conexão pronta para usar

---

## 🟢 PASSO 5: Configurar Variáveis de Ambiente

1. No projeto Railway, clique na **sua aplicação** (não no banco)
2. Vá na aba **"Variables"**
3. Clique em **"New Variable"**

### Variáveis Obrigatórias:

Adicione uma por uma:

#### **APP_KEY**
```
APP_KEY=
```
⚠️ Deixe vazio por enquanto, vamos gerar depois

#### **APP_ENV**
```
APP_ENV=production
```

#### **APP_DEBUG**
```
APP_DEBUG=false
```

#### **APP_URL**
```
APP_URL=
```
⚠️ Deixe vazio, o Railway vai preencher automaticamente

#### **DB_CONNECTION**
```
DB_CONNECTION=mysql
```

### Variáveis do Banco de Dados (Automáticas)

O Railway já criou automaticamente quando você adicionou o MySQL:

- `MYSQL_HOST`
- `MYSQL_PORT`
- `MYSQL_DATABASE`
- `MYSQL_USER`
- `MYSQL_PASSWORD`

### Mapear Variáveis do Banco

Agora você precisa **mapear** essas variáveis para o formato Laravel:

1. Na aba **"Variables"**, clique em **"New Variable"**
2. Adicione estas variáveis (use os valores do banco):

```
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
```

⚠️ **IMPORTANTE:** Use exatamente `${{MySQL.MYSQLHOST}}` (com as chaves duplas!)

### Outras Variáveis Recomendadas:

```
LOG_CHANNEL=stack
LOG_LEVEL=error
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

---

## 🟢 PASSO 6: Gerar APP_KEY

1. No Railway, clique na sua aplicação
2. Vá na aba **"Deployments"**
3. Clique nos **três pontinhos** (⋯) do último deployment
4. Selecione **"Open Shell"**
5. Execute:

```bash
php artisan key:generate --show
```

6. **Copie a chave** que aparecer (algo como: `base64:...`)
7. Volte para **"Variables"**
8. Edite `APP_KEY` e cole a chave gerada
9. Salve

---

## 🟢 PASSO 7: Configurar APP_URL

1. Na aba **"Settings"** da sua aplicação
2. Role até **"Domains"**
3. Você verá algo como: `emprestimo-app-production.up.railway.app`
4. Copie essa URL
5. Vá em **"Variables"**
6. Edite `APP_URL` e cole:
```
APP_URL=https://emprestimo-app-production.up.railway.app
```
⚠️ Use **HTTPS** e a URL completa!

---

## 🟢 PASSO 8: Criar Tabela de Sessões (Opcional mas Recomendado)

Se você configurou `SESSION_DRIVER=database`:

1. Abra o **Shell** novamente (Deployments → ⋯ → Open Shell)
2. Execute:

```bash
php artisan session:table
php artisan migrate
```

---

## 🟢 PASSO 9: Executar Migrations e Seeders

No **Shell** do Railway:

```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 🟢 PASSO 10: Criar Usuário Administrador

No **Shell** do Railway:

```bash
php artisan tinker
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

## 🟢 PASSO 11: Otimizar para Produção

No **Shell**:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🟢 PASSO 12: Verificar Deploy

1. No Railway, clique em **"Settings"**
2. Role até **"Domains"**
3. Clique na URL (ex: `https://emprestimo-app-production.up.railway.app`)
4. Deve abrir sua aplicação Laravel! ✅

---

## 🔧 Configuração do nixpacks.toml (Já Existe!)

O arquivo `nixpacks.toml` já está configurado corretamente:

```toml
[phases.setup]
nixPkgs = { php = "8.1", node = "18" }

[phases.install]
cmds = [
  "composer install --no-dev --optimize-autoloader",
  "npm install",
  "npm run production"
]

[start]
cmd = "php artisan serve --host=0.0.0.0 --port=$PORT"
```

✅ Está perfeito! Não precisa alterar nada.

---

## 📝 Checklist Final

- [ ] Conta Railway criada
- [ ] Projeto no GitHub
- [ ] Projeto conectado ao Railway
- [ ] Banco MySQL adicionado
- [ ] Variáveis de ambiente configuradas
- [ ] APP_KEY gerado e configurado
- [ ] APP_URL configurado
- [ ] Migrations executadas
- [ ] Seeders executados
- [ ] Usuário admin criado
- [ ] Aplicação acessível via URL do Railway

---

## 🔄 Deploy Automático (Já Configurado!)

Agora, **sempre que você fizer push no GitHub**, o Railway fará deploy automático:

```bash
# No seu Mac
cd /Users/apple/Documents/Code2025/Emprestimo

# Fazer alterações...
git add .
git commit -m "Minhas alterações"
git push origin main

# O Railway fará deploy automaticamente! 🚀
```

---

## 🔍 Verificar Logs

1. No Railway, clique na sua aplicação
2. Vá na aba **"Deployments"**
3. Clique em um deployment
4. Veja os **logs** em tempo real

---

## 🚨 Troubleshooting

### Erro: "The executable vendor/bin/heroku-php-apache2 could not be found"

✅ **Já resolvido!** O `Procfile` foi atualizado para usar `php artisan serve`

### Erro de conexão com banco:

1. Verifique se as variáveis estão mapeadas corretamente:
   - `DB_HOST=${{MySQL.MYSQLHOST}}`
   - `DB_PORT=${{MySQL.MYSQLPORT}}`
   - etc.

2. Verifique se o banco MySQL está rodando (deve estar automaticamente)

### Erro 500 Internal Server Error:

1. Veja os logs no Railway
2. Verifique se `APP_KEY` está configurado
3. Verifique se `APP_URL` está correto
4. Limpe cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

### Assets não carregam:

1. Verifique se `npm run production` foi executado
2. Os assets são compilados automaticamente durante o build
3. Se não funcionar, force rebuild:
   - Settings → Clear Build Cache → Redeploy

---

## 💰 Plano Gratuito do Railway

### O que está incluído:

- ✅ **500 horas** de uso por mês
- ✅ **$5 de crédito** grátis por mês
- ✅ **MySQL** gratuito (1GB)
- ✅ **HTTPS** automático
- ✅ **Deploy ilimitado**

### Limites:

- ⚠️ Aplicação "dorme" após 30 minutos de inatividade
- ⚠️ Primeira requisição após dormir pode demorar alguns segundos
- ⚠️ Se ultrapassar $5/mês, precisa adicionar cartão

### Para evitar que durma:

1. Use serviços como **Uptime Robot** (gratuito)
2. Configure para fazer ping a cada 5 minutos
3. Isso mantém a aplicação "acordada"

---

## 🔐 Configurar Domínio Próprio (Opcional)

1. No Railway, vá em **Settings** → **Domains**
2. Clique em **"Custom Domain"**
3. Digite seu domínio (ex: `app.seudominio.com`)
4. Configure DNS no seu provedor:
   - Tipo: `CNAME`
   - Nome: `app` (ou `@`)
   - Valor: `cname.railway.app`
5. Aguarde propagação (pode demorar até 24h)

---

## 📊 Monitoramento

### Ver uso de recursos:

1. No Railway, clique na sua aplicação
2. Veja **"Metrics"** (CPU, RAM, etc.)

### Ver custos:

1. Clique no seu nome (canto superior direito)
2. **"Account Settings"** → **"Usage"**
3. Veja quanto está usando do crédito grátis

---

## 🎯 Comandos Úteis no Shell

```bash
# Ver logs do Laravel
tail -f storage/logs/laravel.log

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Recriar cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ver rotas
php artisan route:list

# Acessar Tinker
php artisan tinker
```

---

## ✅ Pronto!

Seu sistema Laravel está online no Railway! 🎉

**URL:** `https://seu-app.up.railway.app`

---

## 🔄 Atualizar Código

Sempre que quiser atualizar:

```bash
cd /Users/apple/Documents/Code2025/Emprestimo
git add .
git commit -m "Descrição das alterações"
git push origin main
```

O Railway fará deploy automático em 1-2 minutos! 🚀

---

## 💡 Dicas Finais

1. **Sempre teste localmente** antes de fazer push
2. **Monitore os logs** no Railway
3. **Faça backup** do banco regularmente
4. **Use variáveis de ambiente** para configurações sensíveis
5. **Mantenha o código no GitHub** para histórico

---

**Pronto! Seu sistema está 100% configurado no Railway! 🚀**

Se tiver algum problema, me avise!
