## With Backend:
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan serve (Local)

## With Frontend:
cd frontend
npm install
npm run dev