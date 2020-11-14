# Basic chat API

Just a basic chat API for testing purposes

## Setup

Call `setup.php` to init database.

## Endpoints

- `GET list.php` returns a list of chat rooms
- `GET chat.php?room={room}` returns chat messages
- `POST chat.php` adds a message to a chat room
    - `{"room":"{room}","user":"{username}","message":"{message}"}`