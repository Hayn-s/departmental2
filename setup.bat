@echo off
setlocal
cd /d "%~dp0"
echo ===============================================
echo Pickleball Inventory - Initial Setup
echo ===============================================
where composer >nul 2>nul
if errorlevel 1 (
  echo ERROR: Composer is not installed or is not in PATH.
  echo Install Composer, reopen Command Prompt, and run setup.bat again.
  pause
  exit /b 1
)
if not exist .env copy .env.example .env
composer install
if errorlevel 1 goto failed
php artisan key:generate
if errorlevel 1 goto failed
echo.
echo Setup dependencies and application key are ready.
echo IMPORTANT: Create the pickleball_inventory database in phpMyAdmin,
echo then update DB settings in .env before running:
echo     php artisan migrate --seed
echo     php artisan serve
pause
exit /b 0
:failed
echo Setup failed. Review the error above and try again.
pause
exit /b 1
