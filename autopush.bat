@echo off
echo ========================================================
echo   WYNE STORE - AUTOMATIC GIT AUTO-COMMIT & AUTO-PUSH
echo ========================================================
git add .
git commit -m "auto update: %date% %time%"
git push origin main
echo ========================================================
echo   SUCCESSFULLY PUSHED TO GITHUB!
echo ========================================================
pause
