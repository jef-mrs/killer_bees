# Technical Test: Bees

This document outlines the implementation of a PHP application that simulates a bee-hitting game, developed using the Symfony framework.


## Implementation Details

* **Framework:**
    * Built upon the **Symfony** framework, leveraging its robust components and features.
* **Controllers:**
    * Symfony controllers handle user requests, process game logic, and render the appropriate views.
* **Services:**
    * Custom services are created to manage game logic, handle bee interactions, and maintain game state.
* **Database:**
    * **MySQL** is used to store game data,
* **Twig Templates:**
    * The user interface is rendered using Twig templates, offering flexibility and maintainability.
* **JavaScript:**
    * **StimulusJS** is used to enhance the user experience by dynamically updating the game interface without requiring full page reloads. This provides a more responsive and engaging gameplay experience.


## Running the Application

1. **Prerequisites:**
    * Ensure you have PHP and Composer installed on your system.
    * Install the Symfony CLI: `composer global require symfony/cli`
2. **Setup:**
    * Clone or download the application files.
    * Navigate to the project directory in your terminal.
    * Install project dependencies: `composer install`
    * Create and configure the database.
    * Set up the Symfony server: `symfony server:start`
3. **Run:**
    * Open a web browser and navigate to the URL of the running server (e.g., `http://127.0.0.1:8000`).
    * The game interface will be displayed.
    * Click the "hit" button to interact with the game.

## Additional Notes

* For detailed implementation information, please refer to the project's source code and documentation.
