# Legislation-Process-Management-System
Legislation Process Management System for the Federal Parliament of Canada

# Team Members
Chelsi Dodia (Tech Lead / Full Stack Developer) 

Jenish Tarsariya (Front End Developer)

Gurusharan Singh (Tester)

# Work Distribution
Chelsi Dodia - Tech Lead, Full Stack, Data Architect, Documentation

Jenish Tarsariya - Full Stack (Frontend, Backend), Data Architect

Gurusharan Singh - Tester, Diagrams

# Description
The Legislation Process Management System is designed to streamline and digitize the processes of drafting, reviewing, and voting on legislation within the Federal Parliament of Canada. The system aims to support legislators, administrative staff, and stakeholders by providing an integrated platform for managing legislative documents, facilitating secure voting, and ensuring transparent access to legislative records.

# Project Structure

1.	Controllers:
o	AuthController: Manages user authentication, including login and registration functions.
o	BillController: Handles actions related to bill management, such as creating, editing, deleting, and retrieving bills.
o	VotingController: Manages voting on bills, including submitting votes and retrieving vote data.

2.	Models:
o	Bill: Manages bill data stored in bills.json, providing methods for CRUD operations.
o	User: Handles user data stored in users.json, offering functions for user retrieval and registration.
o	Vote: Manages vote data in votes.json, allowing votes to be stored and retrieved.

3.	Data Storage:
o	JSON files (bills.json, users.json, and votes.json) store data related to bills, users, and votes, respectively.

# Directories Explanation

1. index.php
•	Purpose: Acts as the entry point for the application, routing requests to the appropriate controller based on user actions.
•	Functionality:
o	Initializes the environment, loading any necessary dependencies (e.g., from composer.json if using Composer).
o	Loads routes from the routes/web.php file, defining which controller and method to call for each route.
o	Starts the session and handles basic setup for user interactions.

2. routes/web.php
•	Purpose: Defines application routes, linking specific URLs to controller methods.
•	Structure:
o	Authentication Routes: Define routes for login (AuthController@login) and registration (AuthController@register).
o	Bill Management Routes: Direct requests to BillController methods for actions like creating, updating, and viewing bills.
o	Voting Routes: Route requests to VotingController for voting actions and retrieving voting results.

3. helpers/session_helper.php
•	Purpose: Manages session-related functions, providing utilities for handling user login states and permissions.
•	Core Functions:
o	checkSession(): Verifies if a user session is active; if not, it redirects to the login page.
o	logout(): Destroys the current session, effectively logging the user out.
o	setSessionData(): Sets session variables for logged-in users, such as username or user role.

4. controllers/ (Directory)
•	Purpose: Handles the core business logic, processing requests and preparing data for the views.
•	Core Controllers:
o	AuthController.php: Manages login and registration, interacting with User model for user authentication and data handling.
o	BillController.php: Manages CRUD operations for bills, including retrieving bill data for listing in the views.
o	VotingController.php: Manages the voting process, interacting with Vote model to record and retrieve vote data.

5. models/ (Directory)
•	Purpose: Represents the data structure, encapsulating data handling and interactions with the JSON files in the data/ directory.
•	Core Models:
o	User.php: Handles user data (stored in users.json), including adding and retrieving user information, verifying passwords.
o	Bill.php: Manages legislative bill data, handling CRUD operations and storing bills in bills.json.
o	Vote.php: Manages vote data, recording user votes and storing them in votes.json.

6. views/ (Directory)
•	Purpose: Contains the user interface templates, displaying information based on data from controllers.
•	Core Views:
o	login.php and registration.php: Form views for user login and registration.
o	dashboard.php: Main dashboard view, showing a list of active bills and their statuses.
o	bill.php and billReview.php: Views for creating, editing, and reviewing bills.
o	voting.php: Displays voting options for users to vote on bills.

7. data/ (Directory)
•	Purpose: Stores application data in JSON format, providing a lightweight alternative to a database.
•	Core Files:
o	bills.json: Stores information on each legislative bill.
o	users.json: Holds registered user data, including usernames and hashed passwords.
o	votes.json: Records votes on bills, associating each vote with a bill ID and user ID.
