DROP TABLE IF EXISTS students;

CREATE TABLE students (
  id INTEGER NOT NULL PRIMARY KEY,
  name TEXT NOT NULL,
  age INTEGER NOT NULL,
  email TEXT NOT NULL
);