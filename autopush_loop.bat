@echo off
title Wyne Store - Continuous Auto-Push Watcher
echo ========================================================
echo   WYNE STORE - AUTOMATIC CONTINUOUS FILE WATCHER & PUSH
echo ========================================================
echo Watching project directory for changes...
:loop
git status --porcelain | findstr /R "." >nul
if %errorlevel% == 0 (
    echo.
    echo [AUTO-PUSH] Pembaruan file terdeteksi! Mengirim ke GitHub & Vercel...
    git add .
    git commit -m "auto sync update: %date% %time%"
    git push origin main
    echo [AUTO-PUSH] Berhasil terdorong ke GitHub & Vercel!
)
timeout /t 5 /nobreak >nul
goto loop
