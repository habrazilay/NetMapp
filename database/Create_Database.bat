cd %~dp0

cmd /c "mysql -uroot < .\Creation-Querys\baseDBCreation.sql"
cmd /c "mysql -uroot < .\Creation-Querys\securityDBCreation.sql"
cmd /c "mysql -uroot < .\Creation-Querys\projectDBCreation.sql"
cmd /c "mysql -uroot < .\Creation-Querys\projectSettingsDBCreation.sql"
cmd /c "mysql -uroot < .\Creation-Querys\mappingDBCreation.sql"

cmd /c "mysql -uroot < .\Insertion-Querys\baseDBInsertion.sql"
cmd /c "mysql -uroot < .\Insertion-Querys\projectDBInsertion.sql"

pause 