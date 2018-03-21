cd %~dp0

if "%1"=="" (
	set /P PW=Please enter root password:
) else (
	set PW=%1
)

cmd /c "mysql -uroot -p%PW% < .\Delete_Database.sql"

pause