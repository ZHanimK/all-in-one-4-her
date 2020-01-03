<?php

$datenbank = "db/datenbank.sqt";

  if (!file_exists($datenbank)) {
    $db = new PDO('sqlite:' . $datenbank);
    $db->exec("CREATE TABLE her(
      her_id        INTEGER PRIMARY KEY AUTOINCREMENT,
      who           INTEGER,
      firstname     TEXT,
      lastname      TEXT,
      age           INTEGER,
      gender        TEXT,
      legalStatus   TEXT,
      country       TEXT,
      education     TEXT,
      title         TEXT,
      degreeCountry TEXT,
      experience    INTEGER,
      email         TEXT,
      all_password  TEXT
    ),CREATE TABLE mentor(
      mentor_id     INTEGER PRIMARY KEY AUTOINCREMENT,
      who           INTEGER,
      firstname     TEXT,
      lastname      TEXT,
      age           INTEGER,
      education     TEXT,
      sector        TEXT,
      experience    INTEGER,
      email         TEXT,
      all_password  TEXT
    ),CREATE TABLE employer(
      employer_id   INTEGER PRIMARY KEY AUTOINCREMENT,
      who           INTEGER,
      firstname     TEXT,
      lastname      TEXT,
      position      TEXT,
      company       TEXT,
      sector        TEXT,
      employees     INTEGER,
      email         TEXT,
      all_password  TEXT
    ),CREATE TABLE organisation (
      org_id        INTEGER PRIMARY KEY AUTOINCREMENT,
      who           INTEGER,
      firstname     TEXT,
      lastname      TEXT,
      position      TEXT,
      organisation  TEXT,
      region        TEXT,
      email         TEXT,
      all_password  TEXT
    )");
  }
  else {
    $db = new PDO('sqlite:' . $datenbank);
  }


  if (!is_writable($datenbank)) {
    chmod($datenbank, 0777);
  }
?>