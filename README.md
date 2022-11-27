
# To Do App

This is a simple to do application using PHP (no framework) and SQLite

Make sure you have installed the most stable version of the following:

`composer`
`nodejs`


## Business Rules
+ Add and view tasks
+ Delete a task
+ Complete a task
+ Set a priority for my tasks
+ View the tasks sorted by priority and name
+ View the number of total and completed tasks


## Setting Up

Install packages

```bash
  composer install
  npm install
```
    
## Run CSS/Sass

Run either the following to create the CSS file for the project:

```bash
  npm run sass-compile-dev (for development)
  npm run sass-compile (for final)
```


## Environment Variables

To run this project, you will need to add the following environment variables to your .env file
```
DB_PATH=path_to_database.db
DB_NAME=name_of_database
APP_DOMAIN=http://localhost
APP_NAME=root_folder_name

```

