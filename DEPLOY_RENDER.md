# 🚀 Guia Completo - Deploy Laravel no Render.com (100% Gratuito)

## 🏆 Por que Render.com?

✅ **Melhor que Railway** para Laravel:
- ✅ Plano gratuito mais generoso
- ✅ Mais fácil de configurar
- ✅ MySQL gratuito incluído (sem limites rígidos)
- ✅ Deploy automático via GitHub
- ✅ HTTPS automático
- ✅ Sem cartão de crédito necessário
- ✅ Aplicação não "dorme" (sempre ativa)
- ✅ Interface mais intuitiva

---

## 📋 PASSO 1: Criar Conta no Render

1. Acesse: **https://render.com**
2. Clique em **"Get Started for Free"**
3. Escolha **"Sign up with GitHub"**
   - Você precisa ter conta GitHub
   - Se não tiver: https://github.com
4. Autorize o Render a acessar seu GitHub
5. ✅ Conta criada!

---

## 📋 PASSO 2: Preparar Projeto no GitHub

### Se seu projeto JÁ está no GitHub:

✅ Pule para o Passo 3

### Se seu projeto NÃO está no GitHub:

Vejo que você já tem o repositório: **https://github.com/InariaMonjane/Emprestimo**

✅ Você pode usar esse repositório diretamente!

---

## 🟢 PASSO 3: Criar Web Service no Render

1. No dashboard do Render, clique em **"New +"**
2. Selecione **"Web Service"**
3. Conecte seu repositório GitHub:
   - Se não aparecer, clique em **"Configure account"**
   - Autorize o Render
   - Selecione: **InariaMonjane/Emprestimo**

---

## 🟢 PASSO 4: Configurar Web Service

### Configurações Básicas:

#### **Name:**
```
emprestimo-app
```

#### **Region:**
```
Oregon (us-west)  # Mais próximo, mas pode escolher qualquer
```

#### **Branch:**
```
main
```

#### **Root Directory:**
```
(Deixe vazio - está na raiz)
```

#### **Runtime:**
```
PHP
```

#### **Build Command:**
```bash
composer install --no-dev --optimize-autoloader && npm install && npm run production
```

#### **Start Command:**
```bash
php artisan serve --host=0.0.0.0 --port=$PORT
```

#### **Plan:**
```
Free
```

---

## 🟢 PASSO 5: Adicionar Banco de Dados MySQL

1. No dashboard, clique em **"New +"**
2. Selecione **"PostgreSQL"** ou **"MySQL"**
   - ⚠️ **Render oferece PostgreSQL grátis** (recomendado)
   - MySQL também funciona, mas PostgreSQL é mais estável no plano grátis
3. Configure:
   - **Name:** `emprestimo-db`
   - **Database:** `emprestimo`
   - **User:** (deixe padrão)
   - **Region:** Mesma do web service
   - **Plan:** `Free`
4. Clique em **"Create Database"**

⏳ Aguarde alguns segundos para criar

---

## 🟢 PASSO 6: Configurar Variáveis de Ambiente

1. Volte para seu **Web Service**
2. Vá na aba **"Environment"**
3. Clique em **"Add Environment Variable"**

### Variáveis Obrigatórias:

#### **APP_KEY**
```
APP_KEY=
```
⚠️ Deixe vazio, vamos gerar depois

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
⚠️ Deixe vazio, vamos preencher depois

#### **DB_CONNECTION**
```
DB_CONNECTION=mysql
```
(ou `pgsql` se escolheu PostgreSQL)

### Variáveis do Banco de Dados:

O Render cria automaticamente uma variável `DATABASE_URL`. Você precisa extrair as informações:

1. Vá no seu **banco de dados** no Render
2. Na aba **"Connections"**, você verá:
   - **Internal Database URL**
   - **External Database URL**

3. A URL será algo como:
   ```
   mysql://user:password@host:port/database
   ```

4. Extraia e adicione estas variáveis no **Web Service**:

**Para MySQL:**
```
DB_HOST=seu-host-mysql.render.com
DB_PORT=3306
DB_DATABASE=emprestimo
DB_USERNAME=seu-usuario
DB_PASSWORD=sua-senha
```

**Para PostgreSQL:**
```
DB_CONNECTION=pgsql
DB_HOST=seu-host-postgres.render.com
DB_PORT=5432
DB_DATABASE=emprestimo
DB_USERNAME=seu-usuario
DB_PASSWORD=sua-senha
```

### Outras Variáveis Recomendadas:

