# Guia de Deploy no Heroku

## Pré-requisitos

1. Conta no Heroku: https://www.heroku.com
2. Heroku CLI instalado
3. Git instalado

## Passo a Passo Completo

### 1. Instalar Heroku CLI

```bash
# macOS
brew tap heroku/brew && brew install heroku

# Ou baixe de: https://devcenter.heroku.com/articles/heroku-cli
```

### 2. Fazer Login no Heroku

```bash
heroku login
```

### 3. Navegar para o Projeto

```bash
cd /Users/apple/Documents/Code2025/Emprestimo
```

### 4. Inicializar Git (se ainda não tiver)

```bash
git init
git add .
git commit -m "Initial commit"
```

### 5. Criar App no Heroku

```bash
heroku create nome-do-seu-app
# Exemplo: heroku create emprestimo-app
```

### 6. Adicionar Buildpack do PHP

```bash
heroku buildpacks:set heroku/php
```

### 7. Adicionar Buildpack do Node.js (para compilar assets)

```bash
heroku buildpacks:add heroku/nodejs
```

### 8. Adicionar Banco de Dados MySQL

```bash
# Opção 1: ClearDB (MySQL gratuito)
heroku addons:create cleardb:ignite

# Opção 2: JawsDB (MySQL alternativo)
heroku addons:create jawsdb:kitefin
```

### 9. Obter Credenciais do Banco de Dados

```bash
# Para ClearDB
heroku config:get CLEARDB_DATABASE_URL

# Para JawsDB
heroku config:get JAWSDB_URL
```

O formato será: `mysql://usuario:senha@host:porta/database`

### 10. Configurar Variáveis de Ambiente

```bash
# Gerar chave da aplicação
php artisan key:generate --show

# Configurar no Heroku
heroku config:set APP_KEY="sua-chave-gerada-aqui"
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set APP_URL="https://nome-do-seu-app.herokuapp.com"

# Configurar banco de dados (ajuste conforme suas credenciais)
heroku config:set DB_CONNECTION=mysql
heroku config:set DB_HOST="seu-host-mysql"
heroku config:set DB_PORT=3306
heroku config:set DB_DATABASE="nome-do-banco"
heroku config:set DB_USERNAME="usuario"
heroku config:set DB_PASSWORD="senha"

# Outras configurações
heroku config:set LOG_CHANNEL=errorlog
heroku config:set LOG_LEVEL=error
```

### 11. Configurar Storage Público

```bash
heroku run php artisan storage:link
```

### 12. Fazer Deploy

```bash
git add .
git commit -m "Prepare for Heroku deployment"
git push heroku main
# ou
git push heroku master
```

### 13. Executar Migrations

```bash
heroku run php artisan migrate --force
```

### 14. Executar Seeders (opcional)

```bash
heroku run php artisan db:seed --force
```

### 15. Limpar Cache

```bash
heroku run php artisan config:cache
heroku run php artisan route:cache
heroku run php artisan view:cache
```

### 16. Verificar Aplicação

```bash
heroku open
```

## Comandos Úteis

### Ver Logs
```bash
heroku logs --tail
```

### Acessar Console Laravel
```bash
heroku run php artisan tinker
```

### Executar Comandos Artisan
```bash
heroku run php artisan [comando]
```

### Ver Variáveis de Ambiente
```bash
heroku config
```

### Reiniciar Aplicação
```bash
heroku restart
```

## Troubleshooting

### Erro: "No web processes running"
```bash
heroku ps:scale web=1
```

### Erro de Permissões no Storage
```bash
heroku run chmod -R 775 storage bootstrap/cache
```

### Limpar Cache Completo
```bash
heroku run php artisan cache:clear
heroku run php artisan config:clear
heroku run php artisan route:clear
heroku run php artisan view:clear
```

### Verificar Buildpacks
```bash
heroku buildpacks
```

## Notas Importantes

1. O Heroku usa PostgreSQL por padrão, mas você pode usar MySQL com ClearDB ou JawsDB
2. O arquivo `.env` não é commitado, use `heroku config:set` para variáveis
3. O storage precisa ser linkado: `php artisan storage:link`
4. Assets precisam ser compilados: `npm run production`
5. O Heroku reinicia a aplicação automaticamente após o deploy

## Limites do Plano Gratuito

- 550-1000 horas de dyno por mês
- Banco de dados limitado (ClearDB: 5MB, JawsDB: 5MB)
- Aplicação "dorme" após 30 minutos de inatividade
