FROM php:8.0-fpm

# 필수 패키지 설치
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libicu-dev \
    libonig-dev \
    zip \
    unzip \
    libzip-dev \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*  # 불필요한 패키지 삭제하여 이미지 크기 최적화

# GD 확장 설치 (PHP 7.4 이상은 --with 옵션이 바뀜)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# ZIP 확장 설치 (libzip 지원)
RUN docker-php-ext-configure zip && \
    docker-php-ext-install zip

# 기타 PHP 확장 설치
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring bcmath exif intl opcache

# 작업 디렉토리 설정
WORKDIR /var/www/html
