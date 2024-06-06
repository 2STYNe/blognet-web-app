# A Simple Blog App Using PHP And MySQL

This simple blog application provides a user-friendly platform for bloggers to publish their posts online.

## Setup

-   Start the Apache and MySQL server from the XAMPP control panel.

-   Extract the downloaded git project folder in the htdocs folder(present in the XAMPP folder). Generally during installation the XAMPP is installed in the C: Drive of your computer.

-   To create client's database go to: <http://localhost/phpmyadmin>

-   Start by creating a new database from the left sidebar named as 'blog_db' with the default server connection collation settings.

-   After creating the database create a table named as 'blog_table' with 5 columns for id, title, date_of_creation, paragraph and image_filename.

-   The first column is 'id' which is an integer. Check the Auto Increment checkbox which will also make this field the primary key.

-   The next column will be for the 'Post Title' and we'll make this a text type field.

-   The next column is for the 'Date of the Created Post' which we'll make a text type field.

-   The next column will be of 'Post Paragraph' which we'll make a text type field.

-   The next column will be of 'Image Filename' which we'll make a text type field.

-   After creating the database table you may test it by visiting this link in your browser: <http://localhost/blog-using-php-mysql-main/>

-   Alternatively, you can create the database by running the db.sql file content in localhost/phpAdmin/ SQL tab

## Features

-   On the home page `index.php` all the created posts are displayed.

-   Current date and time will be automatically inserted into the post during the time of post creation.

-   It has features like post deletion, editing existing post and more.
