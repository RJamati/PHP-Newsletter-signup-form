# PHP-Newsletter-signup-form

This project uses PHP to POST and store the email addresses into a MySQL database.

The PHP code includes validation to ensure that no duplicate or invalid emails can be submitted.

The design of the form is created using HTML and CSS.

The email address entered is trimmed and converted to lowercase, in addition the email validation is done using PHP's filter_var() function.

The SQL database is queried for existing email addresses to the one posted in the form and throws an error or success message accordingly. The connection to the database is then closed.
