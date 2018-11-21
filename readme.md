This is a CRUD application based on T2S assignment to solve the following problems:
Touch2Success is in need of an API to interact with it's Store and Customer data. Create an API in any programming language using any datastore based on the requirements specified below.
User stories
Story 1 - Retrieving a Store by ID
As a API consumer I want to retrieve a stores details by a stores ID So that I can view the store details
Acceptance criteria
•	Accept Store ID as a parameter
•	Return all Store details for the requested Store ID
________________________________________
Story 2 - Retrieving list of Stores
As an API consumer I want to retrieve a list of stores with id's and names So that I can view the list of stores
Acceptance criteria
•	Return all Stores. Only Store ID and Store Name
________________________________________
Story 3 - Update a Store
As an API consumer I want to update any data belonging to a particular store So that I can update any store details as and when required
Acceptance criteria
•	Able to update any data for a Store
•	Requested Update Data is validated (best guess) 
o	Informative & relevant error message returned for invalid data
•	Requested Update Data is sanitised
•	Requested Update Data is formatted
________________________________________
Story 4 - Retrieving list of Stores w/ total customers count
As an API consumer I want to retrieve a list of storex along with their total customers count So that I can view how many customers each store has
Acceptance criteria
•	Return all Stores. Only Store ID, Name and Total Customer count
________________________________________
Story 5 - Retrieve a Stores Customers
As an API consumer I want to retieve a list of all the customers belonging to a particular store So that I can see which customers the store has
Acceptance criteria
•	Return a list of Store Customer. Only firstname, lastname, Email.
•	Only display the customers for the given Store
________________________________________
Story 6 - Create a Customer
As an API consumer I want to create a customer for a particular store So that added customers to my database
Acceptance criteria
•	Ability to create a customer (all data)
•	Must not create customer unless firstname, lastname, email and store id are present and valid.
•	Requested Create Data is validated (best guess) 
o	Informative & relevant error message returned for invalid data
•	Requested Create Data is sanitised
•	Requested Create Data is formatted
________________________________________
Story 7 - Search for Store
As an API consumer I want to search a store by name So that I find the a store if it exists
Acceptance criteria
•	Ability to search partial name or full name of Store
•	Maximum of 5 results returned.
•	Return Store id and name
________________________________________
Story 8 - Authentication
As an API provider I want to ensure only authorised user can access my API So that my data is protected and secure
Acceptance criteria
•	Unauthorised requests should return denied when attempting to access to any endpoint
•	Authorisation requested should return the expected response
________________________________________
Story 9 - Database Optimisation
As an API Provider I want to ensure my database is optimised So that performance is faster for my api consumers
Acceptance criteria
•	Optimised for performance
Run the application
To run the application you need to create a database called “dataset”. The username for the database is “root” with empty password.
There are two databases called “customers” with the following columns:
'Id','StoreId','Firstname','Lastname','Phone','Email','updated_at','created_at'
As well as “stores” database table with the following columns:
'StoreId','Phone','Name','Domain','Status','Street','State','updated_at','created_at'
Both tables could be seeded from the following database tables in csv format.
https://github.com/uktech/Recruitment/tree/master/API/dataset
Once, database tables are seeded the application is ready to run.
Result
Based on the feedback from the recruiter team, the application successfully passed the main objectives. 

