# Doctrine ORM PHP

## 💻 Description
<p>Project made using the Doctrine ORM of PHP</p>

## About Doctrine ORM
<p>A brief introduction to what an ORM is, before talking about Doctrine. The ORM (Object Relational Mapper) is a tool that helps to map an object-oriented model to a relational model in the database.</p>

<p>And Doctrine helps us to migrate between databases, for example, making it easy to migrate from PostgreSQL to Oracle or SQLite to MySQL.</p>

## 🚀 Technology Utilizated
<p>The following tools were used in the building of the project:</p>

- PHP
- composer
- Doctrine
- symfony/cache
- doctrine/migrations

## How to use?
1. In this first part you will clone the repository:
    ```bash
         git clone https://github.com/leticiadia/doctrine-orm-php.git
    ```
2. Next you will enter the directory:
    ```bash 
        cd doctrine-orm-php
    ```
3. The next step is to install the dependencies:
    ```bash
        composer install
    ```       

## How it works?
<p>Open your terminal and type the following command to create a student, passing the student's name and phone number:</p>

```bash
	php commands\student-create.php "Ana Paula" "(21) 88888 - 8888"
```

<p><b>Note:</b> You can enter more than one phone for the student.</p>

<p>The next step is to verify that this student was actually added. While still in the terminal, type the following command:</p>

```bash
	php commands\student-search.php 
```

<p>Now let's create a course, in your terminal type the following command:</p>

```bash
	php commands\course-create.php "DoctrineExemplo"
```

<p>Now insert the course for a student, passing the student ID and then the course ID:</p>

```bash
	php commands\insert-student-course.php "1" "1"
```
<p>Finally, we can now call up your student repository to see the student, phone number, and the course it's linked to:</p>

```bash
	php commands\report-courses-by-student-repository.php
```

<p><b>Note:</b> The report-courses-by-student.php and report-courses-by-student-dql.php files don't use, as they were created for studies only</p>

## 👩‍💻 Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## 👩‍🚀 Author 
<p>Developed with 💜 by Leticia Dias</p>