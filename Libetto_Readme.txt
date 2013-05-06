/* Einrichtung der Entwicklungsumgebung */

Nachdem das Projekt erfolgreich "geklont" wurde, muss zunächst der Composer und 
die benötigten Symfony Bundles geladen werden. Die Einrichtung kann entweder 
manuell oder mit Hilfe des "Ant" Build.xml Skriptes geschehen. 

Für die Konfiguration über das Build-Skript sind die folgenden Tasks in der hier 
angegebenen Reihenfolge auszuführen:

Task 1: 1_InitEnviroment
Durch diesen Task wird die Datei app\config\parameters.yml angelegt und der 
Composer heruntergeladen. Im Anschluss muss, bevor der 2. Task gestartet wird,
in der parameters.yml die Datenbankverbindung für den eigenen PC angepasst 
werden.

Task 2: 2_InstallDependencies oder 2_InstallDependenciesWithUser
In diesem Task werden die benötigten Symfony Bundles heruntergeladen und die 
Datenbank eingerichtet. Auf Wunsch können auch direkt die folgenden zwei Benutzer
mit angelegt werden.

Benutzername: admin
Passwort: admin
Benutzergruppe: ROLE_SUPER_ADMIN

Benutzername: demo
Passwort: demo
Benutzergruppe: (keine)

Hiernach sollte die Applikation über die folgende URL erreichbar sein.
http://localhost/path/to/your/project/web/app_dev.php (Demo-Seite)
oder
http://localhost/path/to/your/project/web/app_dev.php/login (Loginseite)

FERTIG.