cd %~dp0


if "%1"=="" (
	set /P PW=Please enter root password:
) else (
	set PW=%1
)

cmd /c "mysql -uroot -p%PW% < .\Creation-Querys\baseDBCreation.sql"
cmd /c "mysql -uroot -p%PW% < .\Creation-Querys\securityDBCreation.sql"
cmd /c "mysql -uroot -p%PW% < .\Creation-Querys\projectDBCreation.sql"
cmd /c "mysql -uroot -p%PW% < .\Creation-Querys\projectSettingsDBCreation.sql"
cmd /c "mysql -uroot -p%PW% < .\Creation-Querys\mappingDBCreation.sql"

cmd /c "mysql -uroot -p%PW% < .\Insertion-Querys\baseDBInsertion.sql"
cmd /c "mysql -uroot -p%PW% < .\Insertion-Querys\projectDBInsertion.sql"

pause 