```
LOG_CHANNEL=stack
LOG_LEVEL=error
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

---

## 🟢 PASSO 7: Gerar APP_KEY

1. No Web Service, vá na aba **"Shell"**
2. Execute:

```bash
php artisan key:generate --show
```

3. **Copie a chave** gerada
4. Volte em **"Environment"**
5. Edite `APP_KEY` e cole a chave
6. Salve

---

## 🟢 PASSO 8: Configurar APP_URL

1. No Web Service, vá em **"Settings"**
2. Role até **"Custom Domain"**
3. Você verá algo como: `emprestimo-app.onrender.com`
4. Copie essa URL
5. Vá em **"Environment"**
6. Edite `APP_URL`:
```
APP_URL=https://emprestimo-app.onrender.com
```
⚠️ Use **HTTPS**!

---

## 🟢 PASSO 9: Criar Tabela de Sessões

No **Shell** do Web Service:

```bash
php artisan session:table
php artisan migrate
```

---

## 🟢 PASSO 10: Executar Migrations e Seeders

No **Shell**:

```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 🟢 PASSO 11: Criar Usuário Administrador

No **Shell**:

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

## 🟢 PASSO 12: Otimizar para Produção

No **Shell**:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🟢 PASSO 13: Verificar Deploy

1. No Web Service, clique em **"Settings"**
2. Role até ver a URL: `https://emprestimo-app.onrender.com`
3. Clique na URL ou copie e cole no navegador
4. Deve abrir sua aplicação Laravel! ✅

---

## 🔄 Deploy Automático

Agora, **sempre que você fizer push no GitHub**, o Render fará deploy automático:

```bash
cd /Users/apple/Documents/Code2025/Emprestimo
git add .
git commit -m "Minhas alterações"
git push origin main

# O Render fará deploy automaticamente! 🚀
```

---

## 💰 Plano Gratuito do Render

### O que está incluído:

- ✅ **750 horas** de uso por mês (mais que Railway!)
- ✅ **PostgreSQL** gratuito (1GB)
- ✅ **MySQL** gratuito (disponível)
- ✅ **HTTPS** automático
- ✅ **Deploy ilimitado**
- ✅ **Aplicação sempre ativa** (não dorme!)
- ✅ **Sem cartão de crédito** necessário

### Limites:

- ⚠️ Aplicação pode ficar lenta após 15 minutos de inatividade
- ⚠️ Primeira requisição após inatividade pode demorar ~30 segundos
- ⚠️ Se ultrapassar limites, precisa adicionar cartão

---

## 🔍 Verificar Logs

1. No Web Service, vá na aba **"Logs"**
2. Veja logs em tempo real
3. Filtre por tipo (Build, Runtime, etc.)

---

## 🚨 Troubleshooting

### Erro: "Application failed to respond"

1. Verifique os logs
2. Verifique se `APP_KEY` está configurado
3. Verifique se `APP_URL` está correto
4. Verifique conexão com banco

### Erro de conexão com banco:

1. Verifique se as variáveis estão corretas
2. Use **Internal Database URL** (não External)
3. Para MySQL, verifique se porta é 3306
4. Para PostgreSQL, verifique se porta é 5432

### Assets não carregam:

1. Verifique se `npm run production` foi executado
2. Verifique se os arquivos estão em `public/`
3. Force rebuild: Settings → Manual Deploy

### Erro 500:

1. Veja os logs
2. Ative temporariamente `APP_DEBUG=true`
3. Verifique permissões (não precisa no Render)

---

## 📊 Comparação: Render vs Railway

| Recurso | Render.com | Railway |
|---------|------------|---------|
| Horas grátis/mês | 750 | 500 |
| Aplicação dorme? | Não (sempre ativa) | Sim (após 30min) |
| MySQL grátis | Sim | Sim |
| PostgreSQL grátis | Sim | Não |
| Facilidade | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| Interface | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| Documentação | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |

**Vencedor: Render.com** 🏆

---

## 🔐 Configurar Domínio Próprio (Opcional)

1. No Web Service → **Settings** → **Custom Domains**
2. Adicione seu domínio
3. Configure DNS:
   - Tipo: `CNAME`
   - Nome: `@` ou `www`
   - Valor: `emprestimo-app.onrender.com`
4. Aguarde propagação

---

## 📝 Checklist Final

- [ ] Conta Render criada
- [ ] Repositório conectado
- [ ] Web Service criado
- [ ] Banco de dados criado
- [ ] Variáveis de ambiente configuradas
- [ ] APP_KEY gerado
- [ ] APP_URL configurado
- [ ] Migrations executadas
- [ ] Seeders executados
- [ ] Usuário admin criado
- [ ] Aplicação acessível via URL

---

## ✅ Pronto!

Seu sistema Laravel está online no Render.com! 🎉

**URL:** `https://emprestimo-app.onrender.com`

---

## 💡 Dicas Finais

1. **Render é melhor que Railway** para Laravel
2. **Use PostgreSQL** se possível (mais estável)
3. **Monitore os logs** regularmente
4. **Faça backup** do banco periodicamente
5. **Mantenha código no GitHub** para histórico

---

## 🎯 Próximos Passos

1. Testar todas as funcionalidades
2. Configurar domínio próprio (opcional)
3. Configurar backup automático
4. Monitorar performance

---

**Pronto! Seu sistema está 100% configurado no Render.com! 🚀**

Se tiver algum problema, me avise!
