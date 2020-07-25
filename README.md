# API Development Project Codeigniter 4

Implementation a REST API that calls from local server and external API service to get information about books

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
install 
 wamp or 
 xamp or 
 mamp 
 
 &
 Postman 
 
software in your system
```

### Installing

A step by step series of examples that tell you how to get a development env running


```
1. Clone or download the project to your local system
```
```
2. Creat a database name"ci4_api" in your system database
```
```
3. Import the database "ci4_api.sql" in the db folder
```
```
4. Run the project using comand line int the root dir of the project 
```
```
5. run code:  php spark serve
```
```
6. Browse the link "http://localhost:8080" 
```

And 

```
7. http://localhost:8080/api/v1/books
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Explain how to run the automated tests for this system

### Running the Project

On your project dir,open your Terminal 
Run the code
```
php spark serve
```

### Break down into end to end tests And coding style tests


```
READ & SEARCH
GET Request : http://localhost:8080/api/v1/books
              http://localhost:8080/api/v1/books?search=Books
              http://localhost:8080/api/v1/books/1
              http://localhost:8080/api/externalBook
              http://localhost:8080/api/externalBook?nameOfABook=A Storm of Swords

CREATE
Post Request : http://localhost:8080/api/v1/books
Post Required Data *name,isbn,authors,number_of_pages,publisher,publisher,country,release_date*

UPDATE
PUT Request : http://localhost:8080/api/v1/books/1
PUT Data *name,isbn,authors,number_of_pages,publisher,publisher,country,release_date*

DELETE
Delete Request : http://localhost:8080/api/v1/books/1

```

## Built With

* [Codeigniter 4 ](https://codeigniter4.github.io/userguide/) - The web framework used
* [MySql](https://maven.apache.org/) - Database
* [Ice And Fire API](https://anapioficeandfire.com/Documentation) - Used to generate Rest Api Feeds


