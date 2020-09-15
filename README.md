# requestDBAPP

This is a small app developed with Javascript (FrontEnd) and PHP (backend)

This app uses JQUERY library

## Installation

- All the `code` required to get started
- You should to specify some data on `request.php`:
  ```PHP
    $server = "yourServer";
    $serverInfo = ['Database'=>'database_name', 'UID'=>'yourUserID', 'PWD'=>'yourPASSWORD'];
  ```
- Change queries on `request.php`
  
  ```PHP
    $query1 = "SELECT * FROM [table_1_name] WHERE [search_param]='" . $id . "'";
    $query2 = "SELECT * FROM [table_2_name] WHERE [search_param]='" . $id . "'";
    $query3 = "SELECT * FROM [table_3_name] WHERE [search_param]='" . $id . "'";
  ```
  
  
  [![Image1](https://raw.githubusercontent.com/gbsfDeveloper/requestDBAPP/master/src/querySearch.PNG?v=3&s=200)]

### Clone

- Clone this repo to your local machine using `https://github.com/gbsfDeveloper/requestDBAPP`
