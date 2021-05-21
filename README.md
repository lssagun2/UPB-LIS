# UPB Library Inventory System

## Prerequisites

This program requires [XAMPP](https://www.apachefriends.org/index.html) to handle server-side scripts (PHP codes) and to create the MySQL database.

## Goals

The following are the list of the goal functionalities for the software:
-   [x] Initial user interface
-   [x] Initial database structure
-   [x] Add and edit functions for the materials page
-   [x] Inventory using accession number
-   [x] Viewing of the changes in the information of materials
-   [x] Generation of report
-   [x] Inventory using barcode scanner
-   [x] Adding new staff information
-   [x] Updating of staff information
-   [ ] Backup and restore system
-   [x] Sorting capabilities for the tables
-   [x] Adding table pagination
-   [ ] Working to-do list in the dashboard page
-   [ ] Working forum in the dashboard page
-   [x] Improve querying speed

## Installation

Follow the following instructions to install the program:
1. Download the repository as a .zip file.
2. Locate your XAMPP installation folder.
3. Go to XAMPP/htdocs and create a folder named upb-lis
4. From the .zip file, open the folder and extract all php files and folders into XAMPP/htdocs/upb-lis.

## Usage

Follow the instructions to use the program:
1. Open XAMPP and start Apache and MySQL modules.
2. For first run, initialize the program by loading the following in browser:
    ```
    localhost/upb-lis/initialize.php
    ```
3. Go to
    ```
    localhost/phpmyadmin
    ```
    and insert an entry into staff table.
4. After inserting an entry, go to 
    ```
    localhost/upb-lis/index.php
    ```
    and use the log-in credentials created.
