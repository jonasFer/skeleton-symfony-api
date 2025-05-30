CREATE TABLE auth.user
(
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) unique NOT NULL,
    password VARCHAR(255) NOT NULL
);