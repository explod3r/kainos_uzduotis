# Random String Generators and Converters

This PHP application demonstrates the use of Symfony's Dependency Injection component to generate random strings, apply transformations, and implement converters. The app supports generating random strings, arrays of strings, and converting them using various methods like ROT13 and letters alphabetical possition to number transformations.

## Features

- **Random String Generator**: Generates alphanumeric strings of configurable length.
- **Random String Array Generator**: Generates an array of random strings with configurable size and length.
- **Converters**:
  - **String Converter**: Converts strings to a pattern based on character positions in alphabet.
  - **ROT13 Converter**: Encodes strings using the ROT13 cipher.
- **Tools**:
  - **PHPStan**: Static code analysis.
  - **PHP_CodeSniffer**: Ensures PSR-12 coding standards.
  - **PHPUnit**: Unit testing for the app.

## Requirements

- Docker (recommended)

OR

- PHP 8.3
- Composer

## Installation (with Docker)

1. Clone the repository:

    ```bash
    git clone git@github.com:explod3r/kainos_uzduotis.git
    cd kainos_uzduotis/docker
    ```

2. Install dependencies:

    ```bash
    docker-compose up -d
    docker-compose exec php "/bin/bash"
    composer install
    ```

3. Run the application:

    ```bash
    php public/index.php
    ```

4. Run tests (optional):

    ```bash
    composer test
    ```

5. Run PHPStan for static analysis (optional):

    ```bash
    composer phpstan
    ```

6. Run PHP_CodeSniffer to check coding standards (optional):

    ```bash
    composer phpcs
    ```


## Installation (without Docker)

1. Clone the repository:

    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Run the application:

    ```bash
    php public/index.php
    ```

4. Run tests (optional):

    ```bash
    composer test
    ```

5. Run PHPStan for static analysis (optional):

    ```bash
    composer phpstan
    ```

6. Run PHP_CodeSniffer to check coding standards (optional):

    ```bash
    composer phpcs
    ```
