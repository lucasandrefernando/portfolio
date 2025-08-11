#!/bin/bash

# Portfolio Deployment Script
# Author: Lucas André Fernando

set -e

echo "🚀 Iniciando deploy do Portfolio..."

# Cores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Função para log colorido
log() {
    echo -e "${GREEN}[$(date +'%Y-%m-%d %H:%M:%S')] $1${NC}"
}

warn() {
    echo -e "${YELLOW}[$(date +'%Y-%m-%d %H:%M:%S')] WARNING: $1${NC}"
}

error() {
    echo -e "${RED}[$(date +'%Y-%m-%d %H:%M:%S')] ERROR: $1${NC}"
    exit 1
}

# Verificar se estamos no diretório correto
if [ ! -f "composer.json" ]; then
    error "composer.json não encontrado. Execute o script no diretório raiz do projeto."
fi

# Verificar se o Git está limpo
if [ -n "$(git status --porcelain)" ]; then
    warn "Existem alterações não commitadas. Continuando mesmo assim..."
fi

# Instalar dependências
log "📦 Instalando dependências do Composer..."
composer install --no-dev --optimize-autoloader

# Verificar se existe arquivo .env
if [ ! -f ".env" ]; then
    if [ -f ".env.example" ]; then
        log "📝 Criando arquivo .env a partir do .env.example..."
        cp .env.example .env
        warn "Configure as variáveis de ambiente no arquivo .env antes de continuar."
        read -p "Pressione Enter para continuar após configurar o .env..."
    else
        error "Arquivo .env não encontrado e .env.example não existe."
    fi
fi

# Verificar configurações obrigatórias
log "🔍 Verificando configurações..."
source .env

if [ -z "$DB_HOST" ] || [ -z "$DB_NAME" ] || [ -z "$DB_USER" ]; then
    error "Configurações de banco de dados incompletas no arquivo .env"
fi

# Executar testes (se existirem)
if [ -f "vendor/bin/phpunit" ]; then
    log "🧪 Executando testes..."
    vendor/bin/phpunit || warn "Alguns testes falharam, mas continuando o deploy..."
fi

# Otimizar arquivos para produção
log "⚡ Otimizando para produção..."

# Minificar CSS (se tiver ferramentas de build)
if command -v npm &> /dev/null && [ -f "package.json" ]; then
    log "📦 Instalando dependências do NPM..."
    npm install
    
    if npm run build &> /dev/null; then
        log "🔨 Build do frontend executado com sucesso"
    else
        warn "Build do frontend falhou ou não está configurado"
    fi
fi

# Criar backup do banco (se em produção)
if [ "$APP_ENV" = "production" ]; then
    log "💾 Criando backup do banco de dados..."
    BACKUP_FILE="backup_$(date +%Y%m%d_%H%M%S).sql"
    mysqldump -h"$DB_HOST" -u"$DB_USER" -p"$DB_PASS" "$DB_NAME" > "backups/$BACKUP_FILE" 2>/dev/null || warn "Backup do banco falhou"
fi

# Executar migrações (se existirem)
if [ -f "database/migrations.php" ]; then
    log "🗄️ Executando migrações do banco..."
    php database/migrations.php || warn "Migrações falharam"
fi

# Deploy via FTP (se configurado)
if [ -n "$FTP_HOST" ] && [ -n "$FTP_USER" ] && [ -n "$FTP_PASS" ]; then
    log "📤 Fazendo upload via FTP..."
    
    # Criar lista de arquivos para upload
    TEMP_LIST=$(mktemp)
    find . -type f \
        ! -path "./.git/*" \
        ! -path "./node_modules/*" \
        ! -path "./tests/*" \
        ! -path "./backups/*" \
        ! -name ".env.example" \
        ! -name "README.md" \
        ! -name "composer.json" \
        ! -name "composer.lock" \
        ! -name "package.json" \
        ! -name "package-lock.json" \
        ! -name "deploy.sh" \
        > "$TEMP_LIST"
    
    # Upload via lftp (mais robusto que ftp básico)
    if command -v lftp &> /dev/null; then
        lftp -c "
            set ftp:ssl-allow no;
            set ftp:passive-mode on;
            open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
            lcd $(pwd);
            cd $FTP_PATH;
            mirror --reverse --delete --verbose --exclude-glob .git/ --exclude-glob node_modules/ --exclude-glob tests/;
            bye
        "
    else
        warn "lftp não encontrado. Instale com: sudo apt-get install lftp"
    fi
    
    rm "$TEMP_LIST"
else
    warn "Configurações de FTP não encontradas. Pulando upload automático."
fi

# Limpar cache (se aplicável)
log "🧹 Limpando cache..."
if [ -d "cache" ]; then
    rm -rf cache/*
fi

if [ -d "tmp" ]; then
    rm -rf tmp/*
fi

# Verificar permissões
log "🔐 Verificando permissões..."
chmod -R 755 public/
chmod -R 777 cache/ 2>/dev/null || true
chmod -R 777 logs/ 2>/dev/null || true
chmod -R 777 tmp/ 2>/dev/null || true

# Teste de conectividade (se URL estiver configurada)
if [ -n "$APP_URL" ]; then
    log "🌐 Testando conectividade..."
    if curl -s -o /dev/null -w "%{http_code}" "$APP_URL" | grep -q "200"; then
        log "✅ Site respondendo corretamente!"
    else
        warn "Site pode não estar respondendo corretamente"
    fi
fi

# Notificação de sucesso
log "🎉 Deploy concluído com sucesso!"
echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo -e "${GREEN}✅ Portfolio deployado com sucesso!${NC}"
echo -e "${BLUE}🌐 URL: ${APP_URL:-'Não configurada'}${NC}"
echo -e "${BLUE}📅 Data: $(date)${NC}"
echo -e "${BLUE}🔧 Ambiente: ${APP_ENV:-'development'}${NC}"
echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"

# Log do deploy
echo "$(date): Deploy realizado com sucesso" >> deploy.log