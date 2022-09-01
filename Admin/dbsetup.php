<?php
require_once("header.php");
//ensure you login in index.php admin before requesting dbsetup.php in url
createTable('Toolbox','toolbox_id INTEGER NOT NULL AUTO_INCREMENT, tool_name varchar(70) not null, PRIMARY KEY(toolbox_id)');
createTable('Certificate','certificate_id INTEGER NOT NULL AUTO_INCREMENT, title varchar(70) not null, img varchar(100) not null, toolbox_id INTEGER, verification varchar(100) not null, PRIMARY KEY(certificate_id), CONSTRAINT FOREIGN KEY(toolbox_id) REFERENCES Toolbox (toolbox_id) ON UPDATE CASCADE ON DELETE SET NULL');
createTable('Project','project_id INTEGER NOT NULL AUTO_INCREMENT, project_name varchar(70) not null, img varchar(100) not null,description varchar(300) not null, PRIMARY KEY(project_id)');
createTable('Message','message_id INTEGER NOT NULL AUTO_INCREMENT, email varchar(30) not null, content varchar(500) not null, PRIMARY KEY(message_id)');
?>