@echo off
start chrome http://localhost/warehouse/managers/history/monthly-report
timeout /t 10 >nul
taskkill /IM chrome.exe /F