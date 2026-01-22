# Solução para Erro 419 - Page Expired no Heroku

## Causas Comuns

1. **APP_URL não configurado corretamente**
2. **SESSION_SECURE_COOKIE não configurado para HTTPS**
3. **Cache de configuração desatualizado**
4. **APP_KEY incorreto ou não configurado**

## Solução Passo a Passo

### 1. Verificar e Configurar APP_URL

```bash
# Ver a URL atual
heroku config:get APP_URL

# Configurar com a URL correta do seu app Heroku
heroku config:set APP_URL="https://nome-do-seu-app.herokuapp.com"
```

**Importante:** Substitua `nome-do-seu-app` pelo nome real do seu app no Heroku.

### 2. Configurar Sessões para HTTPS

```bash
# Configurar cookie seguro para HTTPS
heroku config:set SESSION_SECURE_COOKIE=true

# Configurar driver de sessão (recomendado: database ou cookie)
heroku config:set SESSION_DRIVER=cookie

# Ou usar database (mais confiável no Heroku)
heroku config:set SESSION_DRIVER=database
```

### 3. Se usar SESSION_DRIVER=database, criar tabela de sessões

```bash
# Criar migration para tabela de sessões
heroku run php artisan session:table

# Executar migration
heroku run php artisan migrate --force
```

### 4. Verificar e Configurar APP_KEY

```bash
# Verificar se APP_KEY está configurado
heroku config:get APP_KEY

# Se não estiver ou estiver incorreto, gerar nova chave
php artisan key:generate --show

# Configurar no Heroku (substitua pela chave gerada)
heroku config:set APP_KEY="base64:sua-chave-aqui"
```

### 5. Limpar Todo o Cache

```bash
# Limpar todos os caches
heroku run php artisan config:clear
heroku run php artisan cache:clear
heroku run php artisan route:clear
heroku run php artisan view:clear

# Recriar cache de configuração
heroku run php artisan config:cache
heroku run php artisan route:cache
heroku run php artisan view:cache
```

### 6. Configurar Domínio da Sessão (Opcional)

```bash
# Deixar null para funcionar em qualquer domínio
heroku config:set SESSION_DOMAIN=null
```

### 7. Reiniciar a Aplicação

```bash
heroku restart
```

## Comandos Completos (Copiar e Colar)

Execute estes comandos na ordem (substitua `nome-do-seu-app`):

```bash
# 1. Configurar APP_URL
heroku config:set APP_URL="https://nome-do-seu-app.herokuapp.com"

# 2. Configurar sessões
heroku config:set SESSION_SECURE_COOKIE=true
heroku config:set SESSION_DRIVER=cookie
heroku config:set SESSION_DOMAIN=null

# 3. Limpar cache
heroku run php artisan config:clear
heroku run php artisan cache:clear
heroku run php artisan route:clear
heroku run php artisan view:clear

# 4. Recriar cache
heroku run php artisan config:cache
heroku run php artisan route:cache
heroku run php artisan view:cache

# 5. Reiniciar
heroku restart
```

## Verificar Todas as Configurações

```bash
# Ver todas as variáveis de ambiente
heroku config

# Verificar especificamente
heroku config:get APP_URL
heroku config:get APP_KEY
heroku config:get SESSION_SECURE_COOKIE
heroku config:get SESSION_DRIVER
```

## Solução Alternativa: Usar Database para Sessões

Se o problema persistir, use database para sessões:

```bash
# 1. Criar tabela de sessões
heroku run php artisan session:table

# 2. Fazer commit e deploy
git add database/migrations/*_create_sessions_table.php
git commit -m "Add sessions table"
git push heroku main

# 3. Executar migration
heroku run php artisan migrate --force

# 4. Configurar para usar database
heroku config:set SESSION_DRIVER=database

# 5. Limpar e recriar cache
heroku run php artisan config:clear
heroku run php artisan config:cache
heroku restart
```

## Verificar Logs para Mais Detalhes

```bash
# Ver logs em tempo real
heroku logs --tail

# Ver últimos logs
heroku logs --num 100
```

## Teste Rápido

Após configurar tudo, teste:

1. Acesse: `https://nome-do-seu-app.herokuapp.com`
2. Tente fazer login
3. Se ainda der erro 419, verifique os logs: `heroku logs --tail`

## Checklist Final

- [ ] APP_URL configurado corretamente com HTTPS
- [ ] SESSION_SECURE_COOKIE=true
- [ ] SESSION_DRIVER configurado (cookie ou database)
- [ ] APP_KEY configurado e válido
- [ ] Cache limpo e recriado
- [ ] Aplicação reiniciada
- [ ] Testado no navegador
