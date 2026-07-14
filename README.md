# University Delivery Service

## Project Overview
This project is a web-based application designed to facilitate delivery requests within a university campus. It provides a user-friendly interface for students or staff to place orders from various restaurants to specific buildings and floors within the university.

## Features
*   **Order Placement:** Users can submit delivery requests by providing their full name, phone number, selecting a restaurant, specifying the destination building and floor, detailing their order, and adding any extra notes.
*   **Navigation:** The application includes a navigation bar with links to the Home page, About Us, Contact Us, and a page to view existing requests.
*   **Contact Form:** A dedicated contact page (`contact.html`) allows users to send messages.
*   **Social Media Integration:** Links to various social media platforms are included in the footer.

## Technologies Used
*   **Frontend:** HTML, CSS, JavaScript
*   **Backend:** PHP (for `contact_process.php` and `process.php` to handle form submissions)

## Installation and Setup
To run this project locally, you will need a web server environment that supports PHP (e.g., Apache with PHP, Nginx with PHP-FPM, or XAMPP/WAMP).

1.  **Clone the repository:**
    ```bash
    git clone <repository_url>
    ```
2.  **Place the project files:** Copy the `CourseProject` directory into your web server's document root (e.g., `htdocs` for Apache).
3.  **Configure PHP:** Ensure your web server is configured to process PHP files.
4.  **Database (if applicable):** If `process.php` or `contact_process.php` interact with a database, you will need to set up the database and configure the connection details accordingly. (Based on initial review, this project seems to use basic PHP form handling without explicit database setup in the provided files, but this might be a future enhancement or external dependency).

## Usage
1.  Open `index.html` in your web browser.
2.  Fill out the delivery request form with the required details.
3.  Click "إرسال الطلب" (Send Request) to submit your order.
4.  You can navigate to `view_requests.html` to see submitted requests (this page would typically fetch data from a backend).

## Developer
Eng. Yahya Shalf

## License
[Specify your license here, e.g., MIT License]
