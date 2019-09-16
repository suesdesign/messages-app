# Messages App

Leave a message and display, edit and delete all the messages.

## Instructions

Create a database named messages, assign a user to it with the name of messages with a password. The password is iixDQwcHBGEks&!k in this example, change it to something else and update the file called db.php with the new password.

Do the following SQL query on the database:

```
CREATE TABLE IF NOT EXISTS `msg` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`firstname` varchar(50) NOT NULL,
`lastname` varchar(50) NOT NULL,
`emailaddress` varchar(50) NOT NULL,
`message` text NOT NULL,
 PRIMARY KEY (`id`)
);

```

## How to use

Page one 'Submit message' is for a person to leave a message with their first name, last name and email address. Click 'Submit' to submit the message, a message will appear saying 'The message has been submitted'.

Page two 'Message' contains all the messages.

To edit a message, click 'Edit', the message will appear on the form below ready to edit. Click edit to update the message. A success message will appear saying 'The record has been updated'.

To delete a message, click 'Delete'. A success message will appear saying 'The record has been deleted'.