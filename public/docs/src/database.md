[Index](./index.html)

# Database Configuration

## Table of Contents

- [Database Configuration](#database-configuration)
	- [Table of Contents](#table-of-contents)
	- [General](#general)
	- [Tools Used](#tools-used)
	- [Initialization](#initialization)
	- [Tear Down](#tear-down)

## General
The database is a run on an external MySQL server.

All related documentation, scripts, etc are located in the  `<project_root>/database/` directory.

Information about the database schema can be found in a document called
`schema.md`.

## Tools Used

To develop the database we used MYSQL WorkBench. [Provider Documentation](https://dev.mysql.com/downloads/workbench/5.2.html) for more information on documentation and installation instruction.
To be able to install or run MySQL Workbench on any system, the following libraries have to be installed:
1) Microsoft .NET Framework 4.5  [Provider Insatllation](https://www.microsoft.com/en-us/download/details.aspx?id=30653)
2) Visual C++ Redistributable for Visual Studio 2015 [Provider Installation](https://www.microsoft.com/en-us/download/details.aspx?id=48145)

## Initialization
The database must be initialized by running a script called `create_db.sql`
located in the `sql_scripts` sub-directory. This script must run on a MySQL
server instance inside of an empty database schema. This can be done in
a SQL graphical editor or more simply executed using the MySQL command
line utility.
Go to the `<project_root>/database/sql_scripts` directory.
To access MySQL command prompt for server, bash execute:
```
mysql -h <SQL_server_address> -u <SQL_server_username> -p <schema_name>
```

Enter password and execute:
```
source create_db.sql
```

This will execute a series of queries which will build all database
tables, define triggers, and create a default user `admin` with password
`secret`. Please change default password immediately.

## Tear Down
To COMPLETELY DESTROY the database, follow instructions from [Initialization](#database-initialization) to enter MySQL command prompt inside of the `sql_scripts` directory and execute:
```
source delete_db.sql
```